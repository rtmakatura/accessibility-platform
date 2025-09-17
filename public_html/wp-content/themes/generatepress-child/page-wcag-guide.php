<?php
/**
 * Template Name: WCAG Compliance Guide
 * Description: WCAG 2.1 comprehensive compliance guide resource page
 */

get_header(); ?>

<div class="accessibility-platform">
    
    <!-- Page Header -->
    <section class="resource-header">
        <div class="container">
            <h1 class="page-title">WCAG 2.1 Compliance Guide</h1>
            <p class="page-subtitle">Your comprehensive guide to understanding and implementing Web Content Accessibility Guidelines</p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item"><a href="<?php echo home_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo home_url('/resources/'); ?>">Resources</a></li>
                <li class="breadcrumb-item active" aria-current="page">WCAG Compliance Guide</li>
            </ol>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="resource-content">
        <div class="container">
            <div class="content-layout">
                
                <!-- Table of Contents -->
                <aside class="toc-sidebar" aria-labelledby="toc-title">
                    <nav class="toc-nav sticky">
                        <h2 id="toc-title" class="toc-title">Table of Contents</h2>
                        <ul class="toc-list">
                            <li><a href="#introduction">Introduction to WCAG 2.1</a></li>
                            <li><a href="#principles">Four Principles of Accessibility</a></li>
                            <li><a href="#levels">Conformance Levels</a></li>
                            <li><a href="#guidelines">Guidelines Overview</a></li>
                            <li><a href="#implementation">Implementation Strategies</a></li>
                            <li><a href="#testing">Testing Methodologies</a></li>
                            <li><a href="#common-issues">Common Issues & Solutions</a></li>
                            <li><a href="#resources">Additional Resources</a></li>
                        </ul>
                    </nav>
                </aside>

                <!-- Content Area -->
                <div class="content-main">
                    
                    <!-- Introduction Section -->
                    <section id="introduction" class="content-section">
                        <h2>Introduction to WCAG 2.1</h2>
                        <p>The Web Content Accessibility Guidelines (WCAG) 2.1 are internationally recognized standards developed by the World Wide Web Consortium (W3C) to make web content more accessible to people with disabilities.</p>
                        <p>This guide provides practical guidance on implementing WCAG 2.1 Level AA standards, which are widely accepted as the benchmark for digital accessibility compliance.</p>
                        
                        <div class="info-box">
                            <h3>Why WCAG 2.1 Matters</h3>
                            <ul>
                                <li>Legal compliance with ADA, Section 508, and international laws</li>
                                <li>Expanded market reach to users with disabilities</li>
                                <li>Improved user experience for all users</li>
                                <li>Better SEO and technical performance</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Four Principles -->
                    <section id="principles" class="content-section">
                        <h2>Four Principles of Accessibility</h2>
                        <p>WCAG 2.1 is organized around four fundamental principles that provide the foundation for web accessibility:</p>
                        
                        <div class="principles-grid">
                            <div class="principle-card">
                                <h3>1. Perceivable</h3>
                                <p>Information and user interface components must be presentable to users in ways they can perceive.</p>
                                <ul>
                                    <li>Provide text alternatives for non-text content</li>
                                    <li>Provide captions and transcripts for multimedia</li>
                                    <li>Ensure sufficient color contrast</li>
                                    <li>Make text readable and understandable</li>
                                </ul>
                            </div>
                            
                            <div class="principle-card">
                                <h3>2. Operable</h3>
                                <p>User interface components and navigation must be operable by all users.</p>
                                <ul>
                                    <li>Make all functionality keyboard accessible</li>
                                    <li>Give users enough time to read content</li>
                                    <li>Don't use content that causes seizures</li>
                                    <li>Help users navigate and find content</li>
                                </ul>
                            </div>
                            
                            <div class="principle-card">
                                <h3>3. Understandable</h3>
                                <p>Information and operation of the user interface must be understandable.</p>
                                <ul>
                                    <li>Make text readable and understandable</li>
                                    <li>Make pages appear and operate predictably</li>
                                    <li>Help users avoid and correct mistakes</li>
                                    <li>Provide clear instructions and feedback</li>
                                </ul>
                            </div>
                            
                            <div class="principle-card">
                                <h3>4. Robust</h3>
                                <p>Content must be robust enough to be interpreted by a wide variety of user agents, including assistive technologies.</p>
                                <ul>
                                    <li>Use valid, well-structured HTML</li>
                                    <li>Ensure compatibility with assistive technologies</li>
                                    <li>Provide name, role, and value for UI components</li>
                                    <li>Ensure content remains accessible as technologies advance</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <!-- Conformance Levels -->
                    <section id="levels" class="content-section">
                        <h2>Conformance Levels</h2>
                        <p>WCAG 2.1 defines three levels of conformance:</p>
                        
                        <table class="data-table" role="table">
                            <caption>WCAG 2.1 Conformance Levels Comparison</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Level</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Requirements</th>
                                    <th scope="col">Recommendation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Level A</th>
                                    <td>Minimum level of accessibility</td>
                                    <td>30 success criteria</td>
                                    <td>Essential but insufficient for compliance</td>
                                </tr>
                                <tr>
                                    <th scope="row">Level AA</th>
                                    <td>Standard level of accessibility</td>
                                    <td>50 success criteria (includes all Level A)</td>
                                    <td>Recommended target for most organizations</td>
                                </tr>
                                <tr>
                                    <th scope="row">Level AAA</th>
                                    <td>Enhanced level of accessibility</td>
                                    <td>78 success criteria (includes all Level A and AA)</td>
                                    <td>Not required for entire sites, suitable for specialized content</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <!-- Download Section -->
                    <section class="download-section">
                        <div class="download-card">
                            <h2>Download Complete Guide</h2>
                            <p>Get the full WCAG 2.1 Compliance Guide as a PDF for offline reference and team sharing.</p>
                            <div class="download-features">
                                <ul>
                                    <li>✓ All 78 success criteria explained</li>
                                    <li>✓ Implementation code examples</li>
                                    <li>✓ Testing checklists</li>
                                    <li>✓ Remediation strategies</li>
                                </ul>
                            </div>
                            <button class="btn btn--primary btn--large" onclick="alert('Download functionality would be implemented here')">
                                Download PDF Guide (2.3 MB)
                            </button>
                        </div>
                    </section>

                    <!-- CTA Section -->
                    <section class="resource-cta">
                        <h2>Need Help with WCAG Compliance?</h2>
                        <p>Our accessibility experts can help you achieve and maintain WCAG 2.1 Level AA compliance.</p>
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