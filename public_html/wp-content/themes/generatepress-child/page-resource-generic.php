<?php
/**
 * Template Name: Generic Resource Page
 * Description: Generic template for resource pages - can be used for Testing Toolkit, Template Library, and Legal Compliance
 */

get_header(); 

// Get the current page data
$page_id = get_the_ID();
$page_title = get_the_title();
$page_slug = get_post_field('post_name', $page_id);

// Define resource-specific content based on page slug
$resource_data = array(
    'testing-toolkit' => array(
        'subtitle' => 'Curated collection of accessibility testing tools and resources',
        'sections' => array(
            'automated-tools' => 'Automated Testing Tools',
            'browser-extensions' => 'Browser Extensions',
            'screen-readers' => 'Screen Reader Tools',
            'manual-testing' => 'Manual Testing Resources'
        )
    ),
    'template-library' => array(
        'subtitle' => 'Ready-to-use templates for accessibility documentation and policies',
        'sections' => array(
            'policy-templates' => 'Policy Templates',
            'statement-templates' => 'Accessibility Statements',
            'report-templates' => 'Report Templates',
            'training-materials' => 'Training Materials'
        )
    ),
    'legal-compliance' => array(
        'subtitle' => 'Understanding accessibility laws and regulations worldwide',
        'sections' => array(
            'us-regulations' => 'US Regulations',
            'international-laws' => 'International Laws',
            'industry-standards' => 'Industry Standards',
            'case-studies' => 'Legal Case Studies'
        )
    )
);

// Get the appropriate data or use defaults
$current_resource = isset($resource_data[$page_slug]) ? $resource_data[$page_slug] : array(
    'subtitle' => 'Comprehensive resource for digital accessibility',
    'sections' => array()
);
?>

<div class="accessibility-platform">
    
    <!-- Page Header -->
    <section class="resource-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
            <p class="page-subtitle"><?php echo esc_html($current_resource['subtitle']); ?></p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item"><a href="<?php echo home_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo home_url('/resources/'); ?>">Resources</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html($page_title); ?></li>
            </ol>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="resource-content">
        <div class="container">
            <div class="content-layout">
                
                <!-- Content Area -->
                <div class="content-full">
                    
                    <?php if ($page_slug === 'testing-toolkit'): ?>
                    <!-- Testing Toolkit Content -->
                    <section class="resource-intro">
                        <h2>Essential Accessibility Testing Tools</h2>
                        <p>Effective accessibility testing requires a combination of automated tools, manual testing, and user testing with assistive technologies. This toolkit provides you with the best resources for each testing approach.</p>
                    </section>

                    <section class="tools-grid">
                        <h3>Automated Testing Tools</h3>
                        <div class="tools-list">
                            <article class="tool-card">
                                <h4>axe DevTools</h4>
                                <p>Professional-grade accessibility testing tool integrated into Chrome and Firefox DevTools.</p>
                                <ul class="tool-features">
                                    <li>Catches 57% of WCAG issues automatically</li>
                                    <li>Intelligent guided testing</li>
                                    <li>Detailed remediation guidance</li>
                                </ul>
                                <a href="https://www.deque.com/axe/devtools/" class="tool-link" target="_blank" rel="noopener">Learn More →</a>
                            </article>
                            
                            <article class="tool-card">
                                <h4>WAVE (WebAIM)</h4>
                                <p>Web Accessibility Evaluation Tool providing visual feedback about accessibility issues.</p>
                                <ul class="tool-features">
                                    <li>Visual indicators on page</li>
                                    <li>Detailed reports</li>
                                    <li>API for automated testing</li>
                                </ul>
                                <a href="https://wave.webaim.org/" class="tool-link" target="_blank" rel="noopener">Learn More →</a>
                            </article>
                            
                            <article class="tool-card">
                                <h4>Pa11y</h4>
                                <p>Command line accessibility testing tool for automated testing in CI/CD pipelines.</p>
                                <ul class="tool-features">
                                    <li>Command line interface</li>
                                    <li>CI/CD integration</li>
                                    <li>Customizable rules</li>
                                </ul>
                                <a href="https://pa11y.org/" class="tool-link" target="_blank" rel="noopener">Learn More →</a>
                            </article>
                        </div>
                    </section>

                    <section class="tools-grid">
                        <h3>Browser Extensions</h3>
                        <div class="tools-list">
                            <article class="tool-card">
                                <h4>Accessibility Insights</h4>
                                <p>Microsoft's extension for accessibility testing with guided assessments.</p>
                                <a href="#" class="tool-link">Install Extension →</a>
                            </article>
                            
                            <article class="tool-card">
                                <h4>Landmark Navigation</h4>
                                <p>Navigate and test ARIA landmarks and page structure.</p>
                                <a href="#" class="tool-link">Install Extension →</a>
                            </article>
                        </div>
                    </section>

                    <?php elseif ($page_slug === 'template-library'): ?>
                    <!-- Template Library Content -->
                    <section class="resource-intro">
                        <h2>Accessibility Documentation Templates</h2>
                        <p>Save time and ensure compliance with our professionally crafted templates for accessibility documentation, policies, and statements.</p>
                    </section>

                    <section class="template-grid">
                        <h3>Available Templates</h3>
                        <div class="template-list">
                            <article class="template-card">
                                <h4>Accessibility Statement Template</h4>
                                <p>Comprehensive template for creating your website's accessibility statement, including commitment, standards, and contact information.</p>
                                <div class="template-meta">
                                    <span class="template-format">Word Document</span>
                                    <span class="template-pages">5 pages</span>
                                </div>
                                <button class="btn btn--secondary" onclick="alert('Download would be implemented here')">Download Template</button>
                            </article>
                            
                            <article class="template-card">
                                <h4>Accessibility Policy Template</h4>
                                <p>Organization-wide accessibility policy template covering digital properties, procurement, and training requirements.</p>
                                <div class="template-meta">
                                    <span class="template-format">Word Document</span>
                                    <span class="template-pages">8 pages</span>
                                </div>
                                <button class="btn btn--secondary" onclick="alert('Download would be implemented here')">Download Template</button>
                            </article>
                            
                            <article class="template-card">
                                <h4>Audit Report Template</h4>
                                <p>Professional accessibility audit report template with executive summary, detailed findings, and remediation roadmap sections.</p>
                                <div class="template-meta">
                                    <span class="template-format">Word Document</span>
                                    <span class="template-pages">12 pages</span>
                                </div>
                                <button class="btn btn--secondary" onclick="alert('Download would be implemented here')">Download Template</button>
                            </article>
                            
                            <article class="template-card">
                                <h4>VPAT Template</h4>
                                <p>Voluntary Product Accessibility Template (VPAT) for documenting product accessibility conformance.</p>
                                <div class="template-meta">
                                    <span class="template-format">Excel Spreadsheet</span>
                                    <span class="template-pages">Multiple sheets</span>
                                </div>
                                <button class="btn btn--secondary" onclick="alert('Download would be implemented here')">Download Template</button>
                            </article>
                        </div>
                    </section>

                    <?php elseif ($page_slug === 'legal-compliance'): ?>
                    <!-- Legal Compliance Content -->
                    <section class="resource-intro">
                        <h2>Accessibility Legal Requirements</h2>
                        <p>Understanding your legal obligations for digital accessibility is crucial for compliance and risk mitigation. This resource covers key regulations and requirements worldwide.</p>
                    </section>

                    <section class="legal-content">
                        <h3>United States Regulations</h3>
                        <div class="legal-section">
                            <h4>Americans with Disabilities Act (ADA) Title III</h4>
                            <p>The ADA prohibits discrimination based on disability in places of public accommodation. Courts have increasingly ruled that websites are places of public accommodation.</p>
                            <ul class="legal-points">
                                <li>Applies to businesses open to the public</li>
                                <li>No specific technical standards defined</li>
                                <li>Courts often reference WCAG 2.1 Level AA</li>
                                <li>Penalties can include injunctive relief and attorney fees</li>
                            </ul>
                        </div>
                        
                        <div class="legal-section">
                            <h4>Section 508</h4>
                            <p>Requires federal agencies to make electronic and information technology accessible to people with disabilities.</p>
                            <ul class="legal-points">
                                <li>Applies to federal agencies</li>
                                <li>Updated in 2018 to align with WCAG 2.0 Level AA</li>
                                <li>Includes procurement requirements</li>
                            </ul>
                        </div>
                    </section>

                    <section class="legal-content">
                        <h3>International Regulations</h3>
                        <div class="legal-section">
                            <h4>European Accessibility Act (EAA)</h4>
                            <p>Requires accessibility for products and services in the EU market by 2025.</p>
                            <ul class="legal-points">
                                <li>Covers e-commerce, banking, transportation</li>
                                <li>Based on EN 301 549 standard</li>
                                <li>Enforcement begins June 2025</li>
                            </ul>
                        </div>
                        
                        <div class="legal-section">
                            <h4>Web Accessibility Directive (EU)</h4>
                            <p>Requires public sector websites and mobile apps to be accessible.</p>
                            <ul class="legal-points">
                                <li>WCAG 2.1 Level AA compliance required</li>
                                <li>Accessibility statements mandatory</li>
                                <li>Regular monitoring and reporting</li>
                            </ul>
                        </div>
                    </section>

                    <?php else: ?>
                    <!-- Default Content for Custom Pages -->
                    <section class="resource-intro">
                        <?php
                        // Display WordPress page content if available
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                        else :
                        ?>
                        <h2>Welcome to <?php echo esc_html($page_title); ?></h2>
                        <p>This resource is currently being developed. Please check back soon for comprehensive information and tools.</p>
                        <?php endif; ?>
                    </section>
                    <?php endif; ?>

                    <!-- Common CTA Section -->
                    <section class="resource-cta">
                        <h2>Need Professional Assistance?</h2>
                        <p>Our accessibility experts can help you implement these resources effectively in your organization.</p>
                        <div class="cta-buttons">
                            <a href="<?php echo home_url('/accessibility-auditing/'); ?>" class="btn btn--primary">Get Accessibility Audit</a>
                            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--secondary">Schedule Consultation</a>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>