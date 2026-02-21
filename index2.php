<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASN Kemenbud - Manajemen SDM Aparatur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --coklat-tua: #5D4037;
            --coklat-sedang: #795548;
            --coklat-muda: #D7CCC8;
            --coklat-terang: #EFEBE9;
            --hijau: #4CAF50;
            --hijau-muda: #C8E6C9;
            --kuning: #FFC107;
            --merah: #F44336;
            --teks-gelap: #3E2723;
            --teks-terang: #FFFFFF;
            --border: #BCAAA4;
            --card-shadow: 0 4px 12px rgba(93, 64, 55, 0.15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #F5F1EE;
            color: var(--teks-gelap);
            min-height: 100vh;
            background-image: linear-gradient(to bottom, var(--coklat-terang), #F5F1EE);
        }
        
        .app-container {
            max-width: 480px;
            margin: 0 auto;
            background: white;
            min-height: 100vh;
            box-shadow: 0 0 30px rgba(93, 64, 55, 0.1);
            position: relative;
            overflow-x: hidden;
        }
        
        /* Main Content */
        .content-section {
            padding: 0;
            display: none;
            padding-bottom: 80px;
        }
        
        .content-section.active {
            display: block;
        }
        
        /* Header */
        header {
            background: linear-gradient(to right, var(--coklat-tua), var(--coklat-sedang));
            color: var(--teks-terang);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo {
            width: 40px;
            height: 40px;
            background: var(--coklat-muda);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coklat-tua);
            font-size: 20px;
            font-weight: bold;
        }
        
        .app-name {
            font-size: 18px;
            font-weight: 600;
        }
        
        .app-name span {
            font-size: 14px;
            display: block;
            opacity: 0.9;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--coklat-muda);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coklat-tua);
            font-size: 18px;
            border: 2px solid var(--coklat-muda);
        }
        
        /* Dashboard Section */
        .dashboard-section {
            padding: 20px 15px 10px;
            background: var(--coklat-terang);
        }
        
        .greeting {
            margin-bottom: 20px;
        }
        
        .greeting h1 {
            font-size: 22px;
            color: var(--coklat-tua);
            margin-bottom: 5px;
        }
        
        .greeting p {
            color: var(--coklat-sedang);
            font-size: 15px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--coklat-tua);
        }
        
        .stat-title {
            font-size: 13px;
            color: var(--coklat-sedang);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .stat-value {
            font-size: 22px;
            font-weight: 700;
            color: var(--coklat-tua);
            margin-bottom: 5px;
        }
        
        .stat-subtitle {
            font-size: 13px;
            color: var(--coklat-sedang);
        }
        
        .stat-trend {
            display: flex;
            align-items: center;
            gap: 4px;
            color: var(--hijau);
            font-weight: 600;
            font-size: 13px;
        }
        
        /* Kehadiran Section */
        .attendance-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 18px;
            color: var(--coklat-tua);
            font-weight: 600;
        }
        
        .attendance-percentage {
            font-weight: bold;
            color: var(--hijau);
            font-size: 18px;
            background: var(--hijau-muda);
            padding: 4px 12px;
            border-radius: 20px;
        }
        
        .attendance-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .attendance-item {
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            background: var(--coklat-terang);
        }
        
        .attendance-item .value {
            font-size: 20px;
            font-weight: 700;
            color: var(--coklat-tua);
            margin-bottom: 3px;
        }
        
        .attendance-item .label {
            font-size: 12px;
            color: var(--coklat-sedang);
        }
        
        .progress-bar-container {
            height: 8px;
            background: var(--coklat-muda);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 20px;
        }
        
        .progress-bar {
            height: 100%;
            background: var(--coklat-tua);
            border-radius: 4px;
            width: 78%;
        }
        
        /* Pengumuman Section */
        .news-section {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
        }
        
        .news-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .view-all {
            color: var(--coklat-tua);
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
        }
        
        .news-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .news-item {
            display: flex;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--coklat-muda);
        }
        
        .news-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .news-icon {
            width: 50px;
            height: 50px;
            background: var(--coklat-terang);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coklat-tua);
            font-size: 20px;
            flex-shrink: 0;
        }
        
        .news-content h3 {
            font-size: 15px;
            color: var(--coklat-tua);
            margin-bottom: 5px;
        }
        
        .news-content p {
            font-size: 13px;
            color: var(--coklat-sedang);
        }
        
        /* Karier Section */
        .career-section {
            padding: 20px 15px;
        }
        
        .career-plan {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
        }
        
        .career-steps {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 15px;
        }
        
        .career-step {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            position: relative;
            padding-left: 30px;
        }
        
        .career-step:before {
            content: "";
            position: absolute;
            left: 10px;
            top: 25px;
            bottom: -25px;
            width: 2px;
            background: var(--coklat-muda);
        }
        
        .career-step:last-child:before {
            display: none;
        }
        
        .step-icon {
            width: 25px;
            height: 25px;
            background: var(--coklat-tua);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 2;
        }
        
        .step-content h3 {
            font-size: 16px;
            color: var(--coklat-tua);
            margin-bottom: 5px;
        }
        
        .step-content p {
            font-size: 14px;
            color: var(--coklat-sedang);
            margin-bottom: 8px;
        }
        
        .step-year {
            background: var(--coklat-muda);
            color: var(--coklat-tua);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        
        /* Talent Matrix */
        .talent-section {
            padding: 20px 15px;
        }
        
        .talent-matrix {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .matrix-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 10px;
            margin-top: 20px;
        }
        
        .matrix-box {
            background: var(--coklat-terang);
            border-radius: 8px;
            padding: 12px;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100px;
        }
        
        .matrix-box h3 {
            font-size: 12px;
            text-align: center;
            margin-bottom: 8px;
            color: var(--coklat-tua);
            padding-bottom: 5px;
            border-bottom: 1px solid var(--border);
        }
        
        .employee-list {
            list-style: none;
            font-size: 11px;
        }
        
        .employee-list li {
            padding: 3px 0;
            border-bottom: 1px dashed var(--border);
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .employee-list li:before {
            content: "•";
            color: var(--coklat-tua);
            font-size: 14px;
        }
        
        .employee-list li:last-child {
            border-bottom: none;
        }
        
        .matrix-box.box-high {
            background: #EFEBE9;
            border-color: #BCAAA4;
        }
        
        .matrix-box.box-high h3 {
            color: #5D4037;
            font-weight: bold;
        }
        
        .matrix-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 12px;
            color: var(--coklat-sedang);
            font-weight: 600;
        }
        
        /* Presensi Section */
        .absensi-section {
            padding: 40px 20px 100px;
            text-align: center;
            height: calc(100vh - 100px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .absensi-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--coklat-tua);
            margin-bottom: 10px;
        }
        
        .absensi-subtitle {
            font-size: 16px;
            color: var(--coklat-sedang);
            margin-bottom: 30px;
        }
        
        .absensi-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(93, 64, 55, 0.15);
            max-width: 320px;
            margin: 0 auto;
        }
        
        .absensi-time {
            font-size: 48px;
            font-weight: 700;
            color: var(--coklat-tua);
            margin-bottom: 15px;
        }
        
        .absensi-date {
            font-size: 16px;
            color: var(--coklat-sedang);
            margin-bottom: 30px;
        }
        
        .absensi-btn {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--coklat-tua), var(--coklat-sedang));
            color: white;
            border: none;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin: 0 auto 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(93, 64, 55, 0.3);
        }
        
        .absensi-btn i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        
        .absensi-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(93, 64, 55, 0.4);
        }
        
        .absensi-status {
            font-size: 16px;
            color: var(--coklat-tua);
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .absensi-location {
            font-size: 14px;
            color: var(--coklat-sedang);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        /* Profile Section */
        .profile-section {
            padding: 20px 15px;
        }
        
        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--coklat-muda);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coklat-tua);
            font-size: 40px;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-name {
            font-size: 20px;
            font-weight: 600;
            color: var(--coklat-tua);
            margin-bottom: 5px;
        }
        
        .profile-position {
            font-size: 16px;
            color: var(--coklat-sedang);
            margin-bottom: 15px;
        }
        
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 20px 0;
        }
        
        .profile-stat {
            text-align: center;
        }
        
        .profile-stat .value {
            font-size: 20px;
            font-weight: 700;
            color: var(--coklat-tua);
            margin-bottom: 3px;
        }
        
        .profile-stat .label {
            font-size: 12px;
            color: var(--coklat-sedang);
        }
        
        .qr-section {
            background: var(--coklat-terang);
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            margin-top: 20px;
        }
        
        .qr-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--coklat-tua);
            margin-bottom: 15px;
        }
        
        .qr-code {
            width: 180px;
            height: 180px;
            background: white;
            margin: 0 auto 20px;
            border: 1px solid var(--border);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: var(--coklat-tua);
        }
        
        .qr-text {
            font-size: 14px;
            color: var(--coklat-sedang);
            margin-bottom: 20px;
            line-height: 1.5;
        }
        
        .qr-btn {
            background: var(--coklat-tua);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
        }
        
        .qr-btn:hover {
            background: var(--coklat-sedang);
        }
        
        /* Footer Navigation */
        .footer-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            display: flex;
            box-shadow: 0 -3px 12px rgba(93, 64, 55, 0.1);
            height: 70px;
            z-index: 100;
            max-width: 480px;
            margin: 0 auto;
            border-radius: 20px 20px 0 0;
            overflow: hidden;
            border-top: 1px solid var(--coklat-muda);
        }
        
        .nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--coklat-sedang);
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }
        
        .nav-item.active {
            color: var(--coklat-tua);
        }
        
        .nav-item.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 36px;
            height: 3px;
            background: var(--coklat-tua);
            border-radius: 0 0 3px 3px;
        }
        
        .nav-item i {
            font-size: 20px;
            margin-bottom: 4px;
            transition: all 0.3s;
        }
        
        .nav-item.active i {
            color: var(--coklat-tua);
            transform: scale(1.1);
        }
        
        .absensi-button {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--coklat-tua), var(--coklat-sedang));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(93, 64, 55, 0.3);
            z-index: 101;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .absensi-button:hover {
            transform: translateX(-50%) scale(1.1);
            box-shadow: 0 6px 15px rgba(93, 64, 55, 0.4);
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .absensi-btn {
                width: 140px;
                height: 140px;
                font-size: 16px;
            }
            
            .absensi-btn i {
                font-size: 36px;
            }
            
            .absensi-time {
                font-size: 40px;
            }
            
            .greeting h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Header -->
        <header>
            <div class="logo-container">
                <div class="logo">K</div>
                <div class="app-name">
                    ASN Kemenbud
                    <span>Manajemen SDM Aparatur</span>
                </div>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>
        
        <!-- Beranda Content -->
        <div class="content-section active" id="beranda-content">
            <div class="dashboard-section">
                <div class="greeting">
                    <h1>Selamat Pagi, Budi Santoso!</h1>
                    <p>Analis SDM Aparatur Ahli Pertama</p>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-title">
                            <i class="fas fa-money-bill-wave"></i> Gaji Pokok
                        </div>
                        <div class="stat-value">Rp 12.000.000</div>
                        <div class="stat-trend">
                            <i class="fas fa-arrow-up"></i> +22%
                        </div>
                        <div class="stat-subtitle">Bulan Oktober 2023</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-title">
                            <i class="fas fa-coins"></i> Tunjangan
                        </div>
                        <div class="stat-value">Rp 8.500.000</div>
                        <div class="stat-trend">
                            <i class="fas fa-arrow-up"></i> +15%
                        </div>
                        <div class="stat-subtitle">Bulan Oktober 2023</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-title">
                            <i class="fas fa-calendar-check"></i> Kehadiran
                        </div>
                        <div class="stat-value">96%</div>
                        <div class="stat-trend">
                            <i class="fas fa-check-circle"></i> Optimal
                        </div>
                        <div class="stat-subtitle">20 hari kerja</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-title">
                            <i class="fas fa-briefcase"></i> Jabatan
                        </div>
                        <div class="stat-value">Grade 8</div>
                        <div class="stat-trend">
                            <i class="fas fa-arrow-up"></i> Naik 1 tingkat
                        </div>
                        <div class="stat-subtitle">Analis SDM Aparatur</div>
                    </div>
                </div>
                
                <div class="attendance-card">
                    <div class="section-header">
                        <div class="section-title">Kehadiran Bulan Ini</div>
                        <div class="attendance-percentage">96%</div>
                    </div>
                    
                    <div class="attendance-stats">
                        <div class="attendance-item">
                            <div class="value">20</div>
                            <div class="label">Hadir</div>
                        </div>
                        <div class="attendance-item">
                            <div class="value">1</div>
                            <div class="label">Izin</div>
                        </div>
                        <div class="attendance-item">
                            <div class="value">0</div>
                            <div class="label">Sakit</div>
                        </div>
                        <div class="attendance-item">
                            <div class="value">0</div>
                            <div class="label">Alpa</div>
                        </div>
                    </div>
                    
                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
            </div>
            
            <div class="news-section">
                <div class="news-header">
                    <div class="section-title">Pengumuman Terbaru</div>
                    <a href="#" class="view-all">Lihat Semua</a>
                </div>
                
                <div class="news-container">
                    <div class="news-item">
                        <div class="news-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="news-content">
                            <h3>Pembaruan Sistem SKP 2024</h3>
                            <p>Pelajari fitur baru sistem pengisian Sasaran Kinerja Pegawai untuk tahun 2024</p>
                        </div>
                    </div>
                    
                    <div class="news-item">
                        <div class="news-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="news-content">
                            <h3>Jadwal Pelatihan Kepemimpinan</h3>
                            <p>Daftarkan diri Anda untuk pelatihan kepemimpinan tingkat IV pada bulan depan</p>
                        </div>
                    </div>
                    
                    <div class="news-item">
                        <div class="news-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="news-content">
                            <h3>Perubahan Kebijakan Cuti</h3>
                            <p>Perubahan kebijakan cuti tahunan mulai Januari 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Karier Content -->
        <div class="content-section" id="karier-content">
            <div class="career-section">
                <div class="career-plan">
                    <div class="section-header">
                        <div class="section-title">Rencana Karier Anda</div>
                    </div>
                    
                    <div class="career-steps">
                        <div class="career-step">
                            <div class="step-icon">1</div>
                            <div class="step-content">
                                <h3>Target Saat Ini (2023)</h3>
                                <p>Kasubbag Tata Usaha</p>
                                <span class="step-year">2023</span>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">2</div>
                            <div class="step-content">
                                <h3>Target Jangka Menengah (2025)</h3>
                                <p>Analis SDM Ahli Muda</p>
                                <span class="step-year">2025</span>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">3</div>
                            <div class="step-content">
                                <h3>Target Jangka Panjang (2030)</h3>
                                <p>Kepala Biro SDM</p>
                                <span class="step-year">2030</span>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">4</div>
                            <div class="step-content">
                                <h3>Target Akhir Karir (2035)</h3>
                                <p>Direktur SDM</p>
                                <span class="step-year">2035</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="career-plan">
                    <div class="section-header">
                        <div class="section-title">Rencana Pengembangan</div>
                    </div>
                    
                    <div class="career-steps">
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="step-content">
                                <h3>Pelatihan Kepemimpinan</h3>
                                <p>Sertifikasi Manajemen SDM Strategis</p>
                                <span class="step-year">November 2023</span>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="step-content">
                                <h3>Rotasi Jabatan</h3>
                                <p>Biro Kepegawaian dan Organisasi</p>
                                <span class="step-year">Januari 2024</span>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="step-content">
                                <h3>Pendidikan Lanjutan</h3>
                                <p>Magister Manajemen SDM</p>
                                <span class="step-year">Agustus 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Presensi Content -->
        <div class="content-section" id="presensi-content">
            <div class="absensi-section">
                <h2 class="absensi-title">Presensi Kehadiran</h2>
                <p class="absensi-subtitle">Lakukan presensi kehadiran sesuai jadwal kerja</p>
                
                <div class="absensi-card">
                    <div class="absensi-time">08:24</div>
                    <div class="absensi-date">Rabu, 28 Februari 2024</div>
                    
                    <button class="absensi-btn">
                        <i class="fas fa-fingerprint"></i>
                        ABSENSI
                    </button>
                    
                    <div class="absensi-status">Status: Belum melakukan presensi pagi</div>
                    <div class="absensi-location">
                        <i class="fas fa-map-marker-alt"></i> Kantor Kemenbud, Jakarta
                    </div>
                </div>
            </div>
        </div>
        
        <!-- 9Box Content -->
        <div class="content-section" id="ninebox-content">
            <div class="talent-section">
                <div class="talent-matrix">
                    <div class="section-header">
                        <div class="section-title">Peta Talent Matrix (9-Box)</div>
                    </div>
                    
                    <div class="matrix-content">
                        <!-- Row 1 -->
                        <div class="matrix-box">
                            <h3>Perlu Perbaikan</h3>
                            <ul class="employee-list">
                                <li>Andi Wijaya</li>
                                <li>Budi Cahyono</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box">
                            <h3>Peran Pendukung</h3>
                            <ul class="employee-list">
                                <li>Joko Prasetyo</li>
                                <li>Maya Indah</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box">
                            <h3>Spesialis</h3>
                            <ul class="employee-list">
                                <li>Linda Susanti</li>
                                <li>Agus Riyanto</li>
                            </ul>
                        </div>
                        
                        <!-- Row 2 -->
                        <div class="matrix-box">
                            <h3>Perlu Pengembangan</h3>
                            <ul class="employee-list">
                                <li>Bambang Sutrisno</li>
                                <li>Citra Dewi</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box">
                            <h3>Kontributor Inti</h3>
                            <ul class="employee-list">
                                <li>Dian Permatasari</li>
                                <li>Fajar Setiawan</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box">
                            <h3>Kontributor Utama</h3>
                            <ul class="employee-list">
                                <li>Rina Wijaya</li>
                                <li>Hendra Kurnia</li>
                            </ul>
                        </div>
                        
                        <!-- Row 3 -->
                        <div class="matrix-box box-high">
                            <h3>Perlu Perhatian</h3>
                            <ul class="employee-list">
                                <li>Agus Supriyadi</li>
                                <li>Rina Sari</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box box-high">
                            <h3>Calon Bintang</h3>
                            <ul class="employee-list">
                                <li>Eko Prasetyo</li>
                                <li>Siti Rahayu</li>
                            </ul>
                        </div>
                        
                        <div class="matrix-box box-high">
                            <h3>Bintang Masa Depan</h3>
                            <ul class="employee-list">
                                <li>Budi Santoso</li>
                                <li>Dewi Lestari</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="matrix-labels">
                        <div>Kinerja Rendah</div>
                        <div>Kinerja Sedang</div>
                        <div>Kinerja Tinggi</div>
                    </div>
                </div>
                
                <div class="talent-matrix">
                    <div class="section-header">
                        <div class="section-title">Anda di Box "Bintang Masa Depan"</div>
                    </div>
                    
                    <div class="career-steps">
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="step-content">
                                <h3>Potensi Tinggi</h3>
                                <p>Anda termasuk dalam 10% pegawai dengan potensi terbaik</p>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="step-content">
                                <h3>Rekomendasi Pengembangan</h3>
                                <p>Program mentoring dengan pimpinan, tugas belajar, dan rotasi jabatan strategis</p>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="step-content">
                                <h3>Target Promosi</h3>
                                <p>Analis Ahli Muda (2025), Kepala Subbagian (2028)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Profile Content -->
        <div class="content-section" id="profile-content">
            <div class="profile-section">
                <div class="profile-card">
                    <div class="profile-pic">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="profile-name">Budi Santoso, S.Kom</div>
                    <div class="profile-position">Analis SDM Aparatur Ahli Pertama</div>
                    
                    <div class="profile-stats">
                        <div class="profile-stat">
                            <div class="value">8 Tahun</div>
                            <div class="label">Masa Kerja</div>
                        </div>
                        <div class="profile-stat">
                            <div class="value">24</div>
                            <div class="label">Pelatihan</div>
                        </div>
                        <div class="profile-stat">
                            <div class="value">96%</div>
                            <div class="label">Kehadiran</div>
                        </div>
                    </div>
                </div>
                
                <div class="profile-card">
                    <div class="section-header">
                        <div class="section-title">Informasi Pribadi</div>
                    </div>
                    
                    <div class="career-steps">
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div class="step-content">
                                <h3>NIP</h3>
                                <p>198204152005021003</p>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="step-content">
                                <h3>Unit Kerja</h3>
                                <p>Dinas Komunikasi dan Informatika</p>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="step-content">
                                <h3>Pangkat/Golongan</h3>
                                <p>Penata Muda Tk.I / III.c</p>
                            </div>
                        </div>
                        
                        <div class="career-step">
                            <div class="step-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="step-content">
                                <h3>Jabatan</h3>
                                <p>Analis Sistem Informasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="qr-section">
                    <div class="qr-title">Kartu Identitas ASN Digital</div>
                    <div class="qr-code">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="qr-text">Gunakan QR Code ini untuk verifikasi identitas dan presensi di lingkungan Kementerian Kebudayaan</div>
                    <button class="qr-btn">Simpan QR Code</button>
                </div>
            </div>
        </div>
        
        <!-- Footer Navigation -->
        <div class="footer-nav">
            <div class="nav-item active" data-target="beranda-content">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </div>
            <div class="nav-item" data-target="karier-content">
                <i class="fas fa-road"></i>
                <span>Karier</span>
            </div>
            <div class="absensi-button" data-target="presensi-content">
                <i class="fas fa-fingerprint"></i>
            </div>
            <div class="nav-item" data-target="ninebox-content">
                <i class="fas fa-th-large"></i>
                <span>9Box</span>
            </div>
            <div class="nav-item" data-target="profile-content">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            const absensiButton = document.querySelector('.absensi-button');
            const contentSections = document.querySelectorAll('.content-section');
            
            // Navigation functionality
            const navigateTo = (target) => {
                // Update active state
                navItems.forEach(nav => nav.classList.remove('active'));
                
                // Hide all content sections
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show target content
                if(target) {
                    document.getElementById(target).classList.add('active');
                }
            }
            
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    navigateTo(targetId);
                    this.classList.add('active');
                });
            });
            
            absensiButton.addEventListener('click', function() {
                navigateTo('presensi-content');
                // Set active state for presensi button
                document.querySelector('[data-target="presensi-content"]').classList.add('active');
            });
            
            // Update time
            function updateTime() {
                const now = new Date();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                
                const timeElement = document.querySelector('.absensi-time');
                if(timeElement) {
                    timeElement.textContent = `${hours}:${minutes}`;
                }
            }
            
            // Initial update
            updateTime();
            
            // Update time every minute
            setInterval(updateTime, 60000);
            
            // Absensi button effect
            const absensiBtn = document.querySelector('.absensi-btn');
            if(absensiBtn) {
                absensiBtn.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-check"></i> BERHASIL';
                    this.style.background = 'linear-gradient(135deg, #4CAF50, #2E7D32)';
                    
                    document.querySelector('.absensi-status').textContent = "Status: Presensi pagi berhasil (08:25)";
                    document.querySelector('.absensi-status').style.color = "#4CAF50";
                    
                    // Change button after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-fingerprint"></i> ABSENSI PULANG';
                        this.style.background = 'linear-gradient(135deg, #5D4037, #795548)';
                    }, 2000);
                });
            }
        });
    </script>
</body>
</html>