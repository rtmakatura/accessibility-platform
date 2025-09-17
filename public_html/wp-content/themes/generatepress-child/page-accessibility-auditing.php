<?php
/*
Template Name: Accessibility Auditing Services
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessibility Auditing Services | Professional WCAG 2.1 Compliance Assessments</title>
    <meta name="description" content="Comprehensive accessibility auditing services from certified specialists. WCAG 2.1 AA compliance assessments, code reviews, design system audits, and user testing with assistive technology.">
    <?php wp_head(); ?>
</head>
<body <?php body_class('page-accessibility-auditing'); ?>>

<a class="skip-link screen-reader-text" href="#main-content">Skip to main content</a>

<header role="banner">
    <?php get_header(); ?>
</header>

<main id="main-content" role="main">

<!-- Hero Section -->
<section class="u-fullbleed hero-gradient" aria-labelledby="hero-title">
    <div class="u-section">
        <div class="u-narrow u-stack-lg" style="text-align: center;">
            <h1 id="hero-title" class="u-section-title">Accessibility Auditing Services</h1>
            <p class="u-lead">Comprehensive evaluations to identify and prioritize accessibility issues across your digital properties</p>
            <p class="hero-value-prop">WCAG 2.1 AA compliance assessments from certified accessibility specialists</p>
            <div class="u-btn-row" style="justify-content: center;">
                <a href="#quote-form" class="u-btn u-btn-primary" aria-label="Get your free accessibility audit quote">Get Your Free Audit Quote</a>
            </div>
            <div class="trust-signal">
                <span class="u-eyebrow">Trusted by Fortune 500 companies</span>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview Section -->
<section class="u-section" aria-labelledby="overview-title">
    <div class="u-container">
        <div class="u-narrow">
            <h2 id="overview-title" class="u-section-title2">Why Accessibility Auditing is Essential</h2>
            <div class="overview-grid">
                <div class="overview-item">
                    <svg class="overview-icon" aria-hidden="true" width="48" height="48" viewBox="0 0 24 24">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" fill="currentColor"/>
                    </svg>
                    <h3>Legal Compliance</h3>
                    <p>Meet ADA, Section 508, and AODA requirements to protect your organization from litigation</p>
                </div>
                <div class="overview-item">
                    <svg class="overview-icon" aria-hidden="true" width="48" height="48" viewBox="0 0 24 24">
                        <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" fill="currentColor"/>
                    </svg>
                    <h3>Risk Mitigation</h3>
                    <p>Identify and address accessibility barriers before they become costly problems</p>
                </div>
                <div class="overview-item">
                    <svg class="overview-icon" aria-hidden="true" width="48" height="48" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor"/>
                    </svg>
                    <h3>User Experience</h3>
                    <p>Create inclusive experiences that work for all users, expanding your market reach</p>
                </div>
                <div class="overview-item">
                    <svg class="overview-icon" aria-hidden="true" width="48" height="48" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="currentColor"/>
                    </svg>
                    <h3>Brand Protection</h3>
                    <p>Demonstrate your commitment to inclusion and social responsibility</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Individual Services Section -->
<section class="u-section u-section-light" aria-labelledby="services-title">
    <div class="u-container">
        <div class="u-section-header">
            <span class="u-eyebrow">Our Services</span>
            <h2 id="services-title" class="u-section-title2">Choose the Right Audit for Your Needs</h2>
        </div>
        
        <div class="services-grid">
            
            <!-- Service 1: Starter Audit -->
            <article class="service-card" aria-labelledby="service-1-title">
                <div class="service-card-header">
                    <span class="service-badge">Most Popular</span>
                    <h3 id="service-1-title" class="service-title">Starter Audit</h3>
                    <p class="service-subtitle">Entry-level accessibility assessment for small to medium websites</p>
                </div>
                
                <div class="service-price">
                    <span class="price-range">$2,500 - $5,000</span>
                    <span class="timeline">5-7 business days</span>
                </div>
                
                <div class="service-scope">
                    <h4>What's Included:</h4>
                    <ul class="service-features">
                        <li>5-10 page manual review by certified experts</li>
                        <li>Automated scanning with expert validation</li>
                        <li>Priority issue identification</li>
                        <li>Basic remediation roadmap</li>
                    </ul>
                </div>
                
                <div class="service-deliverables">
                    <h4>Deliverables:</h4>
                    <ul class="deliverables-list">
                        <li>Executive summary report</li>
                        <li>Prioritized issue list</li>
                        <li>WCAG compliance level assessment</li>
                    </ul>
                </div>
                
                <div class="service-best-for">
                    <p><strong>Best for:</strong> Small businesses, marketing sites, basic compliance needs</p>
                </div>
                
                <a href="#quote-form" class="u-btn u-btn-secondary u-btn-block" aria-label="Get quote for Starter Audit">Get Quote</a>
            </article>
            
            <!-- Service 2: Code Review & QA -->
            <article class="service-card" aria-labelledby="service-2-title">
                <div class="service-card-header">
                    <span class="service-badge service-badge-tech">Technical</span>
                    <h3 id="service-2-title" class="service-title">Code Review & QA</h3>
                    <p class="service-subtitle">Deep technical analysis of front-end code for accessibility barriers</p>
                </div>
                
                <div class="service-price">
                    <span class="price-range">$5,000 - $15,000</span>
                    <span class="timeline">2-3 weeks</span>
                </div>
                
                <div class="service-scope">
                    <h4>What's Included:</h4>
                    <ul class="service-features">
                        <li>Source code analysis</li>
                        <li>Component library review</li>
                        <li>Development workflow assessment</li>
                        <li>Custom accessibility testing scripts</li>
                    </ul>
                </div>
                
                <div class="service-deliverables">
                    <h4>Deliverables:</h4>
                    <ul class="deliverables-list">
                        <li>Technical remediation guide</li>
                        <li>Code snippets and examples</li>
                        <li>Developer training recommendations</li>
                        <li>Testing protocol documentation</li>
                    </ul>
                </div>
                
                <div class="service-best-for">
                    <p><strong>Best for:</strong> Development teams, complex applications, technical stakeholders</p>
                </div>
                
                <a href="#quote-form" class="u-btn u-btn-secondary u-btn-block" aria-label="Get quote for Code Review & QA">Get Quote</a>
            </article>
            
            <!-- Service 3: Design System Review -->
            <article class="service-card" aria-labelledby="service-3-title">
                <div class="service-card-header">
                    <span class="service-badge service-badge-design">Design Focus</span>
                    <h3 id="service-3-title" class="service-title">Design System Review</h3>
                    <p class="service-subtitle">Comprehensive evaluation of design systems and UI components for accessibility</p>
                </div>
                
                <div class="service-price">
                    <span class="price-range">$8,000 - $20,000</span>
                    <span class="timeline">2-4 weeks</span>
                </div>
                
                <div class="service-scope">
                    <h4>What's Included:</h4>
                    <ul class="service-features">
                        <li>Component accessibility analysis</li>
                        <li>Color contrast validation</li>
                        <li>Typography and spacing review</li>
                        <li>Interactive element assessment</li>
                        <li>Design token recommendations</li>
                    </ul>
                </div>
                
                <div class="service-deliverables">
                    <h4>Deliverables:</h4>
                    <ul class="deliverables-list">
                        <li>Accessible design system guidelines</li>
                        <li>Component modification recommendations</li>
                        <li>Style guide updates</li>
                        <li>Designer training materials</li>
                    </ul>
                </div>
                
                <div class="service-best-for">
                    <p><strong>Best for:</strong> Design teams, scalable products, enterprise applications</p>
                </div>
                
                <a href="#quote-form" class="u-btn u-btn-secondary u-btn-block" aria-label="Get quote for Design System Review">Get Quote</a>
            </article>
            
            <!-- Service 4: User Testing with AT -->
            <article class="service-card" aria-labelledby="service-4-title">
                <div class="service-card-header">
                    <span class="service-badge service-badge-premium">Premium</span>
                    <h3 id="service-4-title" class="service-title">User Testing with AT</h3>
                    <p class="service-subtitle">Real-world testing with assistive technology users and accessibility experts</p>
                </div>
                
                <div class="service-price">
                    <span class="price-range">$10,000 - $25,000</span>
                    <span class="timeline">3-4 weeks</span>
                </div>
                
                <div class="service-scope">
                    <h4>What's Included:</h4>
                    <ul class="service-features">
                        <li>Screen reader testing (NVDA, JAWS, VoiceOver)</li>
                        <li>Keyboard navigation assessment</li>
                        <li>Voice control testing</li>
                        <li>User interviews with disabled users</li>
                        <li>Usability barrier identification</li>
                    </ul>
                </div>
                
                <div class="service-deliverables">
                    <h4>Deliverables:</h4>
                    <ul class="deliverables-list">
                        <li>User testing videos and reports</li>
                        <li>Accessibility user journey maps</li>
                        <li>Persona-based recommendations</li>
                        <li>Usability improvement roadmap</li>
                    </ul>
                </div>
                
                <div class="service-best-for">
                    <p><strong>Best for:</strong> Complex applications, user-focused products, compliance validation</p>
                </div>
                
                <a href="#quote-form" class="u-btn u-btn-primary u-btn-block" aria-label="Get quote for User Testing with AT">Get Premium Quote</a>
            </article>
        </div>
    </div>
</section>

<!-- Pricing & Packages Section -->
<section class="u-section" aria-labelledby="pricing-title">
    <div class="u-container">
        <div class="u-section-header">
            <span class="u-eyebrow">Pricing & Packages</span>
            <h2 id="pricing-title" class="u-section-title2">Transparent Pricing for Every Budget</h2>
        </div>
        
        <div class="pricing-wrapper">
            <div class="package-deal">
                <div class="package-header">
                    <h3>Complete Audit Package</h3>
                    <span class="package-badge">Save 20%</span>
                </div>
                <p>Combine multiple services for comprehensive coverage</p>
                <ul class="package-includes">
                    <li>Starter Audit + Code Review</li>
                    <li>Design System Review + User Testing</li>
                    <li>Priority support and faster delivery</li>
                </ul>
                <a href="#quote-form" class="u-btn u-btn-primary">Get Package Quote</a>
            </div>
            
            <div class="enterprise-pricing">
                <h3>Enterprise Solutions</h3>
                <p>Custom pricing for large organizations with complex needs</p>
                <ul>
                    <li>Multi-property audits</li>
                    <li>Ongoing monitoring</li>
                    <li>Dedicated account management</li>
                    <li>Volume discounts available</li>
                </ul>
                <a href="#consultation" class="u-btn u-btn-secondary">Contact Enterprise Sales</a>
            </div>
            
            <div class="roi-calculator">
                <h3>Cost of Non-Compliance</h3>
                <div class="cost-comparison">
                    <div class="cost-item">
                        <span class="cost-label">Average ADA lawsuit settlement:</span>
                        <span class="cost-value">$75,000 - $150,000</span>
                    </div>
                    <div class="cost-item">
                        <span class="cost-label">Accessibility audit investment:</span>
                        <span class="cost-value">$2,500 - $25,000</span>
                    </div>
                    <div class="cost-item highlight">
                        <span class="cost-label">ROI on prevention:</span>
                        <span class="cost-value">300-600%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Overview Section -->
<section class="u-section u-section-light" aria-labelledby="process-title">
    <div class="u-container">
        <div class="u-section-header">
            <span class="u-eyebrow">Our Process</span>
            <h2 id="process-title" class="u-section-title2">Simple, Transparent, Effective</h2>
        </div>
        
        <ol class="process-timeline">
            <li class="process-step">
                <div class="step-number" aria-hidden="true">1</div>
                <div class="step-content">
                    <h3>Discovery Call</h3>
                    <p>30-minute free consultation to understand your needs</p>
                </div>
            </li>
            <li class="process-step">
                <div class="step-number" aria-hidden="true">2</div>
                <div class="step-content">
                    <h3>Scope Definition</h3>
                    <p>Tailored proposal with clear deliverables and timeline</p>
                </div>
            </li>
            <li class="process-step">
                <div class="step-number" aria-hidden="true">3</div>
                <div class="step-content">
                    <h3>Audit Execution</h3>
                    <p>Expert evaluation using industry-standard methodologies</p>
                </div>
            </li>
            <li class="process-step">
                <div class="step-number" aria-hidden="true">4</div>
                <div class="step-content">
                    <h3>Report Delivery</h3>
                    <p>Comprehensive findings with actionable recommendations</p>
                </div>
            </li>
            <li class="process-step">
                <div class="step-number" aria-hidden="true">5</div>
                <div class="step-content">
                    <h3>Review Meeting</h3>
                    <p>Discuss results and plan next steps together</p>
                </div>
            </li>
            <li class="process-step">
                <div class="step-number" aria-hidden="true">6</div>
                <div class="step-content">
                    <h3>Ongoing Support</h3>
                    <p>Optional continued guidance and monitoring</p>
                </div>
            </li>
        </ol>
    </div>
</section>

<!-- FAQ Section -->
<section class="u-section" aria-labelledby="faq-title">
    <div class="u-container">
        <div class="u-section-header">
            <span class="u-eyebrow">Frequently Asked Questions</span>
            <h2 id="faq-title" class="u-section-title2">Everything You Need to Know</h2>
        </div>
        
        <div class="faq-grid">
            <details class="faq-item">
                <summary>How long does an accessibility audit take?</summary>
                <p>Timeline varies by service complexity. Starter audits complete in 5-7 days, while comprehensive assessments may take 3-4 weeks. We'll provide exact timelines during your discovery call.</p>
            </details>
            
            <details class="faq-item">
                <summary>What accessibility standards do you audit against?</summary>
                <p>We primarily audit against WCAG 2.1 AA standards, with options for Section 508, ADA compliance, and international standards like EN 301 549. We can customize our approach to meet your specific regulatory requirements.</p>
            </details>
            
            <details class="faq-item">
                <summary>Do you provide remediation services?</summary>
                <p>Yes, we offer full remediation services. Our audits include prioritized recommendations and we can handle implementation through our expert development team.</p>
            </details>
            
            <details class="faq-item">
                <summary>What's included in the audit report?</summary>
                <p>All reports include executive summary, detailed findings with screenshots, WCAG compliance assessment, prioritized remediation roadmap, and technical recommendations with code examples where applicable.</p>
            </details>
            
            <details class="faq-item">
                <summary>Can you audit mobile applications?</summary>
                <p>Yes, we audit native iOS/Android apps, responsive websites, and progressive web applications. Our mobile testing includes real device testing and platform-specific accessibility features.</p>
            </details>
            
            <details class="faq-item">
                <summary>What if we need ongoing accessibility support?</summary>
                <p>We offer monthly monitoring, compliance maintenance, and team training programs for long-term partnerships. Many clients choose our retainer model for continuous accessibility assurance.</p>
            </details>
            
            <details class="faq-item">
                <summary>How do you handle confidential or internal applications?</summary>
                <p>We sign NDAs and can work within secure environments. Our team is experienced with enterprise security requirements and can use VPNs, secure testing environments, or on-site visits as needed.</p>
            </details>
            
            <details class="faq-item">
                <summary>What's your experience with legal compliance?</summary>
                <p>Our team has supported clients through ADA lawsuits and regulatory audits. We provide documentation suitable for legal review and can serve as expert witnesses if required.</p>
            </details>
        </div>
    </div>
</section>

<!-- Trust & Credibility Section -->
<section class="u-section u-section-light" aria-labelledby="trust-title">
    <div class="u-container">
        <div class="u-section-header">
            <span class="u-eyebrow">Why Choose Us</span>
            <h2 id="trust-title" class="u-section-title2">Trusted by Leading Organizations</h2>
        </div>
        
        <div class="trust-grid">
            <div class="testimonial-card">
                <blockquote>
                    <p>"Their comprehensive audit helped us avoid a potential lawsuit and improve our user experience for millions of customers. The ROI was immediate and substantial."</p>
                    <footer>
                        <cite>Sarah Johnson, VP of Digital, Fortune 500 Retailer</cite>
                    </footer>
                </blockquote>
            </div>
            
            <div class="testimonial-card">
                <blockquote>
                    <p>"The user testing with AT was eye-opening. We discovered critical barriers we never would have found through automated testing alone."</p>
                    <footer>
                        <cite>Michael Chen, CTO, Healthcare Technology Company</cite>
                    </footer>
                </blockquote>
            </div>
            
            <div class="testimonial-card">
                <blockquote>
                    <p>"Their design system review transformed how our entire team approaches accessibility. It's now embedded in our process from the start."</p>
                    <footer>
                        <cite>Emily Rodriguez, Design Director, Financial Services</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        
        <div class="credentials">
            <h3>Our Certifications & Credentials</h3>
            <div class="credentials-grid">
                <div class="credential-item">
                    <img src="/wp-content/uploads/iaap-logo.svg" alt="IAAP Certification" width="120" height="60">
                    <p>IAAP Certified Professionals</p>
                </div>
                <div class="credential-item">
                    <img src="/wp-content/uploads/dhs-logo.svg" alt="DHS Trusted Tester" width="120" height="60">
                    <p>DHS Trusted Tester Certified</p>
                </div>
                <div class="credential-item">
                    <img src="/wp-content/uploads/w3c-logo.svg" alt="W3C Member" width="120" height="60">
                    <p>W3C WAI Contributors</p>
                </div>
            </div>
        </div>
        
        <div class="case-study-highlights">
            <h3>Recent Success Stories</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Audits Completed</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span class="stat-label">Client Retention Rate</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">$2M+</span>
                    <span class="stat-label">Legal Costs Prevented</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">48hr</span>
                    <span class="stat-label">Emergency Response Time</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call-to-Action Section -->
<section class="u-fullbleed cta-gradient" aria-labelledby="cta-title">
    <div class="u-section">
        <div class="u-narrow u-stack-lg" style="text-align: center;">
            <h2 id="cta-title" class="u-section-title">Start Your Accessibility Audit Today</h2>
            <p class="u-lead">Join hundreds of organizations who have made accessibility a priority</p>
            
            <div class="cta-options">
                <div class="cta-card">
                    <h3>Ready to Begin?</h3>
                    <p>Get your free quote in 24 hours</p>
                    <a href="#quote-form" class="u-btn u-btn-primary u-btn-lg">Start Your Accessibility Audit</a>
                </div>
                
                <div class="cta-card">
                    <h3>Have Questions?</h3>
                    <p>Speak with an accessibility expert</p>
                    <a href="#consultation" class="u-btn u-btn-secondary u-btn-lg">Schedule a Consultation</a>
                </div>
            </div>
            
            <div class="emergency-notice">
                <p><strong>Facing a lawsuit or compliance deadline?</strong></p>
                <p>We offer emergency audit services with 48-hour turnaround.</p>
                <p>Call: <a href="tel:1-800-ACCESS-NOW">1-800-ACCESS-NOW</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Quote Form Section -->
<section class="u-section" id="quote-form" aria-labelledby="form-title">
    <div class="u-container">
        <div class="u-narrow">
            <h2 id="form-title" class="u-section-title2">Get Your Free Audit Quote</h2>
            <p class="form-intro">Tell us about your project and we'll provide a detailed quote within 24 hours</p>
            
            <form class="audit-quote-form" method="post" action="/process-audit-quote">
                <div class="form-group">
                    <label for="company-name">Company Name <span aria-label="required">*</span></label>
                    <input type="text" id="company-name" name="company_name" required aria-required="true">
                </div>
                
                <div class="form-group">
                    <label for="contact-name">Your Name <span aria-label="required">*</span></label>
                    <input type="text" id="contact-name" name="contact_name" required aria-required="true">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address <span aria-label="required">*</span></label>
                    <input type="email" id="email" name="email" required aria-required="true">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="website-url">Website URL <span aria-label="required">*</span></label>
                    <input type="url" id="website-url" name="website_url" required aria-required="true">
                </div>
                
                <fieldset class="form-group">
                    <legend>Services Interested In</legend>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="services[]" value="starter-audit">
                            Starter Audit
                        </label>
                        <label>
                            <input type="checkbox" name="services[]" value="code-review">
                            Code Review & QA
                        </label>
                        <label>
                            <input type="checkbox" name="services[]" value="design-system">
                            Design System Review
                        </label>
                        <label>
                            <input type="checkbox" name="services[]" value="user-testing">
                            User Testing with AT
                        </label>
                    </div>
                </fieldset>
                
                <div class="form-group">
                    <label for="timeline">Desired Timeline</label>
                    <select id="timeline" name="timeline">
                        <option value="">Select timeline</option>
                        <option value="urgent">Urgent (Within 1 week)</option>
                        <option value="soon">Soon (2-4 weeks)</option>
                        <option value="planning">Planning (1-3 months)</option>
                        <option value="exploring">Just exploring options</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Additional Information</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us about your specific needs, compliance requirements, or any deadlines"></textarea>
                </div>
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="consent" required aria-required="true">
                        I consent to receiving communications about this quote request
                    </label>
                </div>
                
                <button type="submit" class="u-btn u-btn-primary u-btn-lg">Get My Free Quote</button>
            </form>
            
            <p class="form-disclaimer">We respect your privacy and will never share your information. Response guaranteed within 24 business hours.</p>
        </div>
    </div>
</section>

</main>

<footer role="contentinfo">
    <?php get_footer(); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>