<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pengaturan - SINOMAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      background-color: #e6f0f8;
      color: #001f3f;
      transition: background-color 0.3s, color 0.3s;
    }

    .dark-mode {
      background-color: #121212 !important;
      color: #ffffff !important;
    }

    .sidebar {
      width: 250px;
      background-color: #f0e68c;
      display: flex;
      flex-direction: column;
      padding-top: 1rem;
      transition: background-color 0.3s;
    }

    .dark-mode .sidebar {
      background-color: #333;
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

    .dark-mode .sidebar-title {
      color: #fff;
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

    .dark-mode .nav-link {
      color: #ccc;
    }

    .main {
      flex: 1;
      padding: 2rem;
    }

    .settings-form {
      max-width: 600px;
      background-color: #ffffffd9;
      padding: 20px;
      border-radius: 10px;
    }

    .dark-mode .settings-form {
      background-color: #222;
    }

    .btn-simpan {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="assets/sinoman.png" alt="Logo SINOMAN">
    <h4 class="sidebar-title" id="sidebarTitle">ADMIN SINOMAN</h4>
    <a href="admin" class="nav-link"><i class="fas fa-upload"></i> <span id="uploadData">Upload Data</span></a>
    <a href="datarumah" class="nav-link"><i class="fas fa-home"></i> <span id="dataRumah">Data Rumah Tangga</span></a>
    <a href="dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i> <span id="dashboard">Dashboard</span></a>
    <a href="manajemen" class="nav-link"><i class="fas fa-users"></i> <span id="manajemenUser">Manajemen User</span></a>
    <a href="setting" class="nav-link active"><i class="fas fa-cog"></i> <span id="pengaturan">Pengaturan</span></a>
    <div style="margin-top: auto; padding: 1rem;">
      <a href="#" class="nav-link text-danger" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
  </div>

  <!-- Konten Pengaturan -->
  <div class="main">
    <h2 id="judul">Pengaturan Akun</h2>

    <form class="settings-form" onsubmit="simpanPengaturan(event)">
      <div class="mb-3">
        <label for="username" class="form-label" id="usernameLabel">Nama Pengguna</label>
        <input type="text" class="form-control" id="username" placeholder="Masukkan nama anda">
      </div>

      <div class="mb-3">
        <label for="bahasa" class="form-label" id="bahasaLabel">Bahasa</label>
        <select class="form-select" id="bahasa" onchange="ubahBahasa()">
            <option value="id">Bahasa Indonesia</option>
            <option value="en">English</option>
          </select>
      </div>

      <div class="mb-3">
        <label for="tema" class="form-label" id="temaLabel">Tema Tampilan</label>
        <select class="form-select" id="tema" onchange="ubahTema()">
          <option>Terang</option>
          <option>Gelap</option>
        </select>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="notifikasi">
        <label class="form-check-label" for="notifikasi" id="notifikasiLabel">Aktifkan notifikasi</label>
      </div>

      <button type="submit" class="btn btn-primary btn-simpan" id="simpanBtn">Simpan Pengaturan</button>
    </form>
  </div>

  <script>
    // Data teks dalam bahasa Indonesia dan Inggris
    const teks = {
      id: {
        judul: "Pengaturan Akun",
        usernameLabel: "Nama Pengguna",
        bahasaLabel: "Bahasa",
        temaLabel: "Tema Tampilan",
        notifikasiLabel: "Aktifkan notifikasi",
        simpanBtn: "Simpan Pengaturan",
        sidebarTitle: "ADMIN SINOMAN",
        uploadData: "Upload Data",
        dataRumah: "Data Rumah Tangga",
        dashboard: "Dashboard",
        manajemenUser: "Manajemen User",
        pengaturan: "Pengaturan"
      },
      en: {
        judul: "Account Settings",
        usernameLabel: "Username",
        bahasaLabel: "Language",
        temaLabel: "Display Theme",
        notifikasiLabel: "Enable Notifications",
        simpanBtn: "Save Settings",
        sidebarTitle: "SINOMAN ADMIN",
        uploadData: "Upload Data",
        dataRumah: "Household Data",
        dashboard: "Dashboard",
        manajemenUser: "User Management",
        pengaturan: "Settings"
      }
    };

    // Fungsi untuk mengubah bahasa
    function ubahBahasa() {
      const bahasa = document.getElementById("bahasa").value;
      const teksHalaman = teks[bahasa];

      // Mengubah teks elemen sesuai bahasa yang dipilih
      document.getElementById("judul").innerText = teksHalaman.judul;
      document.getElementById("usernameLabel").innerText = teksHalaman.usernameLabel;
      document.getElementById("bahasaLabel").innerText = teksHalaman.bahasaLabel;
      document.getElementById("temaLabel").innerText = teksHalaman.temaLabel;
      document.getElementById("notifikasiLabel").innerText = teksHalaman.notifikasiLabel;
      document.getElementById("simpanBtn").innerText = teksHalaman.simpanBtn;
      document.getElementById("logoutBtn").innerText = teksHalaman.logoutBtn;
      document.getElementById("sidebarTitle").innerText = teksHalaman.sidebarTitle;
      document.getElementById("uploadData").innerText = teksHalaman.uploadData;
      document.getElementById("dataRumah").innerText = teksHalaman.dataRumah;
      document.getElementById("dashboard").innerText = teksHalaman.dashboard;
      document.getElementById("manajemenUser").innerText = teksHalaman.manajemenUser;
      document.getElementById("pengaturan").innerText = teksHalaman.pengaturan;
    }

    // Fungsi untuk menyimpan pengaturan ke localStorage
    function simpanPengaturan(e) {
      e.preventDefault();
      const settings = {
        username: document.getElementById("username").value,
        bahasa: document.getElementById("bahasa").value,
        tema: document.getElementById("tema").value,
        notifikasi: document.getElementById("notifikasi").checked
      };

      localStorage.setItem("sinomanSettings", JSON.stringify(settings));
      alert("Pengaturan berhasil disimpan!");
    }

    // Fungsi untuk mengubah tema langsung saat dipilih
    function ubahTema() {
      const tema = document.getElementById("tema").value;
      if (tema === "Gelap") {
        document.body.classList.add("dark-mode");
      } else {
        document.body.classList.remove("dark-mode");
      }
    }

    // Fungsi untuk logout
    function logout() {
      if (confirm("Keluar dari akun?")) {
        // Clear user session from localStorage
        localStorage.setItem('isLoggedIn', 'false');
        localStorage.removeItem('username');
        
        // Redirect to index page
        window.location.href = "/";
      }
    }

    // Load pengaturan saat halaman dibuka
    window.onload = function() {
      const pengaturan = JSON.parse(localStorage.getItem("sinomanSettings") || "{}");

      document.getElementById("username").value = pengaturan.username || "";
      document.getElementById("bahasa").value = pengaturan.bahasa || "id";
      document.getElementById("tema").value = pengaturan.tema || "Terang";
      document.getElementById("notifikasi").checked = pengaturan.notifikasi || false;

      // Terapkan bahasa dan tema saat halaman dimuat
      ubahBahasa();
      if (pengaturan.tema === "Gelap") {
        document.body.classList.add("dark-mode");
      }
    }
  </script>
</body>
</html>
