<?php $title = 'Thunkable Creatives - Portfolio'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            padding: 32px;
        }

        .thunkable-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .thunkable-header {
            background: white;
            border: 1px solid #e9ecef;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .thunkable-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2d5016 0%, #3a6b1e 100%);
        }

        .thunkable-header h1 {
            color: #2d5016;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .thunkable-header h1 i {
            font-size: 32px;
        }

        .thunkable-header p {
            color: #64748b;
            font-size: 16px;
            line-height: 1.6;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 28px;
        }

        .project-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(45, 80, 22, 0.15);
            border-color: #2d5016;
        }

        .video-wrapper {
            width: 100%;
            height: 240px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            background: #000;
        }

        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 2;
            transition: opacity 0.3s ease;
        }

        .video-wrapper.playing .video-cover {
            opacity: 0;
            pointer-events: none;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            background: rgba(45, 80, 22, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .play-button i {
            color: white;
            font-size: 28px;
            margin-left: 4px;
        }

        .video-wrapper:hover .play-button {
            background: #2d5016;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .video-wrapper.playing .play-button {
            opacity: 0;
            pointer-events: none;
        }

        .project-content {
            padding: 24px;
        }

        .project-title {
            color: #2d5016;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .project-title i {
            font-size: 20px;
        }

        .project-description {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #2d5016;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-link:hover {
            background: #3a6b1e;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(45, 80, 22, 0.25);
        }

        .project-link i {
            font-size: 16px;
        }

        .project-badge {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(45, 80, 22, 0.1);
            color: #2d5016;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .video-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .video-modal.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .video-modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .video-modal-content video {
            width: 100%;
            height: auto;
            display: block;
            max-height: 90vh;
        }

        .close-btn {
            position: absolute;
            top: -50px;
            right: 0;
            color: white;
            font-size: 36px;
            cursor: pointer;
            z-index: 10;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .close-btn:hover {
            transform: scale(1.2);
        }

        .expand-icon {
            position: absolute;
            bottom: 12px;
            right: 12px;
            color: white;
            font-size: 20px;
            background: rgba(45, 80, 22, 0.8);
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .expand-icon:hover {
            background: #2d5016;
            transform: scale(1.1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .thunkable-header {
            animation: fadeInUp 0.6s ease-out;
        }

        .project-card {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .project-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .project-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .project-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .thunkable-header {
                padding: 24px 20px;
            }

            .thunkable-header h1 {
                font-size: 28px;
            }

            .thunkable-header p {
                font-size: 15px;
            }

            .projects-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .video-wrapper {
                height: 200px;
            }

            .project-content {
                padding: 20px;
            }

            .project-title {
                font-size: 20px;
            }

            .play-button {
                width: 60px;
                height: 60px;
            }

            .play-button i {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .thunkable-header {
                padding: 20px 16px;
            }

            .thunkable-header h1 {
                font-size: 24px;
                flex-direction: column;
                align-items: flex-start;
            }

            .project-title {
                font-size: 18px;
            }

            .project-description {
                font-size: 14px;
            }

            .project-link {
                width: 100%;
                justify-content: center;
            }

            .close-btn {
                top: -40px;
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="thunkable-container">
        <div class="thunkable-header">
            <h1>
                <i class="fas fa-mobile-alt"></i>
                Thunkable Creatives
            </h1>
            <p>Explore my mobile app projects built with Thunkable — from practical tools to creative solutions that make everyday tasks easier and more fun.</p>
        </div>

        <div class="projects-grid">
            <div class="project-card">
                <div class="video-wrapper" data-video-id="1">
                    <img class="video-cover" src="/php-mvc-auth/addons/calc.png" alt="Calculator Cover">
                    <video muted playsinline>
                        <source src="/php-mvc-auth/addons/calcute.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="play-button">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="expand-icon">
                        <i class="fas fa-expand"></i>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-badge">Utility App</span>
                    <h2 class="project-title">
                        <i class="fas fa-calculator"></i>
                        Calculator
                    </h2>
                    <p class="project-description">
                        A simple and intuitive calculator app that performs basic arithmetic operations including addition, subtraction, multiplication, and division. Designed with a clean interface for easy calculations on the go.
                    </p>
                    <a href="https://x.thunkable.com/copy/99b2f4f932cb0ef67a35b5d788857178" target="_blank" class="project-link">
                        <i class="fas fa-external-link-alt"></i>
                        View on Thunkable
                    </a>
                </div>
            </div>

            <div class="project-card">
                <div class="video-wrapper" data-video-id="2">
                    <img class="video-cover" src="/php-mvc-auth/addons/knotty.png" alt="Knotty Threads Cover">
                    <video muted playsinline>
                        <source src="/php-mvc-auth/addons/knotty.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="play-button">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="expand-icon">
                        <i class="fas fa-expand"></i>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-badge">Creative App</span>
                    <h2 class="project-title">
                        <i class="fas fa-cut"></i>
                        Knotty Threads
                    </h2>
                    <p class="project-description">
                        A comprehensive app for crochet enthusiasts featuring free patterns, material guides, and video tutorials. Perfect for beginners and experienced crocheters looking to learn new techniques and create beautiful handmade items.
                    </p>
                    <a href="https://x.thunkable.com/copy/30819670acfbc346bc234026b0ead61d" target="_blank" class="project-link">
                        <i class="fas fa-external-link-alt"></i>
                        View on Thunkable
                    </a>
                </div>
            </div>

            <div class="project-card">
                <div class="video-wrapper" data-video-id="3">
                    <img class="video-cover" src="/php-mvc-auth/addons/bg.png" alt="Multi App Cover">
                    <video muted playsinline>
                        <source src="/php-mvc-auth/addons/multi.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="play-button">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="expand-icon">
                        <i class="fas fa-expand"></i>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-badge">Entertainment</span>
                    <h2 class="project-title">
                        <i class="fas fa-dice"></i>
                        Multi App
                    </h2>
                    <p class="project-description">
                        Beat boredom with this fun multi-purpose app that suggests random activities! Discover music playlists, mini games, and useful tools to keep yourself entertained. Never run out of things to do when you're feeling idle.
                    </p>
                    <a href="https://x.thunkable.com/copy/64970ec8089ea1052fb2198352eb9864" target="_blank" class="project-link">
                        <i class="fas fa-external-link-alt"></i>
                        View on Thunkable
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="video-modal" id="videoModal">
        <span class="close-btn">&times;</span>
        <div class="video-modal-content">
            <video id="modalVideo" controls>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoWrappers = document.querySelectorAll('.video-wrapper');
            const modal = document.getElementById('videoModal');
            const modalVideo = document.getElementById('modalVideo');
            const closeBtn = document.querySelector('.close-btn');

            videoWrappers.forEach(wrapper => {
                const video = wrapper.querySelector('video');
                const playButton = wrapper.querySelector('.play-button');
                const expandIcon = wrapper.querySelector('.expand-icon');
                const cover = wrapper.querySelector('.video-cover');

                // Play button click
                playButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (video.paused) {
                        video.play();
                        wrapper.classList.add('playing');
                    } else {
                        video.pause();
                        wrapper.classList.remove('playing');
                    }
                });

                // Video click to pause/play
                video.addEventListener('click', function() {
                    if (video.paused) {
                        video.play();
                        wrapper.classList.add('playing');
                    } else {
                        video.pause();
                        wrapper.classList.remove('playing');
                    }
                });

                // Expand icon click
                expandIcon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const videoSrc = video.querySelector('source').src;
                    modalVideo.querySelector('source').src = videoSrc;
                    modalVideo.load();
                    modal.classList.add('active');
                    modalVideo.play();
                    
                    // Pause the thumbnail video
                    video.pause();
                    wrapper.classList.remove('playing');
                });

                // Video ended event
                video.addEventListener('ended', function() {
                    wrapper.classList.remove('playing');
                });
            });

            // Close modal
            closeBtn.addEventListener('click', function() {
                modal.classList.remove('active');
                modalVideo.pause();
                modalVideo.currentTime = 0;
            });

            // Click outside modal to close
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    modalVideo.pause();
                    modalVideo.currentTime = 0;
                }
            });

            // Escape key to close modal
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                    modalVideo.pause();
                    modalVideo.currentTime = 0;
                }
            });
        });
    </script>
</body>
</html>