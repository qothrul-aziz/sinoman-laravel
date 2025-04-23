<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan - SINOMAN</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a56d4;
      --secondary: #3f37c9;
      --accent: #4895ef;
      --light: #f8f9fa;
      --dark: #212529;
      --gray: #6c757d;
      --light-gray: #e9ecef;
      --success: #4cc9f0;
      --danger: #f72585;
      --warning: #f8961e;
      --border-radius: 12px;
      --box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7ff;
      color: var(--dark);
      line-height: 1.6;
    }

    .app-container {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 280px;
      background: white;
      padding: 2rem 1.5rem;
      box-shadow: var(--box-shadow);
      position: sticky;
      top: 0;
      height: 100vh;
      overflow-y: auto;
    }

    .sidebar-header {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--light-gray);
    }

    .sidebar-header img {
      width: 40px;
      margin-right: 10px;
    }

    .sidebar-header h2 {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--primary);
    }

    .sidebar-menu {
      list-style: none;
    }

    .sidebar-menu li {
      margin-bottom: 0.5rem;
      border-radius: var(--border-radius);
      transition: var(--transition);
    }

    .sidebar-menu li:hover {
      background-color: rgba(67, 97, 238, 0.1);
    }

    .sidebar-menu li.active {
      background-color: rgba(67, 97, 238, 0.1);
      border-left: 4px solid var(--primary);
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: var(--dark);
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar-menu i {
      margin-right: 12px;
      width: 20px;
      text-align: center;
      color: var(--gray);
    }

    .sidebar-menu li.active i,
    .sidebar-menu li:hover i {
      color: var(--primary);
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 2rem;
      overflow-y: auto;
    }

    .content-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .content-header h1 {
      font-size: 1.75rem;
      color: var(--dark);
      font-weight: 600;
    }

    .btn-dashboard {
      background-color: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: var(--border-radius);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-dashboard:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
    }

    /* Content Sections */
    .content-section {
      background: white;
      border-radius: var(--border-radius);
      padding: 2rem;
      box-shadow: var(--box-shadow);
      margin-bottom: 2rem;
      display: none;
    }

    .content-section.active {
      display: block;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .content-section h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .content-section p {
      color: var(--gray);
      margin-bottom: 1.5rem;
    }

    /* Forms */
    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--dark);
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid var(--light-gray);
      border-radius: var(--border-radius);
      font-family: inherit;
      transition: var(--transition);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
    }

    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--gray);
      cursor: pointer;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
    }

    .checkbox-group input {
      margin-right: 10px;
      width: 18px;
      height: 18px;
      accent-color: var(--primary);
    }

    .btn-submit {
      background-color: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: var(--border-radius);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
      margin-top: 1rem;
    }

    .btn-submit:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
    }

    hr {
      border: none;
      border-top: 1px solid var(--light-gray);
      margin: 1.5rem 0;
    }

    /* Notification Items */
    .notifikasi-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid var(--light-gray);
    }

    .notifikasi-item:last-child {
      border-bottom: none;
    }

    /* About Section */
    .about-logo {
      text-align: center;
      margin-bottom: 2rem;
    }

    .about-logo img {
      max-width: 250px;
      height: auto;
    }

    .feature-list {
      margin: 1.5rem 0;
      padding-left: 1.5rem;
    }

    .feature-list li {
      margin-bottom: 0.75rem;
    }

    /* Alert */
    .alert {
      padding: 1rem;
      border-radius: var(--border-radius);
      margin-top: 1rem;
      display: none;
    }

    .alert.success {
      background-color: rgba(76, 201, 240, 0.2);
      color: #0a9396;
      border-left: 4px solid var(--success);
    }

    /* Responsive */
    @media (max-width: 992px) {
      .app-container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main-content {
        padding: 1.5rem;
      }
    }

    @media (max-width: 768px) {
      .form-grid {
        grid-template-columns: 1fr;
      }

      .content-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="app-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <img src="assets\sinoman.png" alt="SINOMAN Logo">
        <h2>Pengaturan</h2>
      </div>
      <ul class="sidebar-menu">
        <li class="active" data-target="akun">
          <a href="#"><i class="fas fa-user"></i> Profil</a>
        </li>
        <li data-target="keamanan">
          <a href="#"><i class="fas fa-shield-alt"></i> Keamanan</a>
        </li>
        <li data-target="notifikasi">
          <a href="#"><i class="fas fa-bell"></i> Notifikasi</a>
        </li>
        <li data-target="tentang">
          <a href="#"><i class="fas fa-info-circle"></i> Tentang</a>
        </li>
        <li data-target="kritik">
          <a href="#"><i class="fas fa-comment-dots"></i> Kritik & Saran</a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      <div class="content-header">
        <h1>Pengaturan Akun</h1>
        <button class="btn-dashboard" onclick="window.location.href='/'">
          <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </button>
      </div>

      <!-- Account Section -->
      <section id="akun" class="content-section active">
        <h3><i class="fas fa-user-circle mr-2"></i>Profil Pengguna</h3>
        <p>Kelola informasi profil dan data pribadi Anda</p>

        <form id="form-akun" class="form-grid">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
          </div>

          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" required>
          </div>

          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" id="nik" class="form-control" name="nik" placeholder="Masukkan Nomor Induk Kependudukan" required>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input type="tel" id="no_hp" class="form-control" name="no_hp" placeholder="Masukkan Nomor Telepon" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Alamat Email" required>
          </div>

          <div class="form-group" style="grid-column: span 2;">
            <label for="alamat">Alamat Rumah</label>
            <textarea id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" required></textarea>
          </div>

          <button type="submit" class="btn-submit" style="grid-column: span 2;">
            <i class="fas fa-save"></i> Simpan Perubahan
          </button>
        </form>
      </section>

      <!-- Security Section -->
      <section id="keamanan" class="content-section">
        <h3><i class="fas fa-shield-alt mr-2"></i>Privasi & Keamanan</h3>
        <p>Atur keamanan akun dan preferensi privasi Anda</p>

        <form id="form-keamanan">
          <div class="form-group">
            <label for="password_lama">Sandi Lama</label>
            <div class="password-wrapper">
              <input type="password" id="password_lama" class="form-control" name="password_lama" placeholder="Masukkan sandi lama" required>
              <button type="button" class="toggle-password" onclick="togglePassword('password_lama')">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="form-group">
            <label for="password_baru">Sandi Baru</label>
            <div class="password-wrapper">
              <input type="password" id="password_baru" class="form-control" name="password_baru" placeholder="Masukkan sandi baru (minimal 8 karakter)" required>
              <button type="button" class="toggle-password" onclick="togglePassword('password_baru')">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="form-group">
            <label for="konfirmasi_password">Konfirmasi Sandi Baru</label>
            <div class="password-wrapper">
              <input type="password" id="konfirmasi_password" class="form-control" name="konfirmasi_password" placeholder="Ulangi sandi baru" required>
              <button type="button" class="toggle-password" onclick="togglePassword('konfirmasi_password')">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <hr>

          <h4><i class="fas fa-lock mr-2"></i>Pengaturan Keamanan Tambahan</h4>
          <p class="text-muted">Tingkatkan keamanan akun Anda dengan opsi berikut</p>

          <div class="checkbox-group">
            <input type="checkbox" id="verifikasi_2langkah" name="verifikasi_2langkah">
            <label for="verifikasi_2langkah">Aktifkan Verifikasi 2 Langkah</label>
          </div>

          <div class="checkbox-group">
            <input type="checkbox" id="sidik_jari" name="sidik_jari">
            <label for="sidik_jari">Aktifkan Login Menggunakan Sidik Jari/Wajah</label>
          </div>

          <button type="submit" class="btn-submit">
            <i class="fas fa-shield-alt"></i> Perbarui Keamanan
          </button>
        </form>
      </section>

      <!-- Notification Section -->
      <section id="notifikasi" class="content-section">
        <h3><i class="fas fa-bell mr-2"></i>Pengaturan Notifikasi</h3>
        <p>Kelola cara Anda menerima pemberitahuan dari sistem</p>

        <div class="notifikasi-item">
          <div>
            <label for="email">Notifikasi melalui Email</label>
            <p class="text-muted">Dapatkan pemberitahuan penting melalui email</p>
          </div>
          <label class="switch">
            <input type="checkbox" id="email" checked>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="notifikasi-item">
          <div>
            <label for="sms">Notifikasi melalui SMS</label>
            <p class="text-muted">Dapatkan pemberitahuan melalui pesan teks</p>
          </div>
          <label class="switch">
            <input type="checkbox" id="sms" checked>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="notifikasi-item">
          <div>
            <label for="wa">Notifikasi melalui WhatsApp</label>
            <p class="text-muted">Kirim pemberitahuan ke nomor WhatsApp Anda</p>
          </div>
          <label class="switch">
            <input type="checkbox" id="wa" checked>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="notifikasi-item">
          <div>
            <label for="app">Notifikasi dari Aplikasi</label>
            <p class="text-muted">Tampilkan pemberitahuan dalam aplikasi</p>
          </div>
          <label class="switch">
            <input type="checkbox" id="app" checked>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="form-group">
          <label for="bunyi">Suara Notifikasi</label>
          <select id="bunyi" class="form-control">
            <option>Aktif</option>
            <option>Nonaktif</option>
            <option>Getar Saja</option>
          </select>
        </div>

        <div class="form-group">
          <label for="waktu">Waktu Aktif Notifikasi</label>
          <input type="time" id="waktu" class="form-control" value="08:00">
          <small class="text-muted">Notifikasi hanya akan muncul dalam rentang waktu ini</small>
        </div>

        <button type="submit" class="btn-submit">
          <i class="fas fa-bell"></i> Simpan Pengaturan
        </button>
      </section>

      <!-- About Section -->
      <section id="tentang" class="content-section">
        <div class="about-logo">
          <img src="assets\sinoman.png" alt="Logo SINOMAN">
        </div>
        
        <h3><i class="fas fa-info-circle mr-2"></i>Tentang SINOMAN</h3>
        <p><strong>SINOMAN</strong> (Sistem Informasi Antrean Omah Transparan) adalah platform digital inovatif yang dirancang untuk memodernisasi sistem antrean konvensional dengan pendekatan berbasis teknologi.</p>

        <div class="form-group">
          <h4><i class="fas fa-bullseye mr-2"></i>Misi Kami</h4>
          <ul class="feature-list">
            <li>Mengubah sistem antrean tradisional menjadi pengalaman digital yang efisien</li>
            <li>Meningkatkan transparansi dalam proses layanan publik</li>
            <li>Memberdayakan masyarakat dengan akses informasi real-time</li>
            <li>Mengurangi waktu tunggu dan meningkatkan produktivitas</li>
          </ul>
        </div>

        <div class="form-group">
          <h4><i class="fas fa-star mr-2"></i>Fitur Unggulan</h4>
          <ul class="feature-list">
            <li><strong>Pendaftaran Online:</strong> Daftar antrean dari mana saja, kapan saja</li>
            <li><strong>Manajemen Antrean Cerdas:</strong> Sistem penjadwalan otomatis</li>
            <li><strong>Notifikasi Real-time:</strong> Update status antrean langsung ke perangkat Anda</li>
            <li><strong>Analitik Data:</strong> Laporan dan statistik transparan</li>
            <li><strong>Integrasi Multi-platform:</strong> Akses melalui web dan mobile</li>
          </ul>
        </div>

        <div class="form-grid">
          <div class="form-group">
            <h4><i class="fas fa-code-branch mr-2"></i>Versi Aplikasi</h4>
            <p>1.0.0 (Stable Release)</p>
          </div>

          <div class="form-group">
            <h4><i class="fas fa-calendar-alt mr-2"></i>Tanggal Rilis</h4>
            <p>15 Juni 2023</p>
          </div>
        </div>

        <div class="form-group">
          <h4><i class="fas fa-link mr-2"></i>Tautan Penting</h4>
          <p>
            <a href="https://sinoman.docs.io" target="_blank" class="text-primary">
              <i class="fas fa-book"></i> Dokumentasi Pengguna
            </a>
          </p>
          <p>
            <a href="mailto:developer@sinoman.id" class="text-primary">
              <i class="fas fa-envelope"></i> developer@sinoman.id
            </a>
          </p>
          <p>
            <a href="tel:+628123456789" class="text-primary">
              <i class="fas fa-phone"></i> +62 812 3456 789
            </a>
          </p>
        </div>
      </section>

      <!-- Feedback Section -->
      <section id="kritik" class="content-section">
        <h3><i class="fas fa-comment-dots mr-2"></i>Kritik & Saran</h3>
        <p>Bagikan pengalaman Anda untuk membantu kami meningkatkan layanan</p>

        <form id="form-kritik">
          <div class="form-grid">
            <div class="form-group">
              <label for="kritik-nama">Nama Anda</label>
              <input type="text" id="kritik-nama" class="form-control" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <div class="form-group">
              <label for="kritik-email">Email (opsional)</label>
              <input type="email" id="kritik-email" class="form-control" name="email" placeholder="Masukkan Email">
            </div>
          </div>

          <div class="form-group">
            <label for="kritik-pesan">Pesan Anda</label>
            <textarea id="kritik-pesan" class="form-control" name="pesan" placeholder="Ceritakan pengalaman Anda atau berikan saran untuk perbaikan kami..." required></textarea>
          </div>

          <button type="submit" class="btn-submit">
            <i class="fas fa-paper-plane"></i> Kirim Feedback
          </button>
        </form>

        <div id="kritik-alert" class="alert success" style="display: none;">
          <i class="fas fa-check-circle"></i> Terima kasih atas masukan Anda! Pesan telah berhasil dikirim.
        </div>
      </section>
    </div>
  </div>

  <script>
    // Toggle between settings sections
    document.querySelectorAll('.sidebar-menu li').forEach(item => {
      item.addEventListener('click', function() {
        // Remove active class from all items
        document.querySelectorAll('.sidebar-menu li').forEach(i => {
          i.classList.remove('active');
        });
        
        // Add active class to clicked item
        this.classList.add('active');
        
        // Hide all sections
        document.querySelectorAll('.content-section').forEach(section => {
          section.classList.remove('active');
        });
        
        // Show selected section
        const targetId = this.getAttribute('data-target');
        document.getElementById(targetId).classList.add('active');
      });
    });

    // Toggle password visibility
    function togglePassword(id) {
      const input = document.getElementById(id);
      const icon = input.nextElementSibling.querySelector('i');
      
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }

    // Form submission handlers
    document.getElementById('form-akun').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Profil berhasil diperbarui!');
    });

    document.getElementById('form-keamanan').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Pengaturan keamanan berhasil diperbarui!');
    });

    document.getElementById('form-kritik').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('kritik-alert').style.display = 'block';
      this.reset();
      setTimeout(() => {
        document.getElementById('kritik-alert').style.display = 'none';
      }, 5000);
    });
  </script>
</body>
</html>