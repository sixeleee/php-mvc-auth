function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const eyeIcon = document.getElementById(fieldId + '-eye');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    let strength = 0;
    let feedback = '';
    
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    switch (strength) {
        case 0:
        case 1:
            feedback = 'Very Weak';
            return { strength: 'weak', text: feedback };
        case 2:
            feedback = 'Weak';
            return { strength: 'weak', text: feedback };
        case 3:
            feedback = 'Medium';
            return { strength: 'medium', text: feedback };
        case 4:
            feedback = 'Strong';
            return { strength: 'strong', text: feedback };
        case 5:
            feedback = 'Very Strong';
            return { strength: 'strong', text: feedback };
        default:
            return { strength: '', text: '' };
    }
}

function validateForm(formId) {
    const form = document.getElementById(formId);
    let isValid = true;
    
    document.querySelectorAll('.error-message').forEach(error => error.remove());
    document.querySelectorAll('.has-error, .has-success').forEach(group => {
        group.classList.remove('has-error', 'has-success');
    });
    
    if (formId === 'registerForm') {
 
        const username = form.username.value.trim();
        if (username.length < 3) {
            showFieldError('username', 'Username must be at least 3 characters');
            isValid = false;
        } else {
            showFieldSuccess('username');
        }
        
        const email = form.email.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        } else {
            showFieldSuccess('email');
        }
        
        const password = form.password.value;
        if (password.length < 6) {
            showFieldError('password', 'Password must be at least 6 characters');
            isValid = false;
        } else {
            showFieldSuccess('password');
        }
        
        const confirmPassword = form.confirm_password.value;
        if (password !== confirmPassword) {
            showFieldError('confirm_password', 'Passwords do not match');
            isValid = false;
        } else if (confirmPassword) {
            showFieldSuccess('confirm_password');
        }
    }
    
    if (formId === 'loginForm') {
        const email = form.email.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        } else {
            showFieldSuccess('email');
        }
        
        const password = form.password.value;
        if (password.length === 0) {
            showFieldError('password', 'Password is required');
            isValid = false;
        } else {
            showFieldSuccess('password');
        }
    }
    
    return isValid;
}

function showFieldError(fieldName, message) {
    const field = document.getElementsByName(fieldName)[0];
    const formGroup = field.closest('.form-group');
    
    formGroup.classList.add('has-error');
    
    const errorElement = document.createElement('span');
    errorElement.className = 'error-message';
    errorElement.textContent = message;
    
    formGroup.appendChild(errorElement);
}

function showFieldSuccess(fieldName) {
    const field = document.getElementsByName(fieldName)[0];
    const formGroup = field.closest('.form-group');
    
    formGroup.classList.add('has-success');
}

function setButtonLoading(button, loading = true) {
    if (loading) {
        button.disabled = true;
        const originalText = button.innerHTML;
        button.dataset.originalText = originalText;
        button.innerHTML = '<span class="loading"></span> Please wait...';
    } else {
        button.disabled = false;
        button.innerHTML = button.dataset.originalText;
    }
}

document.addEventListener('DOMContentLoaded', function() {

    const passwordField = document.getElementById('password');
    const strengthIndicator = document.getElementById('passwordStrength');
    
    if (passwordField && strengthIndicator) {
        passwordField.addEventListener('input', function() {
            const password = this.value;
            if (password.length > 0) {
                const result = checkPasswordStrength(password);
                strengthIndicator.textContent = `Password strength: ${result.text}`;
                strengthIndicator.className = `password-strength ${result.strength}`;
            } else {
                strengthIndicator.textContent = '';
                strengthIndicator.className = 'password-strength';
            }
        });
    }
    
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            if (!validateForm('registerForm')) {
                e.preventDefault();
                return false;
            }
            
            const submitButton = this.querySelector('button[type="submit"]');
            setButtonLoading(submitButton, true);
        });
    }
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            if (!validateForm('loginForm')) {
                e.preventDefault();
                return false;
            }
            
            const submitButton = this.querySelector('button[type="submit"]');
            setButtonLoading(submitButton, true);
        });
    }
    
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }, 300);
        }, 5000);
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
    
    const inputFields = document.querySelectorAll('input');
    inputFields.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
});

function onGoogleSignIn(googleUser) {

    console.log('Google Sign-In successful');
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type}`;
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.zIndex = '9999';
    notification.style.maxWidth = '400px';
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

function enableAutoSave(formId, storageKey) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    const savedData = localStorage.getItem(storageKey);
    if (savedData) {
        const data = JSON.parse(savedData);
        Object.keys(data).forEach(key => {
            const field = form.querySelector(`[name="${key}"]`);
            if (field && field.type !== 'password') {
                field.value = data[key];
            }
        });
    }
    
    form.addEventListener('input', function(e) {
        if (e.target.type === 'password') return; 
        const formData = new FormData(form);
        const data = {};
        for (let [key, value] of formData.entries()) {
            if (key !== 'password' && key !== 'confirm_password') {
                data[key] = value;
            }
        }
        localStorage.setItem(storageKey, JSON.stringify(data));
    });
    
    form.addEventListener('submit', function() {
        localStorage.removeItem(storageKey);
    });
}