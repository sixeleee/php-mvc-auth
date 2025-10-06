<?php $title = 'Dashboard - PHP MVC Auth'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Bitcount+Prop+Double+Ink:wght@100..900&display=swap" rel="stylesheet">  
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            color: #2c3e50;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        #my-hamburger {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 10000;
            display: none;
            padding: 12px 18px;
            border: none;
            background: white;
            color: #2d5016;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(45, 80, 22, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #my-hamburger:hover {
            background: #2d5016;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(45, 80, 22, 0.25);
        }

        #my-hamburger i {
            font-size: 16px;
        }

        .my-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: white;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 9999;
            border-right: 1px solid rgba(233, 236, 239, 0.8);
            overflow-y: auto;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.05);
        }

        .my-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .my-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .my-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 3px;
        }

        .my-sidebar::-webkit-scrollbar-thumb:hover {
            background: #2d5016;
        }

        .my-sidebar-header {
            padding: 32px 24px 24px;
            background: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .my-sidebar-header h3 {
            color: #2d5016;
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.02em;
        }

        .my-sidebar-header h3 i {
            font-size: 22px;
        }

        .my-sidebar-menu {
            padding: 20px 12px;
        }

        .my-menu-item {
            margin-bottom: 8px;
        }

        .my-menu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            color: #2c3e50;
            cursor: pointer;
            font-weight: 500;
            font-size: 15px;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            user-select: none;
        }

        .my-menu-link:hover {
            background: rgba(45, 80, 22, 0.08);
            color: #2d5016;
            transform: translateX(2px);
        }

        .my-menu-link span {
            display: flex;
            align-items: center;
        }

        .my-menu-icon {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .my-arrow {
            font-size: 12px;
            color: #94a3b8;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .my-arrow.rotated {
            transform: rotate(180deg);
        }

        .my-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 4px;
        }

        .my-submenu.open {
            max-height: 800px;
        }

        .my-submenu-link {
            display: flex;
            align-items: center;
            padding: 12px 16px 12px 48px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            border-radius: 8px;
            margin: 2px 0;
            background: transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .my-submenu-link::before {
            content: '';
            position: absolute;
            left: 32px;
            width: 4px;
            height: 4px;
            background: #cbd5e0;
            border-radius: 50%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .my-submenu-link:hover {
            background: rgba(45, 80, 22, 0.06);
            color: #2d5016;
            padding-left: 52px;
        }

        .my-submenu-link:hover::before {
            background: #2d5016;
            transform: scale(1.5);
        }

        .my-return-dashboard {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            margin: 16px 12px 0;
            color: #2d5016;
            background: transparent;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-top: 1px solid #e9ecef;
        }

        .my-return-dashboard:hover {
            background: rgba(45, 80, 22, 0.08);
            color: #2d5016;
            transform: translateX(2px);
        }

        .my-return-dashboard i {
            font-size: 16px;
        }

        .my-main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        #content-frame {
            width: 100%;
            height: 100vh;
            border: none;
            display: none;
            background: white;
        }

        #content-frame.active {
            display: block;
        }

        .my-dashboard-nav {
            background: white;
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .my-dashboard-nav h2 {
            color: #2d5016;
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .my-nav-user {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
        }

        .my-nav-user > span {
            color: #64748b;
            font-weight: 500;
        }

        .my-btn {
            padding: 10px 20px;
            border: 2px solid #2d5016;
            background: white;
            color: #2d5016;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            font-size: 14px;
        }

        .my-btn:hover {
            background: #2d5016;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(45, 80, 22, 0.25);
        }

        .my-btn i {
            font-size: 15px;
        }

        .my-content {
            padding: 40px;
            flex: 1;
        }

        .my-intro-section {
            background: transparent;
            padding: 0;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 40px;
            align-items: start;
        }

        .my-profile-wrapper {
            background: white;
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            position: sticky;
            top: 100px;
        }

        .my-intro-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .my-intro-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .my-profile-info {
            text-align: center;
        }

        .my-profile-name {
            font-size: 26px;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 8px;
        }

        .my-profile-location {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .my-profile-tagline {
            font-size: 13px;
            color: #475569;
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e9ecef;
        }

        .my-certifications {
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e9ecef;
        }

        .my-cert-title {
            font-size: 12px;
            font-weight: 700;
            color: #2d5016;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            text-align: left;
        }

        .my-cert-list {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .my-cert-list li {
            font-size: 12px;
            color: #64748b;
            padding: 6px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .my-cert-list li::before {
            content: '✓';
            color: #2d5016;
            font-weight: bold;
            font-size: 14px;
        }

        .my-tech-stack {
            text-align: left;
        }

        .my-tech-title {
            font-size: 12px;
            font-weight: 700;
            color: #2d5016;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .my-tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .my-tech-tag {
            padding: 6px 12px;
            background: rgba(45, 80, 22, 0.1);
            color: #2d5016;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .my-tech-tag:hover {
            background: #2d5016;
            color: white;
            transform: translateY(-2px);
        }

        .my-portfolio-content {
            flex: 1;
        }

        .my-portfolio-header {
            background: white;
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .my-portfolio-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2d5016 0%, #3a6b1e 100%);
        }

        .my-portfolio-header h2 {
            color: #2d5016;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 0.02em;
            font-family: 'Bitcount Prop Double Ink', system-ui;
            overflow: hidden;
            border-right: 3px solid #2d5016;
            white-space: nowrap;
            display: inline-block;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #2d5016; }
        }

        .my-portfolio-header p {
            margin: 0;
            font-size: 16px;
            line-height: 1.8;
            color: #64748b;
        }

        .my-feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 28px;
        }

        .my-feature-card {
            background: white;
            border-radius: 12px;
            padding: 36px 28px;
            border: 1px solid #e9ecef;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .my-feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            border-color: #2d5016;
        }

        .my-feature-icon {
            width: 56px;
            height: 56px;
            background: rgba(45, 80, 22, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2d5016;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .my-feature-card h3 {
            color: #2c3e50;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .my-feature-card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .my-profile-wrapper {
            animation: fadeInUp 0.6s ease-out;
        }

        .my-portfolio-header {
            animation: fadeInUp 0.6s ease-out 0.1s;
            animation-fill-mode: both;
        }

        .my-feature-card {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .my-feature-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .my-feature-card:nth-child(2) {
            animation-delay: 0.3s;
        }

        .my-feature-card:nth-child(3) {
            animation-delay: 0.4s;
        }

        @media (max-width: 1024px) {
            .my-intro-section {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .my-profile-wrapper {
                position: relative;
                top: 0;
            }
        }

        @media (max-width: 768px) {
            .my-sidebar {
                transform: translateX(-100%);
            }

            .my-sidebar.active {
                transform: translateX(0);
            }

            .my-main-content {
                margin-left: 0;
            }

            #my-hamburger {
                display: inline-flex;
            }

            .my-dashboard-nav {
                padding: 16px 20px;
            }

            .my-dashboard-nav h2 {
                font-size: 22px;
            }

            .my-nav-user > span {
                display: none;
            }

            .my-content {
                padding: 20px;
            }

            .my-intro-section {
                padding: 0;
            }

            .my-profile-wrapper {
                padding: 24px 20px;
            }

            .my-intro-image {
                width: 150px;
                height: 150px;
            }

            .my-portfolio-header {
                padding: 28px 24px;
            }

            .my-portfolio-header h2 {
                font-size: 28px;
            }

            .my-portfolio-header p {
                font-size: 15px;
            }

            .my-feature-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .my-dashboard-nav h2 {
                font-size: 20px;
            }

            .my-btn {
                padding: 8px 16px;
                font-size: 13px;
            }

            .my-portfolio-header h2 {
                color: #2d5016; 
                margin: 0 0 24px 0; 
                font-size: 82px; 
                font-weight: 700; 
                display: flex; 
                align-items: center; 
                gap: 16px; 
                letter-spacing: 0.02em; 
                font-family: 'Bitcount Prop Double Ink', system-ui;
            }

            .my-feature-card {
                padding: 28px 24px;
            }
        }
    </style>
</head>
<body>
    <button id="my-hamburger" class="my-btn">
        <i class="fas fa-bars"></i>
    </button>

    <div class="my-sidebar">
        <div class="my-sidebar-header">
            <h3>My Subjects</h3>
        </div>
        <div class="my-sidebar-menu">
            <div class="my-menu-item">
                <div class="my-menu-link" onclick="myToggleSubmenu('spt1')">
                    <span><i class="fas fa-code my-menu-icon"></i>SPT1</span>
                    <i class="fas fa-chevron-down my-arrow" id="my-arrow-spt1"></i>
                </div>
                <div class="my-submenu" id="my-submenu-spt1">
                    <a href="/php-mvc-auth/views/dashboard/static_page.php" class="my-submenu-link" data-page="true">Static Page</a>
                    <a href="/php-mvc-auth/views/dashboard/personal_intro_page.php" class="my-submenu-link" data-page="true">Personal Intro Page</a>
                    <a href="/php-mvc-auth/views/dashboard/my_static_page_rev01.php" class="my-submenu-link" data-page="true">Styled Profile Page</a>
                    <a href="/php-mvc-auth/views/dashboard/my_static_page.php" class="my-submenu-link" data-page="true">Interactive Profile Page</a>
                </div>
            </div>

            <div class="my-menu-item">
                <div class="my-menu-link" onclick="myToggleSubmenu('spt2')">
                    <span><i class="fas fa-mobile-alt my-menu-icon"></i>SPT2</span>
                    <i class="fas fa-chevron-down my-arrow" id="my-arrow-spt2"></i>
                </div>
                <div class="my-submenu" id="my-submenu-spt2">
                    <a href="/php-mvc-auth/views/dashboard/thunkable_creatives.php" class="my-submenu-link" data-page="true">Thunkable Creatives</a>
                </div>
            </div>

            <div class="my-menu-item">
                <div class="my-menu-link" onclick="myToggleSubmenu('ws101')">
                    <span><i class="fas fa-laptop-code my-menu-icon"></i>WS101</span>
                    <i class="fas fa-chevron-down my-arrow" id="my-arrow-ws101"></i>
                </div>
                <div class="my-submenu" id="my-submenu-ws101">
                    <a href="/php-mvc-auth/views/dashboard/ctrlearn.php" class="my-submenu-link" data-page="true">Media-Rich Educational Webpage</a>
                    <a href="/php-mvc-auth/views/dashboard/quiz.php" class="my-submenu-link" data-page="true">Interactive Quiz</a>
                </div>
            </div>

            <a href="#" class="my-return-dashboard" id="return-dashboard">
                <i class="fas fa-home"></i>
                Return to Dashboard
            </a>
        </div>
    </div>

    <div class="my-main-content">
        <nav class="my-dashboard-nav">
            <div>
                <h2>Dashboard</h2>
            </div>
            <div class="my-nav-user">
                <span>Welcome, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest' ?>!</span>
                <a href="/php-mvc-auth/logout" class="my-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </nav>

        <div class="my-content" id="dashboard-content">
            <div class="my-intro-section">
                <div class="my-profile-wrapper">
                    <div class="my-intro-image">
                        <img src="/php-mvc-auth/assets/images/profile.jpg" alt="Lee Urem">
                    </div>
                    <div class="my-profile-info">
                        <div class="my-profile-name">Lee Urem</div>
                        <div class="my-profile-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Nueva Ecija, Philippines
                        </div>
                        <div class="my-profile-tagline">Aspiring Cybersecurity Specialist & Tech Enthusiast</div>
                        
                        <div class="my-certifications">
                            <div class="my-cert-title">Certifications</div>
                            <ul class="my-cert-list">
                                <li>Python Essential 1</li>
                                <li>Python Essential 2</li>
                                <li>Data Analytics</li>
                                <li>4th Regional Cybersecurity Conference 2025</li>
                                <li>RAITE 2024</li>
                            </ul>
                        </div>
                        
                        <div class="my-tech-stack">
                            <div class="my-tech-title">Tech Stack</div>
                            <div class="my-tech-tags">
                                <span class="my-tech-tag">HTML5</span>
                                <span class="my-tech-tag">CSS3</span>
                                <span class="my-tech-tag">JavaScript</span>
                                <span class="my-tech-tag">PHP</span>
                                <span class="my-tech-tag">Python</span>
                                <span class="my-tech-tag">Django</span>
                                <span class="my-tech-tag">MySQL</span>
                                <span class="my-tech-tag">C#</span>
                                <span class="my-tech-tag">Java</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-portfolio-content">
                    <div class="my-portfolio-header">
                        <h2>Welcome to My Learning Portfolio</h2>
                        <p>
                            This dashboard serves as your central hub for exploring my web development journey. Navigate through my coursework using the sidebar menu to view projects from SPT1 and WS101, showcasing everything from basic HTML structures to interactive web applications. Each project demonstrates progressive skill development in modern web technologies.
                        </p>
                    </div>

                    <div class="my-feature-grid">
                        <div class="my-feature-card">
                            <div class="my-feature-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <h3>SPT1 Projects</h3>
                            <p>Explore foundational web development projects including static pages, styled profiles, and interactive components.</p>
                        </div>

                    <div class="my-feature-card">
                        <div class="my-feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3>SPT2 Projects</h3>
                            <p>Application Development using Thunkable — showcasing mobile app projects built through block-based programming and user-friendly interfaces..</p>
                        </div>

                        <div class="my-feature-card">
                            <div class="my-feature-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3>WS101 Projects</h3>
                            <p>Discover advanced web solutions featuring media-rich content, interactive quizzes, and educational webpages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <iframe id="content-frame"></iframe>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.my-sidebar');
            const hamburger = document.getElementById('my-hamburger');
            const contentFrame = document.getElementById('content-frame');
            const dashboardContent = document.getElementById('dashboard-content');
            const dashboardNav = document.querySelector('.my-dashboard-nav');

            hamburger.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            document.querySelectorAll('.my-submenu-link[data-page]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    dashboardContent.style.display = 'none';
                    dashboardNav.style.display = 'none';
                    contentFrame.classList.add('active');
                    contentFrame.src = this.href;
                    
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                    }
                });
            });

            document.getElementById('return-dashboard').addEventListener('click', function(e) {
                e.preventDefault();
                dashboardContent.style.display = 'block';
                dashboardNav.style.display = 'flex';
                contentFrame.classList.remove('active');
                contentFrame.src = '';

                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                }
            });

            const featureCards = document.querySelectorAll('.my-feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        function myToggleSubmenu(id) {
            const submenu = document.getElementById('my-submenu-' + id);
            const arrow = document.getElementById('my-arrow-' + id);

            if (!submenu || !arrow) return;

            document.querySelectorAll('.my-submenu').forEach(menu => {
                if (menu.id !== 'my-submenu-' + id) {
                    menu.classList.remove('open');
                }
            });

            document.querySelectorAll('.my-arrow').forEach(arr => {
                if (arr.id !== 'my-arrow-' + id) {
                    arr.classList.remove('rotated');
                }
            });

            submenu.classList.toggle('open');
            arrow.classList.toggle('rotated');
        }
    </script>
</body>
</html>