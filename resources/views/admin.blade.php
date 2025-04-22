<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload Data - SINOMAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      user-select: text;
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

    .upload-box {
      border: 3px dashed #ccc;
      padding: 2rem;
      text-align: center;
      background-color: #ffffffd6;
      transition: 0.3s ease;
      cursor: pointer;
      border-radius: 10px;
    }

    .upload-box.dragover {
      border-color: green;
      background-color: #e0ffe0;
    }

    .upload-box input[type="file"] {
      display: none;
    }

    .file-name {
      margin-top: 1rem;
      font-style: italic;
      color: #555;
    }

    .upload-success {
      color: green;
      font-weight: bold;
      margin-top: 10px;
      display: none;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="assets/sinoman.png" alt="Logo SINOMAN">
    <h4 class="sidebar-title">ADMIN SINOMAN</h4>
    <a href="admin" class="nav-link active"><i class="fas fa-upload"></i> Upload Data</a>
    <a href="datarumah" class="nav-link"><i class="fas fa-home"></i> Data Rumah Tangga</a>
    <a href="dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#" class="nav-link"><i class="fas fa-users"></i> Manajemen User</a>
    <a href="setting" class="nav-link"><i class="fas fa-cog"></i> Pengaturan</a>

    <!-- Tambahan tombol keluar-->
    <div style="margin-top: auto; padding: 1rem;">
      <a href="#" class="nav-link text-danger" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
  </div>

  <!-- Konten Utama -->
  <div class="main">
    <h2>Upload Data Excel</h2>

    <div class="upload-box" id="uploadBox">
      <p><i class="fas fa-cloud-upload-alt fa-2x"></i></p>
      <p>Seret dan lepas file Excel ke sini atau klik tombol di bawah</p>

      <label class="btn btn-primary mt-2">
        <i class="fas fa-file-upload"></i> Upload File
        <input type="file" id="fileInput" accept=".xlsx,.xls" multiple>
      </label>

      <div class="file-name" id="fileName"></div>
      <div class="upload-success" id="uploadSuccess">✅ File berhasil diunggah!</div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <script>
    const fileInput = document.getElementById('fileInput');
    const uploadBox = document.getElementById('uploadBox');
    const fileNameDisplay = document.getElementById('fileName');
    const uploadSuccess = document.getElementById('uploadSuccess');

    function handleFiles(files) {
      let allFiles = JSON.parse(localStorage.getItem('sinomanFiles') || '[]');

      [...files].forEach(file => {
        const reader = new FileReader();
        reader.onload = function (e) {
          const data = new Uint8Array(e.target.result);
          const workbook = XLSX.read(data, { type: 'array' });
          const sheetName = workbook.SheetNames[0];
          const worksheet = workbook.Sheets[sheetName];
          const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

          allFiles.push({ name: file.name, data: jsonData });
          localStorage.setItem('sinomanFiles', JSON.stringify(allFiles));

          uploadSuccess.style.display = 'block';
          setTimeout(() => uploadSuccess.style.display = 'none', 3000);
        };
        reader.readAsArrayBuffer(file);
      });

      fileNameDisplay.textContent = `${files.length} file berhasil diunggah.`;
      setTimeout(() => {
        fileInput.value = '';
      }, 100);
    }

    fileInput.addEventListener('change', (e) => {
      const files = e.target.files;
      if (files.length > 0) {
        handleFiles(files);
      }
    });

    uploadBox.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadBox.classList.add('dragover');
    });

    uploadBox.addEventListener('dragleave', () => {
      uploadBox.classList.remove('dragover');
    });

    uploadBox.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadBox.classList.remove('dragover');
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        handleFiles(files);
      }
    });

    uploadBox.addEventListener('click', (e) => {
      if (e.target === uploadBox) {
        fileInput.click();
      }
    });

  // Updated logout function
  function logout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
      // Clear user session from localStorage
      localStorage.setItem('isLoggedIn', 'false');
      localStorage.removeItem('username');
      
      // Redirect to index page
      window.location.href = "/";
    }
  }
  </script>
</body>
</html>
