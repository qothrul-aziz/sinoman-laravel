<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - SINOMAN</title>
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

    .card {
      border-left: 5px solid #0f3553;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .card h5 {
      color: #0f3553;
    }

    .card i {
      font-size: 1.8rem;
      color: #0f3553;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="assets/sinoman.png" alt="Logo SINOMAN">
    <h4 class="sidebar-title">ADMIN SINOMAN</h4>
    <a href="admin" class="nav-link"><i class="fas fa-upload"></i> Upload Data</a>
    <a href="datarumah" class="nav-link"><i class="fas fa-home"></i> Data Rumah Tangga</a>
    <a href="dashboard" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#" class="nav-link"><i class="fas fa-users"></i> Manajemen User</a>
    <a href="setting" class="nav-link"><i class="fas fa-cog"></i> Pengaturan</a>

    <!-- Tombol Keluar -->
    <div style="margin-top: auto; padding: 1rem;">
      <a href="#" class="nav-link text-danger" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
  </div>

  <!-- Konten Utama -->
  <div class="main">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row g-4">
      <div class="col-md-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h5>Jumlah File Diupload</h5>
              <p id="jumlahFile" class="fs-4 fw-bold">0</p>
            </div>
            <i class="fas fa-file-excel"></i>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h5>Selamat Datang</h5>
              <p class="text-muted">Pantau data user secara real-time.</p>
            </div>
            <i class="fas fa-handshake"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi menampilkan jumlah file dari localStorage
    function tampilkanJumlahFile() {
      const files = JSON.parse(localStorage.getItem("sinomanFiles") || "[]");
      document.getElementById("jumlahFile").textContent = files.length;
    }

    // Fungsi logout tanpa menghapus data
    function logout() {
      if (confirm("Apakah Anda yakin ingin keluar?")) {
        window.location.href = "index";
      }
    }

    tampilkanJumlahFile();
  </script>
</body>
</html>
