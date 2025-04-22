<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Rumah Tangga - SINOMAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      background-color: #e6f0f8;
      color: #001f3f;
    }

    .sidebar {
      width: 250px;
      background-color: #f0e68c;
      display: flex;
      flex-direction: column;
      padding-top: 1rem;
    }

    .sidebar img {
      width: 160px;
      margin: 0 auto 1rem;
    }

    .sidebar-title {
      color: #001f3f;
      text-align: center;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }

    .nav-link {
      color: #0f3553;
      padding: 1rem;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.8rem;
      font-weight: 500;
    }

    .nav-link:hover, .nav-link.active {
      background-color: #0f3553;
      color: white !important;
    }

    .main {
      flex: 1;
      padding: 2rem;
    }

    .file-list {
      background-color: #ffffffd6;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      padding: 2rem;
      border: 2px solid #0f3553;
      border-radius: 10px;
      z-index: 1000;
      max-height: 80vh;
      overflow: auto;
    }

    .popup-close {
      position: absolute;
      top: 8px;
      right: 12px;
      font-size: 1.2rem;
      cursor: pointer;
      color: red;
    }

    .highlight {
      background-color: #007bff;
      color: white;
      padding: 0 3px;
      border-radius: 2px;
    }

    .checkbox-col {
      width: 30px;
    }

    .top-controls {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="assets/sinoman.png" alt="Logo SINOMAN">
    <h4 class="sidebar-title">ADMIN SINOMAN</h4>
    <a href="admin" class="nav-link"><i class="fas fa-upload"></i> Upload Data</a>
    <a href="datarumah" class="nav-link active"><i class="fas fa-home"></i> Data Rumah Tangga</a>
    <a href="dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#" class="nav-link"><i class="fas fa-users"></i> Manajemen User</a>
    <a href="setting" class="nav-link"><i class="fas fa-cog"></i> Pengaturan</a>

    <!-- Tombol keluar  -->
    <div style="margin-top: auto; padding: 1rem;">
      <a href="#" class="nav-link text-danger" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <h2>Data User</h2>

    <div class="d-flex mb-3">
      <input type="text" class="form-control me-2" id="searchInput" placeholder="Cari berdasarkan Kalurahan...">
      <button class="btn btn-primary" onclick="searchFiles()"><i class="fas fa-search"></i> Cari</button>
    </div>

    <div class="file-list" id="fileList"></div>

    <div class="popup" id="popup" style="display: none;">
      <span class="popup-close" onclick="closePopup()">&times;</span>
      <h5 id="popupTitle"></h5>
      <div id="popupContent"></div>
    </div>
  </div>

  <script>
    const fileListContainer = document.getElementById("fileList");
    const popup = document.getElementById("popup");
    const popupContent = document.getElementById("popupContent");
    const popupTitle = document.getElementById("popupTitle");

    let allFiles = JSON.parse(localStorage.getItem("sinomanFiles") || "[]");

    function loadFiles(files = allFiles, keyword = "") {
      fileListContainer.innerHTML = "";

      if (files.length === 0) {
        fileListContainer.innerHTML = "<p class='text-muted'>Belum ada data diunggah.</p>";
        return;
      }

      const topControls = document.createElement("div");
      topControls.className = "top-controls";

      const deleteButton = document.createElement("button");
      deleteButton.className = "btn btn-danger mb-3";
      deleteButton.innerHTML = `<i class="fas fa-trash-alt"></i> Hapus File yang Dipilih`;
      deleteButton.onclick = deleteSelected;
      topControls.appendChild(deleteButton);
      fileListContainer.appendChild(topControls);

      const table = document.createElement("table");
      table.className = "table table-bordered";
      table.innerHTML = `
        <thead class="table-light">
          <tr>
            <th class="checkbox-col"><input type="checkbox" id="checkAll" onchange="toggleAllCheckboxes(this)"></th>
            <th>Nama File</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          ${files.map((file, index) => {
            const highlightedName = keyword
              ? file.name.replace(new RegExp(`(${escapeRegExp(keyword)})`, "gi"), '<span class="highlight">$1</span>')
              : file.name;

            return `
              <tr>
                <td><input type="checkbox" class="fileCheckbox" data-index="${file.index ?? index}"></td>
                <td>${highlightedName}</td>
                <td>
                  <button class="btn btn-sm btn-info" onclick="showFile(${file.index ?? index}, '${keyword}')"><i class="fas fa-eye"></i> Lihat</button>
                  <button class="btn btn-sm btn-danger" onclick="deleteFile(${file.index ?? index})"><i class="fas fa-trash-alt"></i> Hapus</button>
                </td>
              </tr>`;
          }).join("")}
        </tbody>
      `;

      fileListContainer.appendChild(table);
    }

    function escapeRegExp(string) {
      return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function showFile(index, keyword = "") {
      const file = allFiles[index];
      const data = file.data;
      popupTitle.textContent = `Isi File: ${file.name}`;

      let html = "<table class='table table-striped'><tbody>";
      data.forEach((row, i) => {
        if (i >= 2) {
          html += "<tr>";
          row.forEach(cell => {
            const val = (cell || "").toString();
            const highlighted = keyword
              ? val.replace(new RegExp(`(${escapeRegExp(keyword)})`, "gi"), '<span class="highlight">$1</span>')
              : val;
            html += `<td>${highlighted}</td>`;
          });
          html += "</tr>";
        }
      });
      html += "</tbody></table>";

      popupContent.innerHTML = html;
      popup.style.display = "block";
    }

    function closePopup() {
      popup.style.display = "none";
    }

    function deleteFile(index) {
      if (!confirm("Yakin ingin menghapus file ini?")) return;
      allFiles.splice(index, 1);
      localStorage.setItem("sinomanFiles", JSON.stringify(allFiles));
      loadFiles();
    }

    function deleteSelected() {
      const checkboxes = document.querySelectorAll(".fileCheckbox:checked");
      if (checkboxes.length === 0) {
        alert("Pilih minimal satu file.");
        return;
      }
      if (!confirm("Yakin ingin menghapus file yang dipilih?")) return;

      const indices = Array.from(checkboxes).map(cb => parseInt(cb.dataset.index)).sort((a, b) => b - a);
      indices.forEach(i => allFiles.splice(i, 1));
      localStorage.setItem("sinomanFiles", JSON.stringify(allFiles));
      loadFiles();
    }

    function toggleAllCheckboxes(source) {
      document.querySelectorAll(".fileCheckbox").forEach(cb => cb.checked = source.checked);
    }

    function searchFiles() {
      const keyword = document.getElementById("searchInput").value.trim().toLowerCase();
      if (keyword === "") {
        loadFiles();
        return;
      }

      const result = allFiles
        .map((file, index) => {
          const headerRow = file.data.find(row =>
            row.some(cell =>
              cell && cell.toString().toLowerCase().includes("kalurahan") ||
              cell && cell.toString().toLowerCase().includes("kelurahan")
            )
          );

          if (!headerRow) return null;

          const kalurahanIndex = headerRow.findIndex(cell =>
            cell && (
              cell.toString().toLowerCase().includes("kalurahan") ||
              cell.toString().toLowerCase().includes("kelurahan")
            )
          );

          if (kalurahanIndex === -1) return null;

          const hasMatch = file.data.some(row =>
            row[kalurahanIndex] &&
            row[kalurahanIndex].toString().toLowerCase().includes(keyword)
          );

          return hasMatch ? { ...file, index } : null;
        })
        .filter(Boolean);

      loadFiles(result, keyword);
    }

    // Fungsi logout
  function logout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
      // Jangan menghapus data dari localStorage agar tetap ada
      // localStorage.removeItem('sinomanFiles'); // Baris ini dihapus
      window.location.href = "index"; // Arahkan ke halaman login
    }
  }
  
    // Load saat halaman dibuka
    loadFiles();
  </script>
</body>
</html>
