<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Talenta - Kementerian Kebudayaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --biru-tua: #1e3a8a;
            --biru-sedang: #3b82f6;
            --biru-muda: #93c5fd;
            --biru-transparan: rgba(27, 85, 158, 0.1);
            --hijau: #10b981;
            --hijau-muda: #a7f3d0;
            --kuning: #fbbf24;
            --merah: #ef4444;
            --ungu: #8b5cf6;
            --abu-abu: #f3f4f6;
            --abu-abu-gelap: #6b7280;
            --teks-gelap: #1f2937;
            --teks-terang: #ffffff;
            --border: #d1d5db;
            --card-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
            --budaya-pattern: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 Q40,5 60,20 T100,20 L80,40 Q65,30 50,40 T20,40 Z" fill="none" stroke="%233b82f6" stroke-width="0.5" stroke-opacity="0.1"/></svg>');
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: var(--teks-gelap);
            min-height: 100vh;
            background-image: var(--budaya-pattern), linear-gradient(135deg, #f0f8ff, #e6f7ff);
            background-attachment: fixed;
            padding: 15px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        header {
            background: linear-gradient(120deg, var(--biru-tua), var(--biru-sedang));
            color: var(--teks-terang);
            padding: 15px;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(255,255,255,0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255,255,255,0.1) 0%, transparent 20%);
            pointer-events: none;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-budaya {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .header-left h1 {
            font-size: 22px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .header-left p {
            opacity: 0.85;
            font-size: 14px;
            font-weight: 300;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 15px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--biru-muda), var(--biru-sedang));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }
        
        .user-details h3 {
            font-size: 16px;
            margin-bottom: 2px;
            font-weight: 500;
        }
        
        .user-details p {
            font-size: 13px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        /* Navigation */
        .nav-container {
            display: flex;
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            overflow: hidden;
            border: 1px solid rgba(27, 85, 158, 0.1);
        }
        
        .nav-item {
            flex: 1;
            text-align: center;
            padding: 16px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: transparent;
        }
        
        .nav-item:hover {
            background: var(--biru-transparan);
        }
        
        .nav-item.active {
            background: linear-gradient(to bottom, var(--biru-transparan), white);
            color: var(--biru-sedang);
            font-weight: 600;
        }
        
        .nav-item.active::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 20%;
            right: 20%;
            height: 3px;
            background: var(--biru-sedang);
            border-radius: 3px;
        }
        
        .nav-item i {
            display: block;
            font-size: 20px;
            margin-bottom: 8px;
            transition: all 0.3s;
        }
        
        .nav-item.active i {
            color: var(--biru-sedang);
            transform: scale(1.1);
        }
        
        .nav-item span {
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Three Columns Layout */
        .top-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }
        
        /* Box Identifikasi */
        .box-identifikasi {
            background: linear-gradient(135deg, var(--biru-sedang), var(--biru-tua));
            color: var(--teks-terang);
            padding: 25px;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
            height: auto;
        }
        
        .box-identifikasi::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255,255,255,0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,0.1) 0%, transparent 40%);
            pointer-events: none;
        }
        
        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }
        
        .box-header h2 {
            font-size: 20px;
            font-weight: 600;
        }
        
        .box-tag {
            background: var(--hijau-muda);
            color: var(--teks-gelap);
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .box-content {
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }
        
        .box-content p {
            margin-bottom: 10px;
            font-size: 15px;
            opacity: 0.9;
        }
        
        .box-content strong {
            font-size: 24px;
            display: block;
            margin: 8px 0 15px;
            font-weight: 700;
        }
        
        .pengembangan-list {
            list-style: none;
            margin-top: 20px;
        }
        
        .pengembangan-list li {
            margin-bottom: 12px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            padding-left: 30px;
        }
        
        .pengembangan-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            width: 24px;
            height: 24px;
            background: var(--hijau);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        /* Performance Card */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            position: relative;
            overflow: hidden;
            height: auto;
            border: 1px solid rgba(27, 85, 158, 0.1);
        }
        
        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--biru-sedang), var(--hijau));
            border-radius: 5px 5px 0 0;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }
        
        .card-header h2 {
            font-size: 18px;
            color: var(--biru-tua);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
        }
        
        .card-header i {
            font-size: 20px;
            color: var(--biru-sedang);
        }
        
        .performance-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .performance-info {
            padding: 5px 0;
        }
        
        .performance-info h3 {
            font-size: 14px;
            color: var(--abu-abu-gelap);
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .performance-info p {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--biru-tua);
        }
        
        .salary-increase {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--hijau);
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 16px;
            background: rgba(16, 185, 129, 0.1);
            padding: 8px 15px;
            border-radius: 20px;
            width: fit-content;
        }
        
        .performance-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }
        
        .stat-item {
            background: var(--biru-transparan);
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(27, 85, 158, 0.1);
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(27, 85, 158, 0.1);
        }
        
        .stat-item .value {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--biru-tua);
        }
        
        .stat-item .label {
            font-size: 13px;
            color: var(--abu-abu-gelap);
            font-weight: 500;
        }
        
        .performance-chart {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        .chart-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(var(--hijau) 0% 68%, var(--abu-abu) 68% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
        }
        
        .chart-circle::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
        }
        
        .chart-value {
            position: absolute;
            font-size: 28px;
            font-weight: 700;
            color: var(--biru-tua);
        }
        
        .chart-label {
            display: flex;
            gap: 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--biru-tua);
        }
        
        .chart-label span {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .chart-label span:before {
            content: "";
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 3px;
        }
        
        .rencana:before {
            background: var(--hijau);
        }
        
        .realisasi:before {
            background: var(--biru-sedang);
        }
        
        /* Kehadiran Section */
        .attendance-section {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }
        
        .attendance-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .attendance-header h3 {
            font-size: 18px;
            color: var(--biru-tua);
            font-weight: 600;
        }
        
        .attendance-percentage {
            font-weight: bold;
            color: var(--hijau);
            font-size: 22px;
            background: rgba(16, 185, 129, 0.1);
            padding: 5px 15px;
            border-radius: 20px;
        }
        
        .attendance-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
        
        .attendance-item {
            background: var(--biru-transparan);
            padding: 20px 10px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(27, 85, 158, 0.1);
        }
        
        .attendance-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(27, 85, 158, 0.1);
        }
        
        .attendance-item .value {
            font-weight: 700;
            color: var(--biru-tua);
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .attendance-item .label {
            font-size: 14px;
            color: var(--abu-abu-gelap);
            font-weight: 500;
        }
        
        /* Competency Card */
        .competency-card {
            position: relative;
            overflow: hidden;
            height: auto;
        }
        
        .competency-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--ungu), var(--merah));
            border-radius: 5px 5px 0 0;
        }
        
        .competency-list {
            list-style: none;
            margin-top: 10px;
        }
        
        .competency-item {
            margin-bottom: 20px;
        }
        
        .competency-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .competency-name {
            font-weight: 600;
            color: var(--biru-tua);
            font-size: 16px;
        }
        
        .competency-level {
            font-weight: 700;
            color: var(--ungu);
            font-size: 16px;
        }
        
        .progress-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .progress-bar-container {
            flex: 1;
            height: 10px;
            background: var(--abu-abu);
            border-radius: 5px;
            overflow: hidden;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 5px;
        }
        
        .progress-value {
            font-weight: 600;
            color: var(--biru-tua);
            min-width: 45px;
            font-size: 16px;
        }
        
        .leadership .progress-bar { background: var(--biru-sedang); width: 75%; }
        .technical .progress-bar { background: var(--hijau); width: 85%; }
        .strategic .progress-bar { background: var(--ungu); width: 65%; }
        .communication .progress-bar { background: var(--kuning); width: 90%; }
        
        /* Main Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        /* Career Plan */
        .career-plan {
            position: relative;
            height: auto;
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
            padding: 20px;
            border-radius: 16px;
            background: var(--biru-transparan);
            transition: all 0.3s ease;
            border: 1px solid rgba(27, 85, 158, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .career-step:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
        }
        
        .career-step::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.1;
            pointer-events: none;
        }
        
        .step-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--biru-sedang), var(--biru-tua));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(27, 85, 158, 0.2);
            z-index: 1;
        }
        
        .step-content {
            flex: 1;
            z-index: 1;
        }
        
        .step-content h3 {
            font-size: 18px;
            color: var(--biru-tua);
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .step-content p {
            font-size: 15px;
            color: var(--abu-abu-gelap);
            margin-bottom: 12px;
        }
        
        .step-year {
            background: var(--biru-tua);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            box-shadow: 0 3px 8px rgba(27, 85, 158, 0.2);
        }
        
        /* Development Plan */
        .development-plan {
            max-height: 350px;
            overflow-y: auto;
            padding-right: 15px;
            margin-top: 15px;
        }
        
        .development-plan::-webkit-scrollbar {
            width: 8px;
        }
        
        .development-plan::-webkit-scrollbar-thumb {
            background: var(--biru-sedang);
            border-radius: 4px;
        }
        
        .development-plan::-webkit-scrollbar-track {
            background: var(--biru-transparan);
            border-radius: 4px;
        }
        
        .plan-item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(27, 85, 158, 0.1);
            border-left: 4px solid var(--hijau);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .plan-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
        }
        
        .plan-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.1;
            pointer-events: none;
        }
        
        .plan-item h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: var(--biru-tua);
            font-weight: 600;
        }
        
        .progress-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .progress-bar {
            flex: 1;
            height: 10px;
            background: var(--abu-abu);
            border-radius: 5px;
            overflow: hidden;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .progress {
            height: 100%;
            border-radius: 5px;
            background: var(--hijau);
        }
        
        .progress-value {
            font-weight: 700;
            color: var(--hijau);
            min-width: 50px;
            font-size: 18px;
        }
        
        .deadline {
            font-size: 14px;
            color: var(--abu-abu-gelap);
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(27, 85, 158, 0.05);
            padding: 8px 15px;
            border-radius: 20px;
            width: fit-content;
        }
        
        /* Vacant Positions */
        .vacant-positions .position-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 15px;
        }
        
        .position-item {
            background: white;
            padding: 20px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid var(--biru-sedang);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(27, 85, 158, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .position-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
        }
        
        .position-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.1;
            pointer-events: none;
        }
        
        .position-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--biru-tua);
            font-weight: 600;
        }
        
        .position-info p {
            font-size: 14px;
            color: var(--abu-abu-gelap);
        }
        
        .position-date {
            background: var(--biru-tua);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            min-width: 100px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(27, 85, 158, 0.2);
        }
        
        .search-jabatan {
            display: flex;
            margin-top: 20px;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 4px 12px rgba(27, 85, 158, 0.1);
        }
        
        .search-jabatan input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            background: transparent;
            outline: none;
            font-size: 15px;
        }
        
        .search-jabatan button {
            background: var(--biru-tua);
            color: white;
            border: none;
            padding: 15px 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .search-jabatan button:hover {
            background: var(--biru-sedang);
        }
        
        /* Talent Matrix */
        .talent-matrix {
            grid-column: span 2;
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(27, 85, 158, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .talent-matrix::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.05;
            pointer-events: none;
        }
        
        .matrix-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .matrix-header h2 {
            font-size: 22px;
            color: var(--biru-tua);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
        }
        
        .matrix-header button {
            background: var(--biru-tua);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(27, 85, 158, 0.2);
        }
        
        .matrix-header button:hover {
            background: var(--biru-sedang);
            transform: translateY(-3px);
        }
        
        .matrix-container {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 20px;
        }
        
        .y-axis {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px 0;
        }
        
        .y-axis div {
            font-weight: 700;
            color: var(--biru-tua);
            text-align: center;
            padding: 15px 0;
            transform: rotate(-90deg);
            white-space: nowrap;
            font-size: 16px;
        }
        
        .matrix-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 15px;
        }
        
        .matrix-box {
            background: var(--biru-transparan);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(27, 85, 158, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(27, 85, 158, 0.1);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .matrix-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(27, 85, 158, 0.15);
        }
        
        .matrix-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.1;
            pointer-events: none;
        }
        
        .matrix-box h3 {
            font-size: 16px;
            text-align: center;
            margin-bottom: 15px;
            color: var(--biru-tua);
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(27, 85, 158, 0.1);
            font-weight: 600;
        }
        
        .employee-list {
            list-style: none;
            font-size: 14px;
            flex: 1;
            z-index: 1;
        }
        
        .employee-list li {
            padding: 10px 0;
            border-bottom: 1px dashed rgba(27, 85, 158, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .employee-list li:before {
            content: "•";
            color: var(--biru-sedang);
            font-size: 20px;
        }
        
        .employee-list li:last-child {
            border-bottom: none;
        }
        
        .x-axis {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        
        .x-axis div {
            font-weight: 700;
            color: var(--biru-tua);
            text-align: center;
            padding: 15px 0;
            font-size: 16px;
        }
        
        /* Box Colors */
        .box-high {
            background: rgba(209, 250, 229, 0.7);
            border-color: #6ee7b7;
        }
        
        .box-medium {
            background: rgba(219, 234, 254, 0.7);
            border-color: #93c5fd;
        }
        
        .box-low {
            background: rgba(254, 243, 199, 0.7);
            border-color: #fcd34d;
        }
        
        /* Talent Insights */
        .talent-insights {
            grid-column: span 2;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .insight-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            border: 1px solid rgba(27, 85, 158, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .insight-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--budaya-pattern);
            opacity: 0.05;
            pointer-events: none;
        }
        
        .insight-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .insight-header h2 {
            font-size: 20px;
            color: var(--biru-tua);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
        }
        
        .chart-container {
            height: 250px;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: var(--abu-abu-gelap);
            font-size: 14px;
            margin-top: 20px;
            border-top: 1px solid rgba(27, 85, 158, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .top-row {
                grid-template-columns: 1fr;
            }
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .talent-matrix, .talent-insights {
                grid-column: span 1;
            }
        }
        
        @media (max-width: 992px) {
            .performance-card {
                grid-template-columns: 1fr;
            }
            .matrix-container {
                grid-template-columns: 80px 1fr;
            }
            .y-axis div {
                font-size: 14px;
            }
            .talent-insights {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .header-left {
                flex-direction: column;
            }
            .nav-container {
                flex-wrap: wrap;
            }
            .nav-item {
                flex: 1 0 33%;
                padding: 15px 0;
                font-size: 14px;
            }
            .nav-item i {
                font-size: 18px;
            }
            .attendance-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            .performance-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="header-left">
                <div class="logo-budaya">
                    <i class="fas fa-landmark"></i>
                </div>
                <div>
                    <h1><i class="fas fa-users"></i> Dashboard Manajemen Talenta</h1>
                    <p>Kementerian Kebudayaan Republik Indonesia</p>
                </div>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <h3>Budi Santoso</h3>
                    <p>Analis SDM Aparatur Ahli Pertama</p>
                </div>
            </div>
        </header>

        <!-- Navigation -->
        <div class="nav-container">
            <div class="nav-item active">
                <i class="fas fa-home"></i>
                <span>Overview</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-road"></i>
                <span>Rencana Karier</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-chart-line"></i>
                <span>Pengembangan</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-map"></i>
                <span>Peta Talent</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-star"></i>
                <span>Kinerja</span>
            </div>
        </div>

        <!-- Top Row - 3 Columns -->
        <div class="top-row">
            <!-- Box Identifikasi -->
            <div class="box-identifikasi">
                <div class="box-header">
                    <h2>Anda Berada di Box</h2>
                    <div class="box-tag">High Potential</div>
                </div>
                <div class="box-content">
                    <p>Posisi</p>
                    <strong>9 dari 140 pegawai</strong>
                    <p>Pengembangan:</p>
                    <ul class="pengembangan-list">
                        <li>Tugas Belajar</li>
                        <li>Shortcourse</li>
                        <li>Mentoring Eksekutif</li>
                        <li>Rotasi Jabatan</li>
                    </ul>
                </div>
            </div>

            <!-- Performance Card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-chart-line"></i> Perfoma Bulan Ini</h2>
                </div>
                <div class="performance-card">
                    <div class="performance-info">
                        <div class="job-info">
                            <h3>Jabatan</h3>
                            <p>Analis SDM Aparatur Ahli Pertama</p>

                            <div class="grade-salary">
                                <div>
                                    <h3>Grade</h3>
                                    <p>Grade 8</p>
                                </div>
                                <div>
                                    <h3>Gaji</h3>
                                    <p>Rp. 12.000.000,00</p>
                                </div>
                            </div>

                            <div class="salary-increase">
                                <i class="fas fa-arrow-up"></i>
                                <span>+22%</span>
                            </div>
                        </div>

                        <div class="performance-stats">
                            <div class="stat-item">
                                <div class="value">5 Kali</div>
                                <div class="label">Full Day</div>
                            </div>
                            <div class="stat-item">
                                <div class="value">2 Kali</div>
                                <div class="label">Full Board</div>
                            </div>
                            <div class="stat-item">
                                <div class="value">100%</div>
                                <div class="label">Gaji</div>
                            </div>
                            <div class="stat-item">
                                <div class="value">100%</div>
                                <div class="label">Tukin</div>
                            </div>
                        </div>

                        <!-- Bagian Kehadiran -->
                        <div class="attendance-section">
                            <div class="attendance-header">
                                <h3>Kehadiran</h3>
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
                        </div>
                    </div>

                    <div class="performance-chart">
                        <div class="chart-circle">
                            <div class="chart-value">68%</div>
                        </div>
                        <div class="chart-label">
                            <span class="rencana">Rencana</span>
                            <span class="realisasi">Realisasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Competency Card -->
            <div class="card competency-card">
                <div class="card-header">
                    <h2><i class="fas fa-star"></i> Kompetensi Anda</h2>
                </div>
                <div class="competency-list">
                    <div class="competency-item leadership">
                        <div class="competency-title">
                            <span class="competency-name">Kepemimpinan</span>
                            <span class="competency-level">Mahir</span>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar-container">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="progress-value">75%</div>
                        </div>
                    </div>
                    <div class="competency-item technical">
                        <div class="competency-title">
                            <span class="competency-name">Teknis SDM</span>
                            <span class="competency-level">Ahli</span>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar-container">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="progress-value">85%</div>
                        </div>
                    </div>
                    <div class="competency-item strategic">
                        <div class="competency-title">
                            <span class="competency-name">Perencanaan Strategis</span>
                            <span class="competency-level">Menengah</span>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar-container">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="progress-value">65%</div>
                        </div>
                    </div>
                    <div class="competency-item communication">
                        <div class="competency-title">
                            <span class="competency-name">Komunikasi</span>
                            <span class="competency-level">Ahli</span>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar-container">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="progress-value">90%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Career Plan -->
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-road"></i> Rencana Karier Anda</h2>
                    </div>
                    <div class="career-plan">
                        <div class="career-steps">
                            <div class="career-step">
                                <div class="step-icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Target Saat Ini (2023)</h3>
                                    <p>Kasubbag Tata Usaha</p>
                                    <span class="step-year">2023</span>
                                </div>
                            </div>
                            <div class="career-step">
                                <div class="step-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Target Jangka Menengah (2025)</h3>
                                    <p>Analis SDM Ahli Muda</p>
                                    <span class="step-year">2025</span>
                                </div>
                            </div>
                            <div class="career-step">
                                <div class="step-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Target Jangka Panjang (2030)</h3>
                                    <p>Kepala Biro SDM</p>
                                    <span class="step-year">2030</span>
                                </div>
                            </div>
                            <div class="career-step">
                                <div class="step-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Target Akhir Karir (2035)</h3>
                                    <p>Direktur SDM</p>
                                    <span class="step-year">2035</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vacant Positions -->
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-bullhorn"></i> Jabatan Lowong</h2>
                    </div>
                    <div class="vacant-positions">
                        <div class="position-list">
                            <div class="position-item">
                                <div class="position-info">
                                    <h3>Kasubbag Tata Usaha</h3>
                                    <p>Universitas Indonesia</p>
                                </div>
                                <div class="position-date">18 Okt 2023</div>
                            </div>
                            <div class="position-item">
                                <div class="position-info">
                                    <h3>Analis SDM Ahli Muda</h3>
                                    <p>Sekretariat Jenderal GTK</p>
                                </div>
                                <div class="position-date">20 Okt 2023</div>
                            </div>
                            <div class="position-item">
                                <div class="position-info">
                                    <h3>PTP Ahli Pertama</h3>
                                    <p>Sekretariat Jenderal GTK</p>
                                </div>
                                <div class="position-date">25 Okt 2023</div>
                            </div>
                            <div class="position-item">
                                <div class="position-info">
                                    <h3>Analis Perencanaan</h3>
                                    <p>Biro SDM</p>
                                </div>
                                <div class="position-date">20 Okt 2023</div>
                            </div>
                        </div>

                        <div class="search-jabatan">
                            <input type="text" placeholder="Cari jabatan lowong...">
                            <button><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Development Plan -->
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-graduation-cap"></i> Rencana Pengembangan</h2>
                    </div>
                    <div class="development-plan">
                        <div class="plan-item">
                            <h3>Pelatihan Kepemimpinan</h3>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress" style="width: 75%;"></div>
                                </div>
                                <div class="progress-value">75%</div>
                            </div>
                            <div class="deadline">
                                <i class="fas fa-calendar"></i>
                                <span>Deadline: 30 Nov 2023</span>
                            </div>
                        </div>
                        <div class="plan-item">
                            <h3>Sertifikasi Manajemen SDM</h3>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress" style="width: 40%;"></div>
                                </div>
                                <div class="progress-value">40%</div>
                            </div>
                            <div class="deadline">
                                <i class="fas fa-calendar"></i>
                                <span>Deadline: 15 Jan 2024</span>
                            </div>
                        </div>
                        <div class="plan-item">
                            <h3>Pelatihan Analisis Data</h3>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress" style="width: 20%;"></div>
                                </div>
                                <div class="progress-value">20%</div>
                            </div>
                            <div class="deadline">
                                <i class="fas fa-calendar"></i>
                                <span>Deadline: 28 Feb 2024</span>
                            </div>
                        </div>
                        <div class="plan-item">
                            <h3>Workshop Manajemen Proyek</h3>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress" style="width: 10%;"></div>
                                </div>
                                <div class="progress-value">10%</div>
                            </div>
                            <div class="deadline">
                                <i class="fas fa-calendar"></i>
                                <span>Deadline: 15 Mar 2024</span>
                            </div>
                        </div>
                        <div class="plan-item">
                            <h3>Sertifikasi Analisis Data</h3>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress" style="width: 5%;"></div>
                                </div>
                                <div class="progress-value">5%</div>
                            </div>
                            <div class="deadline">
                                <i class="fas fa-calendar"></i>
                                <span>Deadline: 30 Apr 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Talent Matrix -->
        <div class="talent-matrix">
            <div class="matrix-header">
                <h2><i class="fas fa-th-large"></i> Peta Talent Matrix</h2>
                <button>
                    <i class="fas fa-download"></i> Ekspor Data
                </button>
            </div>

            <div class="matrix-container">
                <div class="y-axis">
                    <div>Potensi Rendah</div>
                    <div>Potensi Sedang</div>
                    <div>Potensi Tinggi</div>
                </div>

                <div class="matrix-content">
                    <!-- Row 1 -->
                    <div class="matrix-box box-low">
                        <h3>Perlu Perbaikan</h3>
                        <ul class="employee-list">
                            <li>Andi Wijaya</li>
                            <li>Budi Cahyono</li>
                        </ul>
                    </div>

                    <div class="matrix-box box-low">
                        <h3>Peran Pendukung</h3>
                        <ul class="employee-list">
                            <li>Joko Prasetyo</li>
                            <li>Maya Indah</li>
                        </ul>
                    </div>

                    <div class="matrix-box box-low">
                        <h3>Spesialis</h3>
                        <ul class="employee-list">
                            <li>Linda Susanti</li>
                            <li>Agus Riyanto</li>
                        </ul>
                    </div>

                    <!-- Row 2 -->
                    <div class="matrix-box box-medium">
                        <h3>Perlu Pengembangan</h3>
                        <ul class="employee-list">
                            <li>Bambang Sutrisno</li>
                            <li>Citra Dewi</li>
                        </ul>
                    </div>

                    <div class="matrix-box box-medium">
                        <h3>Kontributor Inti</h3>
                        <ul class="employee-list">
                            <li>Dian Permatasari</li>
                            <li>Fajar Setiawan</li>
                            <li>Yuni Astuti</li>
                        </ul>
                    </div>

                    <div class="matrix-box box-medium">
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
                            <li>Rudi Hermawan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="x-axis">
                <div>Kinerja Rendah</div>
                <div>Kinerja Sedang</div>
                <div>Kinerja Tinggi</div>
            </div>
        </div>

        <!-- Talent Insights -->
        <div class="talent-insights">
            <div class="insight-card">
                <div class="insight-header">
                    <h2><i class="fas fa-chart-pie"></i> Distribusi Talenta</h2>
                </div>
                <div class="chart-container">
                    <canvas id="talentDistribution"></canvas>
                </div>
            </div>

            <div class="insight-card">
                <div class="insight-header">
                    <h2><i class="fas fa-chart-line"></i> Tren Kinerja 6 Bulan</h2>
                </div>
                <div class="chart-container">
                    <canvas id="performanceTrend"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2023 Kementerian Kebudayaan Republik Indonesia - Manajemen Talenta Pegawai</p>
        </div>
    </div>

    <script>
        // Inisialisasi chart distribusi talenta
        const distCtx = document.getElementById('talentDistribution').getContext('2d');
        const talentDistributionChart = new Chart(distCtx, {
            type: 'doughnut',
            data: {
                labels: ['Bintang Masa Depan', 'Calon Bintang', 'Kontributor Utama', 'Kontributor Inti', 'Spesialis', 'Lainnya'],
                datasets: [{
                    data: [12, 18, 15, 25, 10, 20],
                    backgroundColor: [
                        '#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ef4444', '#6b7280'
                    ],
                    borderWidth: 0,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 13,
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(30, 58, 138, 0.9)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                cutout: '60%'
            }
        });

        // Inisialisasi chart tren kinerja
        const trendCtx = document.getElementById('performanceTrend').getContext('2d');
        const performanceTrendChart = new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Kinerja Rata-rata',
                    data: [78, 82, 80, 85, 88, 90],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3,
                    fill: true,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointBackgroundColor: '#3b82f6',
                    pointHoverRadius: 7
                }, {
                    label: 'Kinerja Anda',
                    data: [75, 80, 85, 88, 92, 95],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.3,
                    fill: true,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointBackgroundColor: '#10b981',
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 13,
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(30, 58, 138, 0.9)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 70,
                        max: 100,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        },
                        title: {
                            display: true,
                            text: 'Skor Kinerja',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        },
                        title: {
                            display: true,
                            text: 'Bulan',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>