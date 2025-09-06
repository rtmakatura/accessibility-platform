/**
 * Accessibility Auditing Page JavaScript
 * Handles form validation, interactive elements, and analytics
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Form validation and submission
    const auditForm = document.querySelector('.audit-quote-form');
    if (auditForm) {
        auditForm.addEventListener('submit', handleFormSubmit);
    }
    
    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', smoothScroll);
    });
    
    // Service card interactions
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', handleServiceCardClick);
    });
    
    // FAQ keyboard navigation enhancement
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const summary = item.querySelector('summary');
        summary.addEventListener('keydown', handleFAQKeydown);
    });
    
    // Analytics tracking for conversions
    trackPageInteractions();
});

/**
 * Handle form submission with validation
 */
function handleFormSubmit(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    
    // Basic validation
    if (!validateForm(form)) {
        return false;
    }
    
    // Show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;
    
    // Simulate form submission (replace with actual endpoint)
    fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showSuccessMessage(form);
            form.reset();
            
            // Track conversion
            if (typeof gtag !== 'undefined') {
                gtag('event', 'conversion', {
                    'send_to': 'audit_quote_request',
                    'value': 1.0,
                    'currency': 'USD'
                });
            }
        } else {
            showErrorMessage(form, data.message);
        }
    })
    .catch(error => {
        showErrorMessage(form, 'An error occurred. Please try again.');
    })
    .finally(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}

/**
 * Validate form inputs
 */
function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');
    
    requiredFields.forEach(field => {
        const errorElement = field.parentElement.querySelector('.error-message');
        if (errorElement) {
            errorElement.remove();
        }
        
        if (!field.value.trim()) {
            isValid = false;
            showFieldError(field, 'This field is required');
        } else if (field.type === 'email' && !isValidEmail(field.value)) {
            isValid = false;
            showFieldError(field, 'Please enter a valid email address');
        } else if (field.type === 'url' && !isValidURL(field.value)) {
            isValid = false;
            showFieldError(field, 'Please enter a valid URL');
        }
    });
    
    // Check if at least one service is selected
    const serviceCheckboxes = form.querySelectorAll('input[name="services[]"]');
    const isServiceSelected = Array.from(serviceCheckboxes).some(cb => cb.checked);
    
    if (!isServiceSelected) {
        isValid = false;
        const fieldset = form.querySelector('fieldset');
        showFieldError(fieldset, 'Please select at least one service');
    }
    
    return isValid;
}

/**
 * Show field error message
 */
function showFieldError(field, message) {
    const error = document.createElement('span');
    error.className = 'error-message';
    error.textContent = message;
    error.setAttribute('role', 'alert');
    error.style.color = 'var(--color-error)';
    error.style.fontSize = '0.875rem';
    error.style.marginTop = '0.25rem';
    error.style.display = 'block';
    
    if (field.tagName === 'FIELDSET') {
        field.appendChild(error);
    } else {
        field.parentElement.appendChild(error);
    }
    
    // Announce error to screen readers
    const announcement = document.createElement('div');
    announcement.className = 'screen-reader-text';
    announcement.setAttribute('aria-live', 'polite');
    announcement.textContent = `Error: ${message}`;
    document.body.appendChild(announcement);
    
    setTimeout(() => announcement.remove(), 100);
}

/**
 * Email validation
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * URL validation
 */
function isValidURL(url) {
    try {
        new URL(url);
        return true;
    } catch {
        return false;
    }
}

/**
 * Show success message after form submission
 */
function showSuccessMessage(form) {
    const message = document.createElement('div');
    message.className = 'success-message';
    message.setAttribute('role', 'alert');
    message.innerHTML = `
        <h3>Thank you for your inquiry!</h3>
        <p>We've received your audit quote request and will respond within 24 business hours.</p>
        <p>Check your email for confirmation.</p>
    `;
    
    message.style.cssText = `
        background: var(--color-success-light);
        border: 2px solid var(--color-success);
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
        margin-top: 2rem;
    `;
    
    form.parentElement.insertBefore(message, form);
    form.style.display = 'none';
    
    // Scroll to message
    message.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

/**
 * Show error message
 */
function showErrorMessage(form, errorText) {
    const existingError = form.querySelector('.form-error-message');
    if (existingError) {
        existingError.remove();
    }
    
    const message = document.createElement('div');
    message.className = 'form-error-message';
    message.setAttribute('role', 'alert');
    message.textContent = errorText || 'An error occurred. Please try again.';
    
    message.style.cssText = `
        background: var(--color-error-light);
        border: 2px solid var(--color-error);
        color: var(--color-error-dark);
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
    `;
    
    form.insertBefore(message, form.firstChild);
    message.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

/**
 * Smooth scroll for anchor links
 */
function smoothScroll(e) {
    const href = e.currentTarget.getAttribute('href');
    
    if (href === '#') return;
    
    const target = document.querySelector(href);
    if (target) {
        e.preventDefault();
        
        const offset = 100; // Account for fixed header
        const targetPosition = target.offsetTop - offset;
        
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
        
        // Update URL without scrolling
        history.pushState(null, null, href);
        
        // Set focus for accessibility
        target.setAttribute('tabindex', '-1');
        target.focus();
    }
}

/**
 * Handle service card clicks for better mobile UX
 */
function handleServiceCardClick(e) {
    // Don't interfere with button clicks
    if (e.target.closest('.u-btn')) return;
    
    const card = e.currentTarget;
    const button = card.querySelector('.u-btn');
    
    // On mobile, make entire card clickable
    if (window.innerWidth <= 768 && button) {
        button.click();
    }
}

/**
 * Enhanced keyboard navigation for FAQ items
 */
function handleFAQKeydown(e) {
    const summary = e.currentTarget;
    const details = summary.parentElement;
    
    switch(e.key) {
        case 'Enter':
        case ' ':
            // Space key is already handled by default
            if (e.key === 'Enter') {
                e.preventDefault();
                details.open = !details.open;
            }
            break;
        case 'ArrowUp':
            e.preventDefault();
            const prevDetails = details.previousElementSibling;
            if (prevDetails && prevDetails.classList.contains('faq-item')) {
                prevDetails.querySelector('summary').focus();
            }
            break;
        case 'ArrowDown':
            e.preventDefault();
            const nextDetails = details.nextElementSibling;
            if (nextDetails && nextDetails.classList.contains('faq-item')) {
                nextDetails.querySelector('summary').focus();
            }
            break;
    }
}

/**
 * Track page interactions for analytics
 */
function trackPageInteractions() {
    // Track service card views
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const serviceName = entry.target.querySelector('.service-title')?.textContent;
                    if (serviceName && typeof gtag !== 'undefined') {
                        gtag('event', 'view_item', {
                            'item_name': serviceName,
                            'item_category': 'audit_service'
                        });
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.service-card').forEach(card => {
            observer.observe(card);
        });
    }
    
    // Track CTA button clicks
    document.querySelectorAll('.u-btn').forEach(button => {
        button.addEventListener('click', function() {
            const buttonText = this.textContent;
            const buttonType = this.classList.contains('u-btn-primary') ? 'primary' : 'secondary';
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'CTA',
                    'event_label': buttonText,
                    'button_type': buttonType
                });
            }
        });
    });
    
    // Track FAQ interactions
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('toggle', function() {
            if (this.open) {
                const question = this.querySelector('summary').textContent;
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'faq_expand', {
                        'question': question
                    });
                }
            }
        });
    });
}

/**
 * Progressive enhancement for users with JavaScript disabled
 */
(function() {
    // Add JS-enabled class to body
    document.body.classList.add('js-enabled');
    
    // Remove no-js messages if any
    const noJsMessages = document.querySelectorAll('.no-js-message');
    noJsMessages.forEach(msg => msg.remove());
})();