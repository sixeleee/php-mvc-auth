<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/php-mvc-auth/assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Ctrl+Learn - Your Shortcut to Digital Smarts</title>
   
</head>
<body>
    <div class="loading" id="loading">
        <div class="loading-spinner"></div>
    </div>

    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <header>
        <nav>
            <div class="brand" onclick="showPage('home')">Ctrl+Learn</div>
            <div class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a onclick="showPage('home')" data-page="home">Home</a></li>
                <li><a onclick="showPage('resources')" data-page="resources">Resources</a></li>
                <li><a onclick="showPage('contact')" data-page="contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="home" class="page active">
            <section class="hero">
                <div class="hero-main-content">
                    <div class="hero-content">
                        <h1>Ctrl+Learn</h1>
                        <p class="tagline">Your Shortcut to Digital Smarts</p>
                        <div class="system-summary">
                           Welcome to your go-to resource for learning how to use technology safely, wisely, and responsibly. Here, you will discover the skills and knowledge needed to become a confident digital citizen.
                        </div>
                        <button class="btn-3d" onclick="showPage('resources')">Explore the Future</button>
                    </div>
                </div>
                <div class="hero-image-section">
                    <img src="/php-mvc-auth/addons/boy.png" alt="Digital Learning Innovation" class="hero-image">
                </div>
            </section>

           <section class="section-3d">
                <div class="container">
                    <h2 class="section-title">Transform Your Digital Journey</h2>
                    <p class="section-subtitle">Unlock your potential with essential digital literacy skills for a connected world.</p>
                    <div class="content-with-image">
                        <div class="image-wrapper">
                            <img src="/php-mvc-auth/addons/girl.png" alt="Digital learning environment">
                        </div>
                        <div class="cards-wrapper">
                            <div class="level-card">
                                <h4><span class="card-icon">💡</span> What is Digital Literacy?</h4>
                                <p>Master the art of finding, understanding, and sharing information using digital devices. It's about being smart and safe online, understanding how technology works, and communicating respectfully in digital spaces.</p>
                                <button class="read-more-btn">Learn More</button>
                            </div>
                            <div class="level-card">
                                <h4><span class="card-icon">🚀</span> Why It Matters?</h4>
                                <p>In today's interconnected world, digital skills are essential for school, work, and everyday life. Being digitally literate empowers you to solve problems, make informed decisions, and protect your privacy online.</p>
                                <button class="read-more-btn">Discover Impact</button>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 4rem;">
                        <button class="btn-3d" onclick="showPage('resources')">Start Your Learning Path</button>
                    </div>
                </div>
            </section>
        </div>

        <!-- RESOURCES PAGE -->
        <div id="resources" class="page">
            <section class="section-3d">
                <div class="container">
                    <h2 class="section-title">Resources & Innovation Hub</h2>
                    
                    <div class="resources-hero">
                        <div class="resources-hero-content">
                            <h3>Promoting Digital Literacy and Responsible Technology Use Among Students</h3>
                            <p>At Ctrl+Learn, we're committed to fostering digital literacy and responsible technology use among students. Our mission is to equip learners with essential digital skills while promoting ethical technology practices, critical thinking, and safe online behaviors that prepare them for success in our digital world.</p>
                        </div><div class="video-container">
                            <iframe
                                width="560"
                                height="315"
                                src="https://www.youtube.com/embed/DJnqZgHFV40?si=7Y_Yef-cakBX2esX"
                                title="YouTube video player"
                                style="border: none;"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                 allowfullscreen>
                            </iframe>
                        </div>
                        </div>

                    <div class="pathways-section">
                        <h3>Digital Competency Pathways</h3>
                        <div class="pathways-grid">
                            <div class="pathway-card">
                                <h4>Online Safety & Privacy</h4>
                                <p>Learn how to protect your personal information, recognize online threats, and maintain digital privacy in everyday technology use.</p>
                            </div>
                            <div class="pathway-card">
                                <h4>Effective Digital Communication</h4>
                                <p>Master the art of respectful and clear communication across emails, social media, and collaborative platforms.</p>
                            </div>
                            <div class="pathway-card">
                                <h4>Critical Evaluation of Online Content</h4>
                                <p>Develop skills to identify reliable information, detect misinformation, and think critically about digital media.</p>
                            </div>
                            <div class="pathway-card">
                                <h4>Responsible Social Media Use</h4>
                                <p>Understand the impact of your digital footprint and learn strategies for positive social media engagement.</p>
                            </div>
                            <div class="pathway-card">
                                <h4>Basic Digital Productivity Tools</h4>
                                <p>Get hands-on practice with common tools like word processors, spreadsheets, and online collaboration apps.</p>
                            </div>
                            <div class="pathway-card">
                                <h4>Ethical Technology Use</h4>
                                <p>Explore digital rights and responsibilities, including copyright, data ethics, and respectful online behavior.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pathways-section">
                        <h3>Learning Levels</h3>
                        <div class="levels-grid">
                            <div class="level-card">
                                <h4>Beginner Accelerator</h4>
                                <p>Start your journey with confidence. Our beginner track provides solid foundations and builds essential digital literacy skills through interactive tutorials and guided projects.</p>
                            </div>
                            <div class="level-card">
                                <h4>Professional Advancement</h4>
                                <p>Elevate your career with advanced skills, leadership training, and industry-specific expertise that employers demand in today's competitive tech landscape.</p>
                            </div>
                            <div class="level-card">
                                <h4>Specialist Mastery</h4>
                                <p>Become a recognized expert in cutting-edge technologies through intensive, specialized training programs designed for industry leaders and innovators.</p>
                            </div>
                        </div>
                    </div>

                    <div class="features-section">
                        <h3>Get Involved and Learn</h3>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon">📚</div>
                                <div>
                                    <h4>Test Your Knowledge</h4>
                                    <p>Try our fun quizzes and real-life scenarios to see how well you understand digital literacy and responsible technology use.</p>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🥽</div>
                                <div>
                                    <h4>Tips for Parents and Teachers</h4>
                                    <p>Support students by encouraging open talks about their online experiences. Help set healthy rules for screen time and privacy.</p>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🤖</div>
                                <div>
                                    <h4>24/7 Assistant</h4>
                                    <p>Personalized learning support and instant feedback</p>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🏢</div>
                                <div>
                                    <h4>Industry Connections</h4>
                                    <p>Direct pathways to top tech companies and startups</p>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">♾️</div>
                                <div>
                                    <h4>Lifetime Access</h4>
                                    <p>Continuous learning with evolving content and community</p>
                                </div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🎖️</div>
                                <div>
                                    <h4>Join the Digital Citizen Pledge!</h4>
                                    <p>Promise to use technology responsibly, respect others online, and keep learning about digital safety.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- CONTACT PAGE -->
        <div id="contact" class="page">
            <section class="section-3d">
                <div class="container">
                    <h2 class="section-title">Connect & Create Together</h2>
                    
                    <p style="text-align: center; font-size: 1.3rem; margin-bottom: 4rem; color: var(--text-gray);">
                        Ready to transform your digital future? Let's start the conversation.
                    </p>

                    <div class="contact-form">
                        <form onsubmit="handleSubmit(event)">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required placeholder="Enter your full name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required placeholder="your@email.com">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="09167871183">
                            </div>

                            <div class="form-group">
                                <label for="interest">Area of Interest</label>
                                <input type="text" id="interest" name="interest" placeholder="Digital Safety, Online Communication, etc.">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" required placeholder="Tell us about your learning goals and how we can help you achieve them..." style="min-height: 120px; resize: vertical;"></textarea>
                            </div>

                            <button type="submit" class="btn-3d" style="width: 100%; margin-top: 1rem;">
                                Launch My Journey 🚀
                            </button>
                        </form>
                    </div>

                    <div class="contact-methods">
                        <div class="contact-card">
                            <div class="contact-icon">📧</div>
                            <h4>Email</h4>
                            <p>hello@ctrllearn.com<br>Follow @ctrllearn on all platforms<br>LinkedIn | Twitter | Instagram</p>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon">⏰</div>
                            <h4>Live Support</h4>
                            <p>24/7 AI Assistant<br>Mon-Fri: Human Support 9AM-6PM EST</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <p style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                &copy; 2024 Ctrl+Learn. All rights reserved.
            </p>
            <p style="opacity: 0.8;">
                Your Shortcut to Digital Smarts
            </p>
        </div>
    </footer>

    <script>
        // Loading screen
        window.addEventListener('load', () => {
            const loading = document.getElementById('loading');
            setTimeout(() => {
                loading.classList.add('hidden');
            }, 1000);
        });

        function showPage(pageId) {
            const pages = document.querySelectorAll('.page');
            const targetPage = document.getElementById(pageId);
            const navLinks = document.querySelectorAll('.nav-links a');
            
            // Update active navigation link
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.dataset.page === pageId) {
                    link.classList.add('active');
                }
            });
            
            pages.forEach(page => {
                if (page.classList.contains('active')) {
                    page.style.opacity = '0';
                    page.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        page.classList.remove('active');
                    }, 300);
                }
            });

            setTimeout(() => {
                if (targetPage) {
                    targetPage.classList.add('active');
                    targetPage.style.opacity = '0';
                    targetPage.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        targetPage.style.opacity = '1';
                        targetPage.style.transform = 'translateY(0)';
                        targetPage.style.transition = 'all 0.5s ease';
                    }, 50);
                }
            }, 300);

            const navLinksContainer = document.getElementById('navLinks');
            navLinksContainer.classList.remove('active');

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');

            if (!name || !email || !message) {
                const form = event.target;
                form.style.animation = 'shake 0.5s ease-in-out';
                setTimeout(() => {
                    form.style.animation = '';
                }, 500);
                
                alert('Please fill in all required fields to continue your journey!');
                return;
            }

            const submitBtn = event.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '🚀 Launching...';
            submitBtn.style.background = 'linear-gradient(135deg, var(--accent-red), var(--neon-red))';
            
            setTimeout(() => {
                alert(`Welcome aboard, ${name}! Your digital transformation journey begins now. We'll contact you at ${email} within 24 hours with your personalized learning roadmap!`);
               
                event.target.reset();
                submitBtn.innerHTML = '✅ Journey Initiated!';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = '';
                }, 2000);
            }, 1000);
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
            
            @keyframes floatHeroImage {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                25% { transform: translateY(-8px) rotate(1deg); }
                50% { transform: translateY(-12px) rotate(0deg); }
                75% { transform: translateY(-5px) rotate(-1deg); }
            }
            
            @keyframes particleFloat {
                0% {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
                100% {
                    opacity: 0;
                    transform: translateY(-50px) scale(0);
                }
            }
        `;
        document.head.appendChild(style);

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    if (element.classList.contains('pathway-card') || 
                        element.classList.contains('level-card') ||
                        element.classList.contains('feature-card') ||
                        element.classList.contains('contact-card')) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                        element.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    }
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
       
            const homeNavLink = document.querySelector('[data-page="home"]');
            if (homeNavLink) homeNavLink.classList.add('active');

            const heroImage = document.querySelector('.hero-image');
            if (heroImage) {
                heroImage.style.animation = 'floatHeroImage 8s ease-in-out infinite';
              
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * -0.05;
                    if (heroImage.style) {
                        heroImage.style.transform = `translateY(${rate}px)`;
                    }
                });
            }
            
            const animatedCards = document.querySelectorAll('.pathway-card, .level-card, .feature-card, .contact-card');
            animatedCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                observer.observe(card);
            });

            const buttons = document.querySelectorAll('.btn-3d');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', (e) => {
                    createParticleEffect(e.target);
                });
            });

            const shapes = document.querySelectorAll('.shape');
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                
                shapes.forEach((shape, index) => {
                    const speed = (index + 1) * 0.3;
                    const yPos = scrolled * speed * -0.5;
                    const rotation = scrolled * 0.1;
                    shape.style.transform = `translateY(${yPos}px) rotate(${rotation}deg)`;
                });
            });

            document.querySelectorAll('.read-more-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const card = e.target.closest('.level-card');
                    const title = card.querySelector('h4').textContent.replace(/[\u{1F600}-\u{1F6FF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}]/gu, '').trim();
                    const content = card.querySelector('p').textContent;
                    alert(`More about ${title}:\n\n${content}\n\nExplore our resources section for detailed courses and interactive content!`);
                });
            });

            window.addEventListener('scroll', () => {
                const header = document.querySelector('header');
                if (window.scrollY > 100) {
                    header.style.background = 'rgba(10, 10, 10, 0.98)';
                } else {
                    header.style.background = 'rgba(10, 10, 10, 0.95)';
                }
            });
        });

        function createParticleEffect(element) {
            const rect = element.getBoundingClientRect();
            for (let i = 0; i < 5; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    particle.style.position = 'fixed';
                    particle.style.left = (rect.left + Math.random() * rect.width) + 'px';
                    particle.style.top = (rect.top + Math.random() * rect.height) + 'px';
                    particle.style.width = '4px';
                    particle.style.height = '4px';
                    particle.style.backgroundColor = 'var(--neon-red)';
                    particle.style.borderRadius = '50%';
                    particle.style.pointerEvents = 'none';
                    particle.style.zIndex = '9999';
                    particle.style.animation = 'particleFloat 1s ease-out forwards';
                    
                    document.body.appendChild(particle);
                    
                    setTimeout(() => {
                        particle.remove();
                    }, 1000);
                }, i * 100);
            }
        }

        document.addEventListener('click', (e) => {
            const navLinks = document.getElementById('navLinks');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            
            if (!navLinks.contains(e.target) && !mobileBtn.contains(e.target)) {
                navLinks.classList.remove('active');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>