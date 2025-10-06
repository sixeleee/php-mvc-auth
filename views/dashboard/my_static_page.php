<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lee Alexis D. Meru</title>
    <link rel="stylesheet" href="/php-mvc-auth/assets/css/style1.css">
    <script src="/php-mvc-auth/assets/js/msp.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@400;700&family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="#" class="logo" onclick="showPage('home')">Lee Alexis</a>
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" onclick="toggleMobileMenu()">☰</button>
            <ul class="nav-links" id="nav-links">
                <li><a href="#" onclick="showPage('home')" class="active"><span>Home</span></a></li>
                <li><a href="#" onclick="showPage('about')"><span>About</span></a></li>
                <li><a href="#" onclick="showPage('services')"><span>Services</span></a></li>
                <li><a href="#" onclick="showPage('sdg')"><span>SDG & GCE</span></a></li>
                <li><a href="#" onclick="showPage('contact')"><span>Contact</span></a></li>
            </ul>
        </nav>
    </header>

    <main id="main-content">
        <section id="home-page" class="page-transition active">
            <div class="hero">
                <div class="hero-content">
                    <h1>Lee Alexis D. Meru</h1>
                    <p>I'm Lee Alexis and I prefer to be called "Lee". This makes me feel unique and extraordinary. Welcome to my digital space where technology meets creativity and passion drives innovation.</p>
                    <div class="hero-cta">
                        <a href="#" class="btn btn-primary" onclick="showPage('about')">
                            <span>Learn About Me</span>
                            <span>→</span>
                        </a>
                        <a href="#" class="btn btn-secondary" onclick="showPage('services')">
                            <span>My Services</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="content-section">
                <div class="cards-grid">
                    <article class="card">
                        <header>
                            <h3>My Academic Journey</h3>
                        </header>
                        <div class="academic-schedule">
                            <div class="academic-item">
                                <div class="subject-name">Computer Programming 3</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">MON</span>
                                    <span class="schedule-time">3:00 - 5:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Web Systems and Technologies 1</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">TUE</span>
                                    <span class="schedule-time">1:00 - 3:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Information Assurance Security 1</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">TUE</span>
                                    <span class="schedule-time">9:00 - 11:00 AM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">System Integration and Architecture 2</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">WED</span>
                                    <span class="schedule-time">10:00 - 12:00 NOON</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Integrative Programming Technologies</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">WED</span>
                                    <span class="schedule-time">1:00 - 3:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Networking 2 (Advanced)</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">THU</span>
                                    <span class="schedule-time">7:00 - 9:00 AM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Event-Driven Programming</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">THU</span>
                                    <span class="schedule-time">3:00 - 5:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Mobile Programming Fundamentals</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">THU</span>
                                    <span class="schedule-time">10:00 AM - 12:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="academic-item">
                                <div class="subject-name">Gender and Society</div>
                                <div class="schedule-info">
                                    <span class="schedule-day">FRI</span>
                                    <span class="schedule-time">1:30 - 4:30 PM</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="secondary-cards">
                    <article class="card">
                        <header>
                            <h3>Shows I Love Watching</h3>
                        </header>
                        <div class="shows-grid">
                            <div class="show-item">Reign</div>
                            <div class="show-item">The Witcher</div>
                            <div class="show-item">Scandal</div>
                            <div class="show-item">Sheldon</div>
                            <div class="show-item">Vampire D.</div>
                            <div class="show-item">The Originals</div>
                        </div>
                    </article>

                    <article class="card">
                        <header>
                            <h3>My Moods</h3>
                        </header>
                        <div class="moods-grid">
                            <figure class="mood-item" onclick="selectMood('happy', this)" tabindex="0" aria-label="Select happy mood">
                                <img src="/php-mvc-auth/images/laughing.png" alt="Happy" class="mood-image">
                                <figcaption class="mood-text">Happy</figcaption>
                            </figure>
                            <figure class="mood-item" onclick="selectMood('sad', this)" tabindex="0" aria-label="Select sad mood">
                                <img src="/php-mvc-auth/images/sad.png" alt="Sad" class="mood-image">
                                <figcaption class="mood-text">Sad</figcaption>
                            </figure>
                        </div>
                        <p id="mood-status" aria-live="polite"></p>
                    </article>

                    <article class="card">
                        <header>
                            <h3>My Circle</h3>
                        </header>
                        <ul>
                            <li>Nicole Pengco - Secret Millionaire</li>
                            <li>Emmanuel Felipe - CEO</li>
                            <li>Meliza P. - Ethereal Beauty</li>
                            <li>Ej Ledesma - Icon Baby</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section id="about-page" class="hidden page-transition">
            <div class="about-hero">
                <h1>About Me</h1>
                <p>Getting to know the person behind the code</p>
            </div>
            
            <article class="page-content">
                <h2 class="sr-only">About Page Content</h2>
                <section>
                    <h3>Who I Am</h3>
                    <p>Hello, I'm Lee Alexis D. Meru, though I much prefer to be called simply "Lee". There's something about that name that resonates with me deeply — it makes me feel unique and extraordinary in my own quiet way.</p>
                </section>
                
                <section>
                    <h3>My Journey</h3>
                    <p>I'm currently walking through my academic path in BSIT, embracing each subject as a stepping stone toward understanding the beautiful complexity of technology. From system architecture to mobile programming, each class opens new doors in my mind.</p>
                </section>
                
                <section>
                    <h3>What Moves Me</h3>
                    <p>When I'm not immersed in code or coursework, I find solace in crochet that gives me a total peace of mind. It's my way of creating something beautiful with my hands while processing the digital complexities I encounter daily.</p>
                </section>
                
                <aside class="quote-highlight">
                    <h3>1 Peter 3:10</h3>
                    <p>"For whoever would love life and see good days must keep their tongue from evil and their lips from deceitful speech."</p>
                </aside>
            </article>
        </section>

        <section id="services-page" class="hidden page-transition">
            <div class="services-hero">
                <h1>My Services</h1>
                <p>Professional skills and services I offer to bring your digital vision to life</p>
            </div>
            
            <div class="services-content">
                <div id="services-loading" class="loading-spinner">
                    <div class="spinner"></div>
                    <p>Loading services...</p>
                </div>
            
                <div id="services-error" class="error-message hidden">
                    <p>Unable to load services. Please try again later.</p>
                </div>
                
                <div id="services-container"></div>
                
                <div id="price-update-notification" class="price-notification hidden">
                    <p>💰 Prices updated successfully!</p>
                </div>
            </div>
        </section>

        <section id="sdg-page" class="hidden page-transition" aria-labelledby="sdg-main-title">
            <div class="sdg-hero">
                <h2 id="sdg-main-title" class="sdg-hero-title">Building a Better Tomorrow</h2>
                <p class="sdg-hero-subtitle">
                    Exploring Sustainable Development Goals and Global Citizenship Education 
                    for a more equitable, innovative, and sustainable world
                </p>
            </div>

            <div class="sdg-content">
                <section class="sdg-goals" aria-labelledby="sdg-goals-title">
                    <h3 id="sdg-goals-title" class="sr-only">Sustainable Development Goals</h3>
                    
                    <article class="sdg-card sdg-9" tabindex="0" 
                             aria-labelledby="sdg9-title" aria-describedby="sdg9-desc">
                        <div class="sdg-icon" aria-hidden="true">
                            <span class="sdg-number">9</span>
                        </div>
                        <div class="sdg-content-wrapper">
                            <h4 id="sdg9-title" class="sdg-title">Industry, Innovation and Infrastructure</h4>
                            <p id="sdg9-desc" class="sdg-description">
                                Build resilient infrastructure, promote inclusive and sustainable industrialization, 
                                and foster innovation for economic growth and human well-being.
                            </p>
                            <ul class="sdg-targets" aria-label="SDG 9 key targets">
                                <li>Develop quality, reliable, sustainable infrastructure</li>
                                <li>Promote inclusive and sustainable industrialization</li>
                                <li>Increase access to financial services and markets</li>
                                <li>Enhance scientific research and innovation capabilities</li>
                            </ul>
                        </div>
                    </article>

                    <article class="sdg-card sdg-10" tabindex="0" 
                             aria-labelledby="sdg10-title" aria-describedby="sdg10-desc">
                        <div class="sdg-icon" aria-hidden="true">
                            <span class="sdg-number">10</span>
                        </div>
                        <div class="sdg-content-wrapper">
                            <h4 id="sdg10-title" class="sdg-title">Reduced Inequalities</h4>
                            <p id="sdg10-desc" class="sdg-description">
                                Reduce inequality within and among countries by ensuring equal opportunity, 
                                promoting social, economic and political inclusion.
                            </p>
                            <ul class="sdg-targets" aria-label="SDG 10 key targets">
                                <li>Achieve and sustain income growth of bottom 40%</li>
                                <li>Empower and promote social, economic inclusion</li>
                                <li>Ensure equal opportunity and reduce inequalities</li>
                                <li>Adopt policies for greater equality</li>
                            </ul>
                        </div>
                    </article>
                </section>

                <section class="gce-section" aria-labelledby="gce-title">
                    <div class="gce-header">
                        <h3 id="gce-title" class="gce-main-title">Global Citizenship Education</h3>
                        <p class="gce-subtitle">
                            Fostering critical thinking, global awareness, and active citizenship 
                            to address interconnected global challenges
                        </p>
                    </div>
                    
                    <div class="gce-grid" role="group" aria-label="Global Citizenship Education themes">
                        <article class="gce-card gce-1" tabindex="0" 
                                 aria-labelledby="gce1-title" aria-describedby="gce1-desc">
                            <div class="gce-icon" aria-hidden="true">
                                <span class="gce-number">1</span>
                            </div>
                            <div class="gce-content-wrapper">
                                <h4 id="gce1-title" class="gce-card-title">Local, National & Global Systems</h4>
                                <p id="gce1-desc" class="gce-card-description">
                                    Understanding the interconnectedness of local, national, and global systems 
                                    and how decisions at one level impact others.
                                </p>
                            </div>
                        </article>
                        <article class="gce-card gce-7" tabindex="0" 
                                 aria-labelledby="gce7-title" aria-describedby="gce7-desc">
                            <div class="gce-icon" aria-hidden="true">
                                <span class="gce-number">7</span>
                            </div>
                            <div class="gce-content-wrapper">
                                <h4 id="gce7-title" class="gce-card-title">Technology & Media</h4>
                                <p id="gce7-desc" class="gce-card-description">
                                    Critically analyzing how technology and media shape our understanding 
                                    and influence global communication.
                                </p>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </section>

        <section id="contact-page" class="hidden page-transition">
            <div class="contact-hero">
                <h1>Let's Connect</h1>
                <p>I'd love to hear from you. Whether it's about technology, stories, or just life in general.</p>
            </div>
    
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon" aria-hidden="true">📧</div>
                        <div>
                            <h3>Email</h3>
                            <p>Ready to connect professionally</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon" aria-hidden="true">🎓</div>
                        <div>
                            <h3>Academic</h3>
                            <p>BSIT Student passionate about technology</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon" aria-hidden="true">⏰</div>
                        <div>
                            <h3>Response Time</h3>
                            <p>I typically respond within 24 hours</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon" aria-hidden="true">💭</div>
                        <div>
                            <h3>Let's Talk About</h3>
                            <p>Technology, innovation, or sustainable development</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3 class="form-title">Send Me a Message</h3>
                    <p class="form-subtitle">Fill out the form below and I'll get back to you as soon as possible.</p>
                    
                    <form id="contact-form">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-input" placeholder="Your full name" required>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" required>
                                <div class="error-message"></div>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-input" placeholder="What's this about?" required>
                            <div class="error-message"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-input form-textarea" placeholder="Your message here..." required></textarea>
                            <div class="error-message"></div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <span>Send Message</span>
                        </button>

                        <div id="form-feedback"></div>

                        <p id="message-preview" style="margin-top:10px; font-style:italic; color:#555;"></p>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <footer>
        <p>© 2025 Lee Alexis D. Meru · Growing, learning, dreaming</p>
    </footer>
</body>
</html>