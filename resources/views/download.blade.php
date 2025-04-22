<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Download Aplikasi Sinoman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
            font-weight: 600;
            font-size: 1.75rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        header::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #10b981 0%, #3b82f6 50%, #10b981 100%);
        }
        
        /* Responsive adjustments for mobile */
        @media (max-width: 640px) {
            header .container {
                padding-left: 3.5rem; /* space for back button */
                justify-content: center;
            }
            header h1 {
                font-size: 1.25rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: calc(100% - 4rem);
                margin: 0 auto;
            }
            header a.absolute {
                left: 0.5rem;
                top: 50%;
                transform: translateY(-50%);
                font-size: 1rem;
            }
        }
        .app-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .app-icon {
            width: 120px;
            height: 120px;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
            border: 4px solid white;
            object-fit: cover;
        }
        .app-title {
            text-align: left;
            max-width: 400px;
        }
        .version-badge {
            background-color: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 0.5rem;
        }
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
            margin-bottom: 1rem;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        .feature-icon {
            color: #3b82f6;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .download-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 1.25rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
            margin: 1.5rem 0;
        }
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.6);
        }
        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.875rem;
            color: #64748b;
            background-color: #f1f5f9;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="container mx-auto flex items-center justify-center relative">
            <a href="/" class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white text-lg font-semibold flex items-center gap-2 hover:text-gray-200 bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg transition-all duration-300 shadow-md">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <h1>Download Sinoman</h1>
        </div>
    </header>
    
    <main class="container mx-auto px-4 py-8">
        <div class="app-header">
            <img src="assets/sinomanapklogo.jpeg" alt="Sinoman App Icon" class="app-icon">
            
            <div class="app-title">
                <div class="version-badge">Versi 1.0</div>
                <h2 class="text-3xl font-bold text-gray-800 mb-1">APLIKASI SINOMAN</h2>
                <p class="text-gray-600 text-lg">Sistem Informasi Antrean Perumahan</p>
            </div>
        </div>
        
        <p class="text-gray-700 mb-8 text-lg max-w-2xl mx-auto text-center">
            Aplikasi Sinoman memudahkan proses pendaftaran dan pengelolaan bantuan perumahan/rusun. 
            Dapatkan informasi terbaru, status pengajuan, dan notifikasi real-time melalui aplikasi kami.
        </p>
        
        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-8">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Pendaftaran Mudah</h3>
                <p class="text-gray-600">Daftar bantuan perumahan / rusun dengan proses yang sederhana dan cepat.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Notifikasi Real-time</h3>
                <p class="text-gray-600">Dapatkan pemberitahuan langsung tentang status pengajuan Anda.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Pantau Progres</h3>
                <p class="text-gray-600">Lacak perkembangan pengajuan bantuan Anda kapan saja.</p>
            </div>
        </div>
        
        <div class="text-center">
            <a href="sinomanmobile.apk" download class="download-btn">
                <i class="fas fa-download"></i> Unduh Sekarang
            </a>
            <p class="text-gray-500 text-sm mt-4">Ukuran Aplikasi: 15 MB • Kompatibel dengan Android 8.0+</p>
        </div>

        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center justify-center gap-2 bg-gray-200 hover:bg-gray-300 text-blue-700 font-semibold px-6 py-3 rounded-lg transition-all duration-300 shadow-md">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>
    </main>
    
    <footer>
        <div class="container mx-auto">
            <p>&copy; 2025 SINOMAN - Sistem Informasi Antrean Perumahan. Hak Cipta Dilindungi.</p>
            <p class="mt-2 text-xs">Versi 1.0 • Build 2025.04</p>
        </div>
    </footer>
</body>
</html>
