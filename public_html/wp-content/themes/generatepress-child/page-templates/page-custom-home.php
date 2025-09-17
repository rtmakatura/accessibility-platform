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
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Navigation -->
<header role="banner">
    <nav class="accessible-menubar" aria-label="Primary">
        <div class="accessible-menubar__container">
            <!-- Logo -->
            <div class="accessible-menubar__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?> - Go to homepage">
                    <?php bloginfo('name'); ?>
                </a>
            </div>

            <!-- Desktop Menu -->
            <ul class="accessible-menubar__menu" role="menubar">
                <li role="none">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="accessible-menubar__link" role="menuitem" aria-current="page">Home</a>
                </li>
                <li role="none">
                    <button class="accessible-menubar__link" role="menuitem" aria-haspopup="true" aria-expanded="false" aria-controls="services-submenu">
                        Services
                    </button>
                    <ul id="services-submenu" class="accessible-menubar__submenu" role="menu">
                        <li role="none">
                            <a href="#services" class="accessible-menubar__submenu-link" role="menuitem">All Services</a>
                        </li>
                        <li role="none">
                            <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>" class="accessible-menubar__submenu-link" role="menuitem">Accessibility Auditing</a>
                        </li>
                        <li role="none">
                            <a href="<?php echo esc_url(home_url('/risk-calculator/')); ?>" class="accessible-menubar__submenu-link" role="menuitem">Risk Calculator</a>
                        </li>
                        <li role="none">
                            <a href="#contact" class="accessible-menubar__submenu-link" role="menuitem">Consultation</a>
                        </li>
                    </ul>
                </li>
                <li role="none">
                    <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="accessible-menubar__link" role="menuitem">Resources</a>
                </li>
                <li role="none">
                    <a href="#about" class="accessible-menubar__link" role="menuitem">About</a>
                </li>
                <li role="none">
                    <a href="#contact" class="accessible-menubar__link" role="menuitem">Contact</a>
                </li>
            </ul>

            <!-- CTA Button -->
            <div class="accessible-menubar__cta">
                <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>#quote-form" class="accessible-menubar__cta-button">Get Free Quote</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="accessible-menubar__toggle" aria-controls="primary-nav" aria-expanded="false" aria-label="Open mobile menu">
                <span class="accessible-menubar__hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="primary-nav" class="accessible-menubar__mobile-menu" role="menu">
            <div class="accessible-menubar__mobile-content">
                <ul role="none">
                    <li role="none">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="accessible-menubar__mobile-link" role="menuitem">Home</a>
                    </li>
                    <li role="none">
                        <button class="accessible-menubar__mobile-link" role="menuitem" aria-expanded="false" aria-controls="mobile-services-submenu">
                            Services
                            <span class="accessible-menubar__mobile-arrow" aria-hidden="true">+</span>
                        </button>
                        <ul id="mobile-services-submenu" class="accessible-menubar__mobile-submenu" role="menu">
                            <li role="none">
                                <a href="#services" class="accessible-menubar__mobile-submenu-link" role="menuitem">All Services</a>
                            </li>
                            <li role="none">
                                <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>" class="accessible-menubar__mobile-submenu-link" role="menuitem">Accessibility Auditing</a>
                            </li>
                            <li role="none">
                                <a href="<?php echo esc_url(home_url('/risk-calculator/')); ?>" class="accessible-menubar__mobile-submenu-link" role="menuitem">Risk Calculator</a>
                            </li>
                            <li role="none">
                                <a href="#contact" class="accessible-menubar__mobile-submenu-link" role="menuitem">Consultation</a>
                            </li>
                        </ul>
                    </li>
                    <li role="none">
                        <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="accessible-menubar__mobile-link" role="menuitem">Resources</a>
                    </li>
                    <li role="none">
                        <a href="#about" class="accessible-menubar__mobile-link" role="menuitem">About</a>
                    </li>
                    <li role="none">
                        <a href="#contact" class="accessible-menubar__mobile-link" role="menuitem">Contact</a>
                    </li>
                </ul>

                <!-- Mobile CTA -->
                <div class="accessible-menubar__mobile-cta">
                    <a href="<?php echo esc_url(home_url('/accessibility-auditing/')); ?>#quote-form" class="accessible-menubar__cta-button">Get Free Quote</a>
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

    <!-- The Opportunity Section -->
    <section id="opportunity" class="u-section opportunity-section" aria-labelledby="opportunity-title">
        <div class="u-container">
            <div class="opportunity-header">
                <h2 id="opportunity-title" class="opportunity-title">The Opportunity</h2>
                <p class="opportunity-subtitle">Transform accessibility from compliance burden to competitive advantage with data-driven insights</p>
            </div>
            
            <div class="opportunity-stats">
                <!-- Market Size Card -->
                <div class="stat-card stat-card-enhanced">
                    <span class="stat-number" data-counter="1.3B">1.3B</span>
                    <span class="stat-label">
                        Global Market Size
                        <button class="tooltip-trigger" aria-label="More information about global market size">?</button>
                    </span>
                    <span class="stat-context">People with disabilities worldwide</span>
                    
                    <div class="tooltip" aria-hidden="true">
                        <div class="tooltip-content">
                            <div class="tooltip-title">Untapped Market Potential</div>
                            <p>The disability community represents:</p>
                            <ul class="tooltip-list">
                                <li>15% of global population</li>
                                <li>1 in 4 adults in the United States</li>
                                <li>Growing demographic with aging population</li>
                                <li>$13 trillion in annual disposable income</li>
                                <li>2x more likely to remain loyal to accessible brands</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ROI Card -->
                <div class="stat-card stat-card-enhanced">
                    <span class="stat-trend">
                        <span class="stat-trend-icon">↑</span> 35% YoY
                    </span>
                    <span class="stat-number" data-counter="10">10x</span>
                    <span class="stat-label">
                        Average ROI
                        <button class="tooltip-trigger" aria-label="More information about return on investment">?</button>
                    </span>
                    <span class="stat-context">Return on accessibility investment</span>
                    
                    <div class="tooltip" aria-hidden="true">
                        <div class="tooltip-content">
                            <div class="tooltip-title">ROI Breakdown</div>
                            <p>Companies see returns through:</p>
                            <ul class="tooltip-list">
                                <li>88% higher conversion rates</li>
                                <li>Reduced legal risk (4,605 lawsuits in 2023)</li>
                                <li>Improved SEO rankings</li>
                                <li>Lower customer acquisition costs</li>
                                <li>Enhanced brand reputation</li>
                                <li>Increased customer lifetime value</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Legal Risk Card -->
                <div class="stat-card stat-card-enhanced">
                    <span class="stat-trend negative">
                        <span class="stat-trend-icon">↑</span> 43% increase
                    </span>
                    <span class="stat-number" data-counter="4605">4,605</span>
                    <span class="stat-label">
                        ADA Lawsuits in 2023
                        <button class="tooltip-trigger" aria-label="More information about legal risks">?</button>
                    </span>
                    <span class="stat-context">Digital accessibility cases filed</span>
                    
                    <div class="tooltip" aria-hidden="true">
                        <div class="tooltip-content">
                            <div class="tooltip-title">Legal Risk Factors</div>
                            <p>Protect your organization from:</p>
                            <ul class="tooltip-list">
                                <li>Average settlement: $25,000-$75,000</li>
                                <li>Legal fees: $100,000+</li>
                                <li>Brand reputation damage</li>
                                <li>Lost customer trust</li>
                                <li>Mandatory ongoing monitoring</li>
                                <li>Public relations crisis</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- User Impact Card -->
                <div class="stat-card stat-card-enhanced">
                    <span class="stat-number" data-counter="71">71%</span>
                    <span class="stat-label">
                        Users Leave
                        <button class="tooltip-trigger" aria-label="More information about user behavior">?</button>
                    </span>
                    <span class="stat-context">When sites are inaccessible</span>
                    
                    <div class="tooltip" aria-hidden="true">
                        <div class="tooltip-content">
                            <div class="tooltip-title">User Behavior Impact</div>
                            <p>Inaccessibility affects everyone:</p>
                            <ul class="tooltip-list">
                                <li>71% abandon inaccessible sites</li>
                                <li>62% share negative experiences</li>
                                <li>85% willing to pay more for accessibility</li>
                                <li>Benefits aging users (fastest growing segment)</li>
                                <li>Improves mobile experience</li>
                                <li>Reduces cognitive load for all users</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="opportunity-cta" style="text-align: center; margin-top: 3rem;">
                <p style="font-size: 1.125rem; margin-bottom: 1.5rem;">Ready to capture your share of this growing market?</p>
                <div class="u-btn-row" style="justify-content: center;">
                    <a href="<?php echo esc_url(home_url('/risk-calculator/')); ?>" class="u-btn u-btn-secondary">Calculate Your Risk</a>
                    <a href="#services" class="u-btn u-btn-primary">Explore Solutions</a>
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

    <!-- Resources Section -->
    <section id="resources" class="u-section resources-section" aria-labelledby="resources-title">
        <div class="u-container">
            <div class="u-section-header">
                <span class="u-eyebrow">Free Resources</span>
                <h2 id="resources-title" class="u-section-title2">Accessibility Resources & Tools</h2>
                <p class="u-lead">Access our comprehensive library of guides, checklists, and tools to support your accessibility journey</p>
            </div>
            
            <div class="resources-preview">
                <div class="resource-preview-card">
                    <h3>WCAG 2.1 Guide</h3>
                    <p>Complete implementation guide for WCAG 2.1 Level AA compliance</p>
                    <a href="<?php echo home_url('/resources/wcag-compliance-guide/'); ?>" class="resource-link">Access Guide →</a>
                </div>
                <div class="resource-preview-card">
                    <h3>Audit Checklist</h3>
                    <p>100+ checkpoint accessibility audit checklist</p>
                    <a href="<?php echo home_url('/resources/audit-checklist/'); ?>" class="resource-link">View Checklist →</a>
                </div>
                <div class="resource-preview-card">
                    <h3>Testing Toolkit</h3>
                    <p>Curated collection of accessibility testing tools</p>
                    <a href="<?php echo home_url('/resources/testing-toolkit/'); ?>" class="resource-link">Explore Tools →</a>
                </div>
            </div>
            
            <div class="resources-cta">
                <a href="<?php echo home_url('/resources/'); ?>" class="u-btn u-btn-secondary">View All Resources</a>
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