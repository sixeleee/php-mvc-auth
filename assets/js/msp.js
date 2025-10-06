function showPage(pageId) {
    const pages = ['home-page', 'about-page', 'services-page', 'contact-page', 'sdg-page'];

    pages.forEach(page => {
        const pageElement = document.getElementById(page);
        if (pageElement) {
            pageElement.classList.add('hidden');
            pageElement.classList.remove('active');
        }
    });

    const targetPage = document.getElementById(pageId + '-page');
    if (targetPage) {
        targetPage.classList.remove('hidden');
        setTimeout(() => {
            targetPage.classList.add('active');
        }, 50);
    }

    updateNavigation(pageId);

    const titles = {
        'home': 'Lee Alexis D. Meru - Home',
        'about': 'Lee Alexis D. Meru - About',
        'services': 'Lee Alexis D. Meru - Services',
        'contact': 'Lee Alexis D. Meru - Contact',
        'sdg': 'Lee Alexis D. Meru - SDG & GCE'
    };
    document.title = titles[pageId];

    closeMobileMenu();
    window.scrollTo({ top: 0, behavior: 'smooth' });

    if (pageId === 'services') {
        loadServicesData();
    }
}

function updateNavigation(activePageId) {
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => link.classList.remove('active'));
    const activeLink = document.querySelector(`.nav-links a[onclick="showPage('${activePageId}')"]`);
    if (activeLink) activeLink.classList.add('active');
}

function toggleMobileMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');

    const toggle = document.querySelector('.mobile-menu-toggle');
    if (navLinks.classList.contains('active')) {
        toggle.innerHTML = '✕';
        toggle.setAttribute('aria-label', 'Close mobile menu');
    } else {
        toggle.innerHTML = '☰';
        toggle.setAttribute('aria-label', 'Toggle mobile menu');
    }
}

function closeMobileMenu() {
    const navLinks = document.getElementById('nav-links');
    const toggle = document.querySelector('.mobile-menu-toggle');
    navLinks.classList.remove('active');
    toggle.innerHTML = '☰';
    toggle.setAttribute('aria-label', 'Toggle mobile menu');
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showError(input, message) {
    const errorElement = input.parentElement.querySelector('.error-message');
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.display = message ? 'block' : 'none';
    }
    input.classList.toggle('invalid', !!message);
}

function handleInput(event) {
    const input = event.target;
    let errorMsg = "";

    if (input.name === "name" && !input.value.trim()) {
        errorMsg = "Name is required.";
    } 
    else if (input.name === "email" && !validateEmail(input.value.trim())) {
        errorMsg = "Please enter a valid email.";
    } 
    else if (input.name === "message" && !input.value.trim()) {
        errorMsg = "Message cannot be empty.";
    }

    showError(input, errorMsg);
}

function handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const inputs = form.querySelectorAll("input, textarea");
    let isValid = true;

    inputs.forEach(input => {
        input.dispatchEvent(new Event("input"));
        if (input.classList.contains("invalid")) {
            isValid = false;
        }
    });

    if (!isValid) return;

    const feedbackBox = document.getElementById('form-feedback');

    feedbackBox.textContent = "✅ Message sent successfully!";
    feedbackBox.className = "success-toast";

    form.reset();

    setTimeout(() => {
        feedbackBox.textContent = "";
        feedbackBox.className = "";
    }, 3000);
}

let servicesData = null;
let pricesData = null;

async function loadServicesData() {
    const loadingElement = document.getElementById('services-loading');
    const errorElement = document.getElementById('services-error');
    const containerElement = document.getElementById('services-container');

    try {
        loadingElement.classList.remove('hidden');
        errorElement.classList.add('hidden');
        containerElement.innerHTML = '';

        const xmlResponse = await fetch('/php-mvc-auth/services.xml');
        if (!xmlResponse.ok) {
            throw new Error('Failed to fetch services data');
        }
        const xmlText = await xmlResponse.text();

        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlText, 'text/xml');

        const parseError = xmlDoc.querySelector('parsererror');
        if (parseError) {
            throw new Error('Invalid XML format');
        }

        servicesData = parseServicesXML(xmlDoc);
        
        await loadPricesData();
        
        renderServices();

        loadingElement.classList.add('hidden');

    } catch (error) {
        console.error('Error loading services:', error);
        loadingElement.classList.add('hidden');
        errorElement.classList.remove('hidden');
        errorElement.querySelector('p').textContent = `Error: ${error.message}`;
    }
}

/**
 * Parse XML document and extract services data
 * @param {Document} xmlDoc - Parsed XML document
 * @returns {Object} Structured services data
 */
function parseServicesXML(xmlDoc) {
    const data = {
        info: {},
        categories: []
    };

    const infoElement = xmlDoc.querySelector('info');
    if (infoElement) {
        data.info = {
            title: infoElement.querySelector('title')?.textContent || '',
            author: infoElement.querySelector('author')?.textContent || '',
            lastUpdated: infoElement.querySelector('lastUpdated')?.textContent || ''
        };
    }

    const categoriesElements = xmlDoc.querySelectorAll('categories > category');
    categoriesElements.forEach(categoryElement => {
        const category = {
            id: categoryElement.getAttribute('id'),
            name: categoryElement.getAttribute('name'),
            products: []
        };

        const productElements = categoryElement.querySelectorAll('product');
        productElements.forEach(productElement => {
            const product = {
                id: productElement.querySelector('id')?.textContent || '',
                name: productElement.querySelector('name')?.textContent || '',
                description: productElement.querySelector('description')?.textContent || '',
                image: productElement.querySelector('image')?.textContent || '',
                tagPrice: productElement.querySelector('tagPrice')?.textContent || ''
            };
            category.products.push(product);
        });

        data.categories.push(category);
    });

    return data;
}

async function loadPricesData() {
    try {
        const response = await fetch('/php-mvc-auth/prices.json');
        if (!response.ok) {
            throw new Error('Failed to fetch pricing data');
        }
        pricesData = await response.json();
    } catch (error) {
        console.error('Error loading prices:', error);
       
    }
}

function updatePricesFromJSON() {
    if (!pricesData || !pricesData.prices) {
        console.warn('No pricing data available');
        return;
    }

    let updatedCount = 0;
    
    pricesData.prices.forEach(priceUpdate => {
        const priceElement = document.querySelector(`[data-product-id="${priceUpdate.productId}"] .product-price`);
        if (priceElement && priceUpdate.price !== priceElement.textContent) {
            priceElement.textContent = priceUpdate.price;
            
            priceElement.classList.add('price-updated');
            setTimeout(() => {
                priceElement.classList.remove('price-updated');
            }, 2000);
            
            updatedCount++;
        }
    });

    if (updatedCount > 0) {
        showPriceUpdateNotification(`${updatedCount} price(s) updated!`);
    }
}

/**
 * Show price update notification to user
 * @param {string} message - Notification message
 */
function showPriceUpdateNotification(message) {
    const notification = document.getElementById('price-update-notification');
    notification.querySelector('p').textContent = message;
    notification.classList.remove('hidden');
    
    setTimeout(() => {
        notification.classList.add('hidden');
    }, 3000);
}


function renderServices() {
    const container = document.getElementById('services-container');
    
    if (!servicesData) {
        container.innerHTML = '<p>No services data available.</p>';
        return;
    }

    let html = '';

    if (servicesData.info.title) {
        html += `
            <div class="services-info">
                <h2>${servicesData.info.title}</h2>
                <p class="services-meta">By ${servicesData.info.author} | Last updated: ${servicesData.info.lastUpdated}</p>
            </div>
        `;
    }

    servicesData.categories.forEach(category => {
        html += `
            <div class="service-category" id="category-${category.id}">
                <h3 class="category-title">${category.name}</h3>
                <div class="products-grid">
        `;

category.products.forEach(product => {
    const currentPrice = getCurrentPrice(product.id, product.tagPrice);

    let imageUrl = product.image.trim();

// ✅ Fix path so it matches your actual folder: php-mvc-auth/images/
if (!imageUrl.startsWith('http') && !imageUrl.startsWith('/php-mvc-auth/images/')) {
    imageUrl = '/php-mvc-auth/images/' + imageUrl;
}

console.log('Image path:', imageUrl);

    html += `
        <div class="product-card" data-product-id="${product.id}">
            <div class="product-image-container">
                <img src="${imageUrl}" alt="${product.name}" class="product-image" loading="lazy">

                    </div>
                    <div class="product-info">
                        <h4 class="product-name">${product.name}</h4>
                        <p class="product-description">${product.description}</p>
                        <div class="product-pricing">
                            <span class="product-price">${currentPrice}</span>
                            <button class="btn btn-primary btn-small" onclick="selectService('${product.id}', '${product.name}')">
                                Select Service
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        html += `
                </div>
            </div>
        `;
    });

    html += `
        <div class="services-controls">
            <button class="btn btn-secondary" onclick="updatePricesFromJSON()">
                Refresh Prices
            </button>
            <p class="price-info">Prices are updated automatically from our JSON feed</p>
        </div>
    `;

    container.innerHTML = html;
}

/**
 * Get current price for a product, preferring JSON data over XML default
 * @param {string} productId - Product identifier
 * @param {string} defaultPrice - Default price from XML
 * @returns {string} Current price
 */
function getCurrentPrice(productId, defaultPrice) {
    if (pricesData && pricesData.prices) {
        const priceUpdate = pricesData.prices.find(p => p.productId === productId);
        if (priceUpdate) {
            return priceUpdate.price;
        }
    }
    return defaultPrice;
}

/**
 * Handle service selection
 * @param {string} serviceId - Selected service ID
 * @param {string} serviceName - Selected service name
 */
function selectService(serviceId, serviceName) {
    showPage('contact');
    
    setTimeout(() => {
        const subjectField = document.getElementById('subject');
        const messageField = document.getElementById('message');
        
        if (subjectField) {
            subjectField.value = `Inquiry about ${serviceName}`;
        }
        
        if (messageField) {
            messageField.value = `Hi Lee,\n\nI'm interested in your "${serviceName}" service (ID: ${serviceId}). Could you provide more details about pricing and timeline?\n\nThank you!`;
        }
    }, 100);
}

function selectMood(mood, element) {
    document.querySelectorAll('.mood-item').forEach(item => {
        item.classList.remove('selected');
    });
    
    element.classList.add('selected');
    
    const statusElement = document.getElementById('mood-status');
    const moodMessages = {
        happy: "Feeling happy today! 😊",
        sad: "It's okay to feel sad sometimes. 🤗"
    };
    
    statusElement.textContent = moodMessages[mood] || `Current mood: ${mood}`;
    statusElement.classList.add('show');
    
    setTimeout(() => {
        statusElement.classList.remove('show');
    }, 5000);
}

document.addEventListener('DOMContentLoaded', function() {
    updateNavigation('home');
    
    const form = document.querySelector("#contact-form");
    if (form) {
        form.querySelectorAll("input, textarea").forEach(input => {
            input.addEventListener("input", handleInput);
        });
        form.addEventListener("submit", handleSubmit);
    }

    setInterval(() => {
        const servicesPage = document.getElementById('services-page');
        if (servicesPage && !servicesPage.classList.contains('hidden')) {
            updatePricesFromJSON();
        }
    }, 30000);
});

document.addEventListener('keydown', function(event) {
    if ((event.key === 'Enter' || event.key === ' ') && event.target.classList.contains('mood-item')) {
        event.preventDefault();
        event.target.click();
    }
    if (event.key === 'Escape') {
        closeMobileMenu();
    }
});

document.addEventListener('click', function(event) {
    const navLinks = document.getElementById('nav-links');
    const toggle = document.querySelector('.mobile-menu-toggle');
    if (navLinks.classList.contains('active') &&
        !navLinks.contains(event.target) &&
        !toggle.contains(event.target)) {
        closeMobileMenu();
    }
});