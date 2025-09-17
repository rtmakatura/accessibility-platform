<?php
/**
 * Template Name: Resources Hub
 * Description: Main resources page displaying all accessibility resources
 */

get_header(); ?>

<div class="accessibility-platform">
    
    <!-- Page Header -->
    <section class="resources-header">
        <div class="container">
            <h1 class="page-title">Accessibility Resources</h1>
            <p class="page-subtitle">Free tools, guides, and templates to help you achieve and maintain accessibility compliance</p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <a href="<?php echo home_url('/'); ?>" class="breadcrumb-link">← Back to Home</a>
        </div>
    </nav>

    <!-- Resources Grid -->
    <main class="resources-main">
        <div class="container">
            <div class="resources-grid">
                
                <!-- WCAG Compliance Guide -->
                <article class="resource-card" aria-labelledby="resource-wcag-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h2 id="resource-wcag-title" class="resource-card__title">WCAG 2.1 Compliance Guide</h2>
                    <p class="resource-card__description">Comprehensive guide to understanding and implementing WCAG 2.1 Level AA standards with practical examples and best practices.</p>
                    <ul class="resource-card__features">
                        <li>All WCAG 2.1 success criteria explained</li>
                        <li>Implementation examples</li>
                        <li>Testing methodologies</li>
                        <li>Common pitfalls to avoid</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/wcag-compliance-guide/'); ?>" class="btn btn--primary" aria-label="Access WCAG 2.1 Compliance Guide">
                            Access Guide
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Audit Checklist -->
                <article class="resource-card" aria-labelledby="resource-checklist-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 11l3 3L22 4"></path>
                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                        </svg>
                    </div>
                    <h2 id="resource-checklist-title" class="resource-card__title">Accessibility Audit Checklist</h2>
                    <p class="resource-card__description">Step-by-step checklist for conducting thorough accessibility audits, covering all critical areas of digital accessibility.</p>
                    <ul class="resource-card__features">
                        <li>100+ checkpoint items</li>
                        <li>Priority levels indicated</li>
                        <li>Testing tools recommendations</li>
                        <li>Remediation guidance</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/audit-checklist/'); ?>" class="btn btn--primary" aria-label="Access Accessibility Audit Checklist">
                            View Checklist
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Testing Toolkit -->
                <article class="resource-card" aria-labelledby="resource-toolkit-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                    </div>
                    <h2 id="resource-toolkit-title" class="resource-card__title">Testing Tools & Toolkit</h2>
                    <p class="resource-card__description">Curated collection of the best accessibility testing tools, browser extensions, and automated testing solutions.</p>
                    <ul class="resource-card__features">
                        <li>Free and paid tool reviews</li>
                        <li>Tool comparison matrix</li>
                        <li>Setup instructions</li>
                        <li>Testing workflows</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/testing-toolkit/'); ?>" class="btn btn--primary" aria-label="Access Testing Tools and Toolkit">
                            Explore Tools
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Template Library -->
                <article class="resource-card" aria-labelledby="resource-templates-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <h2 id="resource-templates-title" class="resource-card__title">Template Library</h2>
                    <p class="resource-card__description">Ready-to-use templates for accessibility policies, statements, reports, and documentation to accelerate your compliance efforts.</p>
                    <ul class="resource-card__features">
                        <li>Accessibility statement templates</li>
                        <li>Policy document templates</li>
                        <li>Report templates</li>
                        <li>Training materials</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/template-library/'); ?>" class="btn btn--primary" aria-label="Access Template Library">
                            Browse Templates
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Legal Compliance Center -->
                <article class="resource-card" aria-labelledby="resource-legal-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <h2 id="resource-legal-title" class="resource-card__title">Legal Compliance Center</h2>
                    <p class="resource-card__description">Stay informed about accessibility laws, regulations, and legal requirements across different jurisdictions and industries.</p>
                    <ul class="resource-card__features">
                        <li>ADA Title III requirements</li>
                        <li>International regulations</li>
                        <li>Industry-specific guidelines</li>
                        <li>Legal precedents & cases</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/legal-compliance/'); ?>" class="btn btn--primary" aria-label="Access Legal Compliance Center">
                            Learn More
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Lawsuit Trends & Risk Analysis -->
                <article class="resource-card" aria-labelledby="resource-lawsuit-title">
                    <div class="resource-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <h2 id="resource-lawsuit-title" class="resource-card__title">Lawsuit Trends & Risk Analysis</h2>
                    <p class="resource-card__description">Understanding the legal landscape and protecting your organization from accessibility litigation.</p>
                    <ul class="resource-card__features">
                        <li>Current lawsuit statistics</li>
                        <li>Key risk drivers analysis</li>
                        <li>Industry-specific trends</li>
                        <li>Protection strategies</li>
                    </ul>
                    <div class="resource-card__actions">
                        <a href="<?php echo home_url('/resources/lawsuit-trends/'); ?>" class="btn btn--primary" aria-label="Access Lawsuit Trends & Risk Analysis">
                            View Analysis
                            <svg class="btn__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

            </div>

            <!-- Newsletter Signup -->
            <section class="resource-newsletter" aria-labelledby="newsletter-title">
                <div class="resource-newsletter__content">
                    <h2 id="newsletter-title" class="resource-newsletter__title">Stay Updated</h2>
                    <p class="resource-newsletter__description">Get the latest accessibility resources, guides, and compliance updates delivered to your inbox.</p>
                    <form class="resource-newsletter__form" action="#" method="post">
                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required class="resource-newsletter__input">
                        <button type="submit" class="btn btn--primary">Subscribe</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</div>

<?php get_footer(); ?>