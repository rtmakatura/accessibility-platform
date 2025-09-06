<?php
/*
Template Name: Custom Home Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Skip Link -->
<a href="#main-content" class="skip-nav">Skip to main content</a>

<!-- Navigation -->
<header role="banner">
    <nav class="main-nav" role="navigation" aria-label="Main navigation">
        <div class="u-container">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                <!-- Brand -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-brand">
                    <?php bloginfo('name'); ?>
                </a>

                <!-- Desktop Navigation -->
                <ul class="nav-menu" role="menubar">
                    <li class="nav-item" role="none">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link" role="menuitem">Home</a>
                    </li>
                    <li class="nav-dropdown nav-item" role="none" data-services>
                        <a href="#services" class="nav-link nav-dropdown__toggle" role="menuitem" aria-expanded="false" aria-haspopup="true">Services</a>
                        <ul class="nav-dropdown__menu" role="menu">
                            <li class="nav-dropdown__item" role="none">
                                <a href="#services" class="nav-dropdown__link" role="menuitem">All Services</a>
                            </li>
                            <li class="nav-dropdown__item" role="none">
                                <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>" class="nav-dropdown__link" role="menuitem">Accessibility Auditing</a>
                            </li>
                            <li class="nav-dropdown__item" role="none">
                                <a href="<?php echo esc_url(home_url('/risk-calculator/')); ?>" class="nav-dropdown__link" role="menuitem">Risk Calculator</a>
                            </li>
                            <li class="nav-dropdown__item" role="none">
                                <a href="#contact" class="nav-dropdown__link" role="menuitem">Consultation</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" role="none">
                        <a href="#about" class="nav-link" role="menuitem">About</a>
                    </li>
                    <li class="nav-item" role="none">
                        <a href="#contact" class="nav-link" role="menuitem">Contact</a>
                    </li>
                </ul>

                <!-- Mobile Toggle -->
                <button class="nav-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- CTA Button -->
                <div class="nav-utility">
                    <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>#quote-form" class="u-btn u-btn-primary nav-cta">Get Free Quote</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main id="main-content" role="main">
    <!-- Hero Section -->
    <section class="u-fullbleed hero-section" aria-labelledby="hero-title">
        <div class="u-section">
            <div class="u-narrow u-stack-lg" style="text-align: center;">
                <h1 id="hero-title" class="u-section-title">Ready to Lead in Digital Accessibility?</h1>
                <p class="u-lead">Join forward-thinking organizations who choose proactive accessibility compliance over reactive remediation</p>
                <div class="u-btn-row" style="justify-content: center;">
                    <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>#quote-form" class="u-btn u-btn-primary">Get Your Accessibility Audit</a>
                    <a href="#contact" class="u-btn u-btn-secondary">Schedule Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services section -->
    <section id="services" class="u-section services" aria-labelledby="services-title">
        <div class="u-container">
            <div class="u-section-header">
                <span class="u-eyebrow">Our Services</span>
                <h2 id="services-title" class="u-section-title2">Comprehensive Solutions for Every Need</h2>
                <p class="u-lead">Professional accessibility services designed to ensure your digital properties are inclusive, compliant, and user-friendly</p>
            </div>
            
            <div class="services__grid">
                <!-- Accessibility Auditing Service -->
                <article class="u-card u-card-hover service-card" aria-labelledby="service-audit-title">
                    <div class="u-card-inner u-stack">
                        <div class="u-icon u-icon-audit" aria-hidden="true"></div>
                        <h3 id="service-audit-title">Accessibility Auditing</h3>
                        <p>Comprehensive WCAG 2.1 AA compliance assessments from certified accessibility specialists. Identify and prioritize accessibility issues across your digital properties.</p>
                        <ul class="service-features">
                            <li>Manual and automated testing</li>
                            <li>WCAG 2.1 compliance assessment</li>
                            <li>Prioritized remediation roadmap</li>
                            <li>Executive summary reports</li>
                        </ul>
                        <div class="service-pricing">
                            <span class="price-range">Starting at $2,500</span>
                        </div>
                        <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>" class="u-btn u-btn-secondary u-btn-block" aria-label="Learn more about Accessibility Auditing services">Learn More</a>
                    </div>
                </article>

                <!-- Risk Assessment Service -->
                <article class="u-card u-card-hover service-card" aria-labelledby="service-risk-title">
                    <div class="u-card-inner u-stack">
                        <div class="u-icon u-icon-risk" aria-hidden="true"></div>
                        <h3 id="service-risk-title">Risk Assessment</h3>
                        <p>Calculate your organization's accessibility risk and understand potential legal exposure with our comprehensive risk assessment tool.</p>
                        <ul class="service-features">
                            <li>Legal risk evaluation</li>
                            <li>Industry-specific analysis</li>
                            <li>Compliance gap assessment</li>
                            <li>Mitigation strategies</li>
                        </ul>
                        <div class="service-pricing">
                            <span class="price-range">Free Assessment</span>
                        </div>
                        <a href="<?php echo esc_url(home_url('/risk-calculator/')); ?>" class="u-btn u-btn-secondary u-btn-block" aria-label="Start your free risk assessment">Start Assessment</a>
                    </div>
                </article>

                <!-- Implementation Service -->
                <article class="u-card u-card-hover service-card" aria-labelledby="service-implementation-title">
                    <div class="u-card-inner u-stack">
                        <div class="u-icon u-icon-implementation" aria-hidden="true"></div>
                        <h3 id="service-implementation-title">Implementation Support</h3>
                        <p>Expert guidance and hands-on support to implement accessibility improvements and maintain ongoing compliance.</p>
                        <ul class="service-features">
                            <li>Code remediation</li>
                            <li>Design system updates</li>
                            <li>Team training programs</li>
                            <li>Ongoing monitoring</li>
                        </ul>
                        <div class="service-pricing">
                            <span class="price-range">Custom Pricing</span>
                        </div>
                        <a href="#contact" class="u-btn u-btn-secondary u-btn-block" aria-label="Get quote for implementation support">Get Quote</a>
                    </div>
                </article>

                <!-- Training Service -->
                <article class="u-card u-card-hover service-card" aria-labelledby="service-training-title">
                    <div class="u-card-inner u-stack">
                        <div class="u-icon u-icon-training" aria-hidden="true"></div>
                        <h3 id="service-training-title">Team Training</h3>
                        <p>Empower your team with accessibility knowledge through our comprehensive training programs tailored to different roles.</p>
                        <ul class="service-features">
                            <li>Role-specific training</li>
                            <li>Hands-on workshops</li>
                            <li>Certification programs</li>
                            <li>Ongoing support</li>
                        </ul>
                        <div class="service-pricing">
                            <span class="price-range">$1,500/day</span>
                        </div>
                        <a href="#contact" class="u-btn u-btn-secondary u-btn-block" aria-label="Learn about team training programs">Learn More</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="u-section cta-section" aria-labelledby="contact-title">
        <div class="u-container">
            <div class="cta-section__content">
                <h2 id="contact-title" class="cta-section__title">Ready to Get Started?</h2>
                <p class="cta-section__subtitle">Schedule your free consultation and take the first step toward accessibility compliance</p>
                <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>#quote-form" class="cta-section__button">Schedule Free Consultation</a>
            </div>
        </div>
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>