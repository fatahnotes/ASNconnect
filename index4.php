<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASN Connect - Kementerian Kebudayaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        :root {
            --primary: #2c5c3e; /* Hijau Kebudayaan */
            --primary-light: #3a7d55;
            --secondary: #8e6c4a; /* Coklat Kebudayaan */
            --accent: #d4af37; /* Emas */
            --warning: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
            --text: #333;
            --text-light: #6c757d;
            --gold: #ffd700;
            --silver: #c0c0c0;
            --bronze: #cd7f32;
            --card-bg: #ffffff;
            --section-radius: 20px;
            --shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        
        body {
            background: linear-gradient(135deg, #f0f2f5, #e1e5ea);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .app-container {
            max-width: 480px;
            margin: 0 auto;
            background: var(--light);
            min-height: 100vh;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        
        /* Main Content */
        .content-section {
            padding: 0;
            display: none;
        }
        
        .content-section.active {
            display: block;
        }
        
        /* Dashboard Hero Section */
        .hero-section {
            position: relative;
            height: 300px;
            background: url('https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?ixlib=rb-4.1.0&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 16px;
            color: white;
            overflow: hidden;
            border-radius: 0 0 30px 30px;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(44, 92, 62, 0.7));
            z-index: 1;
        }
        
        .dashboard-header {
            position: relative;
            z-index: 3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
            background: rgba(255,255,255,0.3);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.4);
            overflow: hidden;
        }
        
        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .brand-text {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.3px;
            color: white;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        
        .header-icon {
            font-size: 16px;
            background: rgba(255,255,255,0.3);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.4);
        }
        
        .header-icon:hover {
            background: rgba(255,255,255,0.4);
            transform: scale(1.05);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-top: 2px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-bottom: 5px;
        }
        
        .user-greeting {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
            color: var(--light);
        }
        
        .user-position {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 15px;
            color: rgba(255,255,255,0.9);
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            background: rgba(0,0,0,0.15);
            display: inline-block;
            padding: 4px 15px;
            border-radius: 20px;
        }
        
        /* Stat Cards - New Design */
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 15px;
            padding: 0 16px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.3);
        }
        
        .stat-value {
            font-weight: 700;
            font-size: 18px;
            color: white;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .stat-label {
            font-size: 11px;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Progress Stats Section */
        .progress-stats {
            background: var(--card-bg);
            border-radius: var(--section-radius);
            padding: 20px;
            margin: 16px;
            margin-top: -15px;
            position: relative;
            z-index: 3;
            box-shadow: var(--shadow);
        }
        
        .progress-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .progress-title i {
            color: var(--accent);
        }
        
        .stat-item {
            margin-bottom: 20px;
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .stat-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--dark);
        }
        
        .stat-percent {
            font-weight: 600;
            color: var(--primary);
            font-size: 14px;
        }
        
        .progress-container {
            height: 8px;
            background: #e9ecef;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 5px;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, var(--primary), var(--primary-light));
            border-radius: 8px;
        }
        
        .stat-value-small {
            font-size: 12px;
            color: var(--text-light);
            text-align: right;
        }
        
        /* Quick Menu */
        .quick-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            padding: 0 16px;
            margin-bottom: 20px;
        }
        
        .menu-item {
            text-align: center;
            padding: 12px 0;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .menu-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .menu-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 8px;
            font-size: 18px;
        }
        
        .menu-text {
            font-size: 12px;
            color: var(--text);
            font-weight: 500;
        }
        
        /* News Section */
        .news-section {
            background: var(--card-bg);
            border-radius: var(--section-radius);
            padding: 16px;
            margin: 16px;
            box-shadow: var(--shadow);
        }
        
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        
        .section-title h2 {
            color: var(--primary);
            font-size: 16px;
            font-weight: 600;
        }
        
        .section-title a {
            color: var(--primary);
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
        }
        
        .news-container {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 6px 3px;
            scrollbar-width: none;
        }
        
        .news-container::-webkit-scrollbar {
            display: none;
        }
        
        .news-card {
            min-width: 220px;
            background: #f8f9fa;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0,0,0,0.04);
            transition: all 0.3s;
            border: 1px solid #eee;
        }
        
        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 14px rgba(0,0,0,0.1);
        }
        
        .news-image {
            height: 120px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }
        
        .news-content {
            padding: 12px;
        }
        
        .news-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary);
        }
        
        .news-excerpt {
            font-size: 12px;
            color: var(--text-light);
            line-height: 1.4;
        }
        
        /* Training Section */
        .training-section {
            background: var(--card-bg);
            border-radius: var(--section-radius);
            padding: 16px;
            margin: 16px;
            margin-bottom: 80px;
            box-shadow: var(--shadow);
        }
        
        .training-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .training-item {
            display: flex;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 12px;
            border-left: 3px solid var(--primary);
            transition: all 0.3s;
        }
        
        .training-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }
        
        .training-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            margin-right: 15px;
        }
        
        .training-content {
            flex: 1;
        }
        
        .training-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
            font-size: 14px;
        }
        
        .training-details {
            display: flex;
            font-size: 11px;
            color: var(--text-light);
            gap: 10px;
        }
        
        .training-status {
            background: var(--accent);
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            margin-top: 5px;
            display: inline-block;
        }
        
        /* Profile Section */
        .profile-section {
            position: relative;
            height: 300px;
            background: url('https://images.unsplash.com/photo-1513407030348-c983a97b98d8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 16px;
            color: white;
            overflow: hidden;
            border-radius: 0 0 30px 30px;
        }
        
        .profile-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(44, 92, 62, 0.7));
            z-index: 1;
        }
        
        .profile-header {
            position: relative;
            z-index: 3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }
        
        .profile-content {
            position: relative;
            z-index: 2;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-bottom: 20px;
        }
        
        .profile-pic-container {
            position: relative;
            margin: 0 auto 15px;
            width: 100px;
            height: 100px;
        }
        
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: 4px solid white;
            box-shadow: 0 5px 18px rgba(0,0,0,0.2);
            position: relative;
            z-index: 2;
            overflow: hidden;
        }
        
        .profile-pic i {
            font-size: 42px;
        }
        
        .profile-name {
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-bottom: 4px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .profile-position {
            color: rgba(255,255,255,0.9);
            font-size: 15px;
            position: relative;
            z-index: 2;
            margin-bottom: 15px;
            background: rgba(0,0,0,0.3);
            display: inline-block;
            padding: 4px 15px;
            border-radius: 20px;
        }
        
        .profile-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--accent);
            color: #333;
            padding: 5px 10px;
            border-radius: 16px;
            font-weight: 600;
            font-size: 12px;
            z-index: 3;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }
        
        /* Profile Stats */
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin: 0 auto;
            max-width: 92%;
            width: 100%;
            position: relative;
            z-index: 2;
            padding-top: 10px;
            padding-bottom: 15px;
        }
        
        .stat-item-profile {
            text-align: center;
            padding: 12px 0;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        
        .stat-item-profile:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: translateY(-3px);
        }
        
        .stat-value-profile {
            font-weight: 700;
            font-size: 18px;
            color: white;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .stat-label-profile {
            font-size: 12px;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 500;
        }
        
        /* Profile Info Section */
        .profile-info-section {
            background: var(--card-bg);
            border-radius: var(--section-radius);
            padding: 20px;
            margin: 20px;
            margin-top: -20px;
            position: relative;
            z-index: 2;
            box-shadow: var(--shadow);
        }
        
        .profile-menu {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .profile-menu-item {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .profile-menu-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-menu-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 10px;
            font-size: 18px;
        }
        
        .profile-menu-text {
            font-size: 12px;
            font-weight: 500;
            color: var(--text);
        }
        
        /* Profile Info */
        .profile-info {
            margin-bottom: 25px;
        }
        
        .info-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-title i {
            color: var(--accent);
        }
        
        .info-item {
            display: flex;
            margin-bottom: 12px;
        }
        
        .info-label {
            width: 120px;
            font-weight: 500;
            color: var(--text-light);
            font-size: 13px;
        }
        
        .info-value {
            flex: 1;
            font-weight: 500;
            color: var(--text);
            font-size: 13px;
        }
        
        /* Credit Points Section */
        .credit-section {
            background: var(--card-bg);
            border-radius: var(--section-radius);
            padding: 20px;
            margin: 20px;
            box-shadow: var(--shadow);
            text-align: center;
        }
        
        .credit-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .credit-points {
            font-size: 48px;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 10px;
        }
        
        .credit-subtitle {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 20px;
        }
        
        .credit-description {
            font-size: 13px;
            color: var(--text);
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .credit-btn {
            background: linear-gradient(to right, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }
        
        .credit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(44, 92, 62, 0.3);
        }
        
        /* QR Section */
        .qr-section {
            text-align: center;
            padding: 20px;
            background: var(--card-bg);
            border-radius: var(--section-radius);
            margin: 20px;
            box-shadow: var(--shadow);
        }
        
        .qr-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .qr-code {
            width: 180px;
            height: 180px;
            background: #f8f9fa;
            margin: 0 auto 20px;
            border: 1px solid #eee;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: var(--primary);
        }
        
        .qr-text {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 20px;
        }
        
        .qr-btn {
            background: linear-gradient(to right, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .qr-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(44, 92, 62, 0.3);
        }
        
        /* Absensi Section */
        .absensi-section {
            padding: 40px 20px;
            text-align: center;
        }
        
        .absensi-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .absensi-subtitle {
            font-size: 15px;
            color: var(--text-light);
            margin-bottom: 30px;
        }
        
        .absensi-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow);
            max-width: 320px;
            margin: 0 auto;
        }
        
        .absensi-time {
            font-size: 48px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .absensi-date {
            font-size: 16px;
            color: var(--text-light);
            margin-bottom: 30px;
        }
        
        .absensi-btn {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), #e6c64d);
            color: white;
            border: none;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }
        
        .absensi-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.4);
        }
        
        .absensi-status {
            font-size: 14px;
            color: var(--accent);
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .absensi-location {
            font-size: 13px;
            color: var(--text-light);
        }
        
        /* Notification Section */
        .notification-section {
            padding: 20px;
        }
        
        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .notification-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary);
        }
        
        .notification-filter {
            background: #e9ecef;
            border: none;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 13px;
            color: var(--text);
        }
        
        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .notification-item {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 16px;
            box-shadow: var(--shadow);
            position: relative;
            transition: all 0.3s;
        }
        
        .notification-item.unread {
            border-left: 3px solid var(--primary);
        }
        
        .notification-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        
        .notification-title-item {
            font-size: 15px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .notification-content {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 12px;
            line-height: 1.5;
        }
        
        .notification-footer {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .notification-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 10px;
            height: 10px;
            background: var(--primary);
            border-radius: 50%;
        }
        
        /* Footer Navigation */
        .footer-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--card-bg);
            display: flex;
            box-shadow: 0 -3px 12px rgba(0,0,0,0.08);
            height: 70px;
            z-index: 100;
            max-width: 480px;
            margin: 0 auto;
            border-radius: 20px 20px 0 0;
            overflow: hidden;
            border-top: 1px solid #f0f2f5;
        }
        
        .nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }
        
        .nav-item.active {
            color: var(--primary);
        }
        
        .nav-item.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 36px;
            height: 3px;
            background: var(--primary);
            border-radius: 0 0 3px 3px;
        }
        
        .nav-item i {
            font-size: 18px;
            margin-bottom: 4px;
            transition: all 0.3s;
        }
        
        .nav-item.active i {
            color: var(--primary);
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
            background: linear-gradient(135deg, var(--accent), #e6c64d);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
            z-index: 101;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .absensi-button:hover {
            transform: translateX(-50%) scale(1.1);
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.4);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .brand-text {
                font-size: 15px;
            }
            
            .user-greeting {
                font-size: 18px;
            }
            
            .stat-card {
                padding: 10px;
            }
            
            .stat-value {
                font-size: 16px;
            }
            
            .progress-stats {
                padding: 14px;
            }
            
            .absensi-btn {
                width: 140px;
                height: 140px;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Dashboard Content -->
        <div class="content-section active" id="dashboard-content">
            <div class="hero-section">
                <div class="dashboard-header">
                    <div class="brand">
                        <div class="brand-logo">
                            <img src="/asncon/img/logobud.png" alt="Logo Kementerian Kebudayaan">
                        </div>
                        <div class="brand-text">ASN Connect</div>
                    </div>
                    <div class="header-icon" id="notif-btn">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
                
                <div class="hero-content">
                    <div class="user-greeting">Selamat Pagi, Ronald Siahaan!</div>
                    <div class="user-position">Penata Muda Tk.I - III/c</div>
                    
                    <div class="stat-cards">
                        <div class="stat-card">
                            <div class="stat-value">87%</div>
                            <div class="stat-label">SKP Terpenuhi</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">24</div>
                            <div class="stat-label">Pelatihan</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">96%</div>
                            <div class="stat-label">Kehadiran</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">92</div>
                            <div class="stat-label">Kredit Point</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Progress Stats Section -->
            <div class="progress-stats">
                <div class="progress-title">
                    <i class="fas fa-chart-line"></i>
                    Statistik Kinerja
                </div>
                
                <div class="stat-item">
                    <div class="stat-header">
                        <div class="stat-name">Jumlah Log Harian</div>
                        <div class="stat-percent">0.00</div>
                    </div>
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <div class="stat-value-small">100/100</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-header">
                        <div class="stat-name">Ketepatan Waktu Pengisian</div>
                        <div class="stat-percent">0.00</div>
                    </div>
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <div class="stat-value-small">80/100</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-header">
                        <div class="stat-name">Keterkaitan Log Harian dengan SKP</div>
                        <div class="stat-percent">0.00</div>
                    </div>
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <div class="stat-value-small">75/100</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-header">
                        <div class="stat-name">Nilai Capaian Bulanan</div>
                        <div class="stat-percent">0.00</div>
                    </div>
                    <div class="progress-container">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <div class="stat-value-small">90/100</div>
                </div>
            </div>
            
            <div class="quick-menu">
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="menu-text">Diklat</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="menu-text">Kinerja</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="menu-text">Kenaikan Pangkat</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="menu-text">Cuti</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="menu-text">Mutasi</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="menu-text">Sertifikasi</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <div class="menu-text">Layanan Kesehatan</div>
                </div>
                <div class="menu-item">
                    <div class="menu-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="menu-text">QR ASN</div>
                </div>
            </div>
            
            <div class="news-section">
                <div class="section-title">
                    <h2>Pengumuman Terbaru</h2>
                    <a href="#">Lihat Semua</a>
                </div>
                <div class="news-container">
                    <div class="news-card">
                        <div class="news-image" style="background: linear-gradient(to right, #4a6582, #2c3e50);">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="news-content">
                            <div class="news-title">Pembaruan Sistem SKP 2025</div>
                            <div class="news-excerpt">Pelajari fitur baru sistem pengisian Sasaran Kinerja Pegawai untuk tahun 2025</div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="news-image" style="background: linear-gradient(to right, #28a745, #1e7e34);">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="news-content">
                            <div class="news-title">Jadwal Pelatihan Kepemimpinan</div>
                            <div class="news-excerpt">Daftarkan diri Anda untuk pelatihan kepemimpinan tingkat IV pada bulan depan</div>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="news-image" style="background: linear-gradient(to right, #dc3545, #bd2130);">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="news-content">
                            <div class="news-title">Penting: Perubahan Kebijakan Cuti</div>
                            <div class="news-excerpt">Perubahan kebijakan cuti tahunan mulai Januari 2025</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="training-section">
                <div class="section-title">
                    <h2>Pelatihan Mendatang</h2>
                    <a href="#">Lihat Semua</a>
                </div>
                <div class="training-list">
                    <div class="training-item">
                        <div class="training-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="training-content">
                            <div class="training-title">Pelatihan Digital Transformation</div>
                            <div class="training-details">
                                <span><i class="far fa-calendar"></i> 15-17 Jan 2025</span>
                                <span><i class="far fa-clock"></i> 08:00 - 16:00</span>
                            </div>
                            <div class="training-status">Terdaftar</div>
                        </div>
                    </div>
                    <div class="training-item">
                        <div class="training-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="training-content">
                            <div class="training-title">Manajemen Kinerja Strategis</div>
                            <div class="training-details">
                                <span><i class="far fa-calendar"></i> 22-24 Feb 2025</span>
                                <span><i class="far fa-clock"></i> 09:00 - 15:00</span>
                            </div>
                            <div class="training-status">Pendaftaran Dibuka</div>
                        </div>
                    </div>
                    <div class="training-item">
                        <div class="training-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="training-content">
                            <div class="training-title">Uji Kompetensi Manajerial</div>
                            <div class="training-details">
                                <span><i class="far fa-calendar"></i> 5 Mar 2025</span>
                                <span><i class="far fa-clock"></i> 13:00 - 15:00</span>
                            </div>
                            <div class="training-status">Persiapan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Profile Content -->
        <div class="content-section" id="profile-content">
            <div class="profile-section">
                <div class="profile-header">
                    <div class="brand">
                        <div class="brand-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Lambang_Kementerian_Pendidikan_dan_Kebudayaan_Indonesia.svg/1200px-Lambang_Kementerian_Pendidikan_dan_Kebudayaan_Indonesia.svg.png" alt="Logo Kementerian Kebudayaan">
                        </div>
                        <div class="brand-text">Profil ASN</div>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
                
                <div class="profile-content">
                    <div class="profile-pic-container">
                        <div class="profile-pic">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="profile-badge">Aktif</div>
                    </div>
                    <h2 class="profile-name">Ronald Siahaan, S.Kom</h2>
                    <div class="profile-position">Penata Muda Tk.I - III/c</div>
                    
                    <div class="profile-stats">
                        <div class="stat-item-profile">
                            <div class="stat-value-profile">8 Tahun</div>
                            <div class="stat-label-profile">Masa Kerja</div>
                        </div>
                        <div class="stat-item-profile">
                            <div class="stat-value-profile">24</div>
                            <div class="stat-label-profile">Pelatihan</div>
                        </div>
                        <div class="stat-item-profile">
                            <div class="stat-value-profile">96%</div>
                            <div class="stat-label-profile">Kehadiran</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="profile-info-section">
                <div class="profile-menu">
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="profile-menu-text">Riwayat Jabatan</div>
                    </div>
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="profile-menu-text">Sertifikat</div>
                    </div>
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="profile-menu-text">Kinerja</div>
                    </div>
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="profile-menu-text">SKP</div>
                    </div>
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="profile-menu-text">Diklat</div>
                    </div>
                    <div class="profile-menu-item">
                        <div class="profile-menu-icon">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <div class="profile-menu-text">Pengaturan</div>
                    </div>
                </div>
                
                <div class="profile-info">
                    <div class="info-title">
                        <i class="fas fa-info-circle"></i>
                        Informasi Pribadi
                    </div>
                    <div class="info-item">
                        <div class="info-label">NIP</div>
                        <div class="info-value">198204152005021003</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Unit Kerja</div>
                        <div class="info-value">Dinas Komunikasi dan Informatika</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Pangkat/Gol.</div>
                        <div class="info-value">Penata Muda Tk.I / III.c</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Jabatan</div>
                        <div class="info-value">Analis Sistem Informasi</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Masa Kerja</div>
                        <div class="info-value">8 Tahun 4 Bulan</div>
                    </div>
                </div>
            </div>
            
            <div class="credit-section">
                <div class="credit-title">Kredit Point</div>
                <div class="credit-points">92</div>
                <div class="credit-subtitle">Total Poin Kompetensi</div>
                <div class="credit-description">
                    Kredit point Anda mencerminkan kompetensi profesional sebagai ASN. 
                    Poin ini diperoleh dari pelatihan, sertifikasi, dan pencapaian kinerja.
                </div>
                <button class="credit-btn">Lihat Detail Kredit Point</button>
            </div>
            
            <div class="qr-section">
                <div class="qr-title">Kartu Identitas ASN Digital</div>
                <div class="qr-code">
                    <i class="fas fa-qrcode"></i>
                </div>
                <div class="qr-text">Gunakan QR Code ini untuk verifikasi identitas dan presensi</div>
                <button class="qr-btn">Simpan QR Code</button>
            </div>
        </div>
        
        <!-- Absensi Content -->
        <div class="content-section" id="absensi-content">
            <div class="absensi-section">
                <h2 class="absensi-title">Presensi Kehadiran</h2>
                <p class="absensi-subtitle">Lakukan presensi kehadiran sesuai jadwal kerja</p>
                
                <div class="absensi-card">
                    <div class="absensi-time">08:24</div>
                    <div class="absensi-date">Rabu, 28 Februari 2025</div>
                    
                    <button class="absensi-btn">
                        <i class="fas fa-fingerprint"></i>
                    </button>
                    
                    <div class="absensi-status">Status: Belum melakukan presensi pagi</div>
                    <div class="absensi-location">
                        <i class="fas fa-map-marker-alt"></i> Kantor Dinas Kominfo
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Notification Content -->
        <div class="content-section" id="notification-content">
            <div class="notification-section">
                <div class="notification-header">
                    <div class="notification-title">Notifikasi</div>
                    <select class="notification-filter">
                        <option>Semua</option>
                        <option>SKP</option>
                        <option>Pelatihan</option>
                        <option>Administrasi</option>
                        <option>Penting</option>
                    </select>
                </div>
                
                <div class="notification-list">
                    <div class="notification-item unread">
                        <div class="notification-badge"></div>
                        <div class="notification-title-item">Pengingat: Batas Pengisian SKP</div>
                        <div class="notification-content">Batas akhir pengisian Sasaran Kinerja Pegawai (SKP) Tahunan 2025 adalah 15 Maret 2025. Segera lengkapi SKP Anda.</div>
                        <div class="notification-footer">
                            <span>SKP</span>
                            <span>2 jam yang lalu</span>
                        </div>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-title-item">Pelatihan Dikonfirmasi</div>
                        <div class="notification-content">Pendaftaran Anda untuk Pelatihan Manajemen Kinerja Strategis pada 22-24 Februari 2025 telah dikonfirmasi.</div>
                        <div class="notification-footer">
                            <span>Pelatihan</span>
                            <span>Kemarin</span>
                        </div>
                    </div>
                    
                    <div class="notification-item unread">
                        <div class="notification-badge"></div>
                        <div class="notification-title-item">Persetujuan Cuti Tahunan</div>
                        <div class="notification-content">Pengajuan cuti tahunan Anda pada 10-15 Maret 2025 telah disetujui oleh atasan langsung.</div>
                        <div class="notification-footer">
                            <span>Administrasi</span>
                            <span>1 hari yang lalu</span>
                        </div>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-title-item">Pembaruan Sistem ASN Connect</div>
                        <div class="notification-content">Versi terbaru aplikasi ASN Connect (v2.5) telah tersedia. Update sekarang untuk pengalaman lebih baik.</div>
                        <div class="notification-footer">
                            <span>Sistem</span>
                            <span>3 hari yang lalu</span>
                        </div>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-title-item">Jadwal Uji Kompetensi</div>
                        <div class="notification-content">Uji Kompetensi Manajerial Anda dijadwalkan pada 5 Maret 2025 pukul 13.00 WIB di Ruang Aula Lt. 3.</div>
                        <div class="notification-footer">
                            <span>Kompetensi</span>
                            <span>5 hari yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Navigation -->
        <div class="footer-nav">
            <div class="nav-item active" data-target="dashboard-content">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </div>
            <div class="nav-item" data-target="notification-content">
                <i class="fas fa-bell"></i>
                <span>Notifikasi</span>
            </div>
            <div class="absensi-button" data-target="absensi-content">
                <i class="fas fa-fingerprint"></i>
            </div>
            <div class="nav-item" data-target="#">
                <i class="fas fa-graduation-cap"></i>
                <span>Kompetensi</span>
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
                navigateTo('absensi-content');
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
            
            // Simulate progress animation
            const progressFills = document.querySelectorAll('.progress-fill');
            progressFills.forEach(fill => {
                setTimeout(() => {
                    fill.style.width = fill.getAttribute('data-width') || '0%';
                }, 500);
            });
            
            // Absensi button effect
            const absensiBtn = document.querySelector('.absensi-btn');
            if(absensiBtn) {
                absensiBtn.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-check"></i>';
                    this.style.background = 'linear-gradient(135deg, #28a745, #218838)';
                    
                    document.querySelector('.absensi-status').textContent = "Status: Presensi pagi berhasil dicatat (08:25)";
                    document.querySelector('.absensi-status').style.color = "#28a745";
                    
                    // Change button after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-fingerprint"></i> ABSENSI PULANG';
                        this.style.background = 'linear-gradient(135deg, var(--accent), #e6c64d)';
                    }, 2000);
                });
            }
            
            // Add data-width attributes for progress bars
            document.querySelector('.progress-fill[style*="width: 0%"]').setAttribute('data-width', '100%');
            document.querySelector('.progress-fill[style*="width: 0%"] + .progress-fill').setAttribute('data-width', '80%');
            document.querySelector('.progress-fill[style*="width: 0%"] + .progress-fill + .progress-fill').setAttribute('data-width', '75%');
            document.querySelector('.progress-fill[style*="width: 0%"] + .progress-fill + .progress-fill + .progress-fill').setAttribute('data-width', '90%');
        });
    </script>
</body>
</html>