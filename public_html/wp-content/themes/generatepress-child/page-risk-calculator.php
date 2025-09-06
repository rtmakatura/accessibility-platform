<?php
/**
 * Template Name: Risk Calculator
 * Description: Accessibility Risk Calculator page template
 */

get_header(); ?>

<div class="accessibility-platform">
    
    <!-- Page Header -->
    <section class="risk-calculator-header">
        <div class="container">
            <h1 class="page-title">Accessibility Risk Calculator</h1>
            <p class="page-subtitle">Calculate your organization's expected annual accessibility risk based on industry, size, digital footprint, and compliance status</p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <a href="<?php echo home_url('/'); ?>" class="breadcrumb-link">← Back to Home</a>
        </div>
    </nav>

    <!-- Calculator Form -->
    <main class="risk-calculator-main">
        <div class="container">
            <div class="calculator-wrapper">
                
                <!-- Jurisdictions Selection -->
                <div class="form-section">
                    <div class="section-header">
                        <h2 class="section-title">Jurisdictions (Select all that apply)</h2>
                    </div>
                    <div class="jurisdiction-grid" id="jurisdictions">
                        <label class="jurisdiction-option">
                            <input type="checkbox" name="jurisdictions" value="US" checked aria-describedby="us-desc">
                            <span class="checkbox-label">United States</span>
                            <small id="us-desc" class="checkbox-desc">ADA Title III compliance</small>
                        </label>
                        <label class="jurisdiction-option">
                            <input type="checkbox" name="jurisdictions" value="EU" aria-describedby="eu-desc">
                            <span class="checkbox-label">European Union</span>
                            <small id="eu-desc" class="checkbox-desc">Web Accessibility Directive</small>
                        </label>
                        <label class="jurisdiction-option">
                            <input type="checkbox" name="jurisdictions" value="UK" aria-describedby="uk-desc">
                            <span class="checkbox-label">United Kingdom</span>
                            <small id="uk-desc" class="checkbox-desc">Equality Act 2010</small>
                        </label>
                        <label class="jurisdiction-option">
                            <input type="checkbox" name="jurisdictions" value="CA" aria-describedby="ca-desc">
                            <span class="checkbox-label">Canada</span>
                            <small id="ca-desc" class="checkbox-desc">Accessible Canada Act</small>
                        </label>
                    </div>
                </div>

                <!-- Form Grid -->
                <div class="form-grid">
                    
                    <!-- Industry Sector -->
                    <div class="form-section">
                        <label for="industry" class="form-label">Industry Sector</label>
                        <select id="industry" name="industry" class="form-select" required>
                            <option value="retail">Retail</option>
                            <option value="hospitality">Hospitality</option>
                            <option value="finance">Finance</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="education">Education</option>
                            <option value="government">Government</option>
                            <option value="software">Software/Technology</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Organization Size -->
                    <div class="form-section">
                        <label for="employee_size" class="form-label">Organization Size</label>
                        <select id="employee_size" name="employee_size" class="form-select" required>
                            <option value="1-49">1-49 employees</option>
                            <option value="50-249">50-249 employees</option>
                            <option value="250-999" selected>250-999 employees</option>
                            <option value="1000+">1000+ employees</option>
                        </select>
                    </div>

                </div>

                <!-- Annual Revenue -->
                <div class="form-section">
                    <label for="annual_revenue" class="form-label">Annual Revenue (USD)</label>
                    <input type="number" id="annual_revenue" name="annual_revenue" value="50000000" 
                           class="form-input" placeholder="e.g., 50000000" required>
                    <small class="form-help">Enter your organization's approximate annual revenue in USD</small>
                </div>

                <!-- Digital Footprint Grid -->
                <div class="form-grid form-grid-3">
                    
                    <!-- Website Pages -->
                    <div class="form-section">
                        <label for="website_pages" class="form-label">Website Pages</label>
                        <select id="website_pages" name="website_pages" class="form-select" required>
                            <option value="1-50">1-50 pages</option>
                            <option value="51-250">51-250 pages</option>
                            <option value="251-1k">251-1,000 pages</option>
                            <option value="1k-10k" selected>1,000-10,000 pages</option>
                            <option value="10k+">10,000+ pages</option>
                        </select>
                    </div>

                    <!-- PDF Volume -->
                    <div class="form-section">
                        <label for="pdf_volume" class="form-label">PDF Volume</label>
                        <select id="pdf_volume" name="pdf_volume" class="form-select" required>
                            <option value="low">Low (1-50 documents)</option>
                            <option value="medium">Medium (51-500 documents)</option>
                            <option value="high" selected>High (500+ documents)</option>
                        </select>
                    </div>

                    <!-- Third Party Integrations -->
                    <div class="form-section">
                        <label for="third_party_integrations" class="form-label">Third-Party Integrations</label>
                        <select id="third_party_integrations" name="third_party_integrations" class="form-select" required>
                            <option value="minimal">Minimal</option>
                            <option value="moderate">Moderate</option>
                            <option value="extensive" selected>Extensive</option>
                        </select>
                    </div>

                </div>

                <!-- Organization Details Grid -->
                <div class="form-grid">
                    
                    <!-- Compliance Maturity -->
                    <div class="form-section">
                        <label for="compliance_maturity" class="form-label">Compliance Maturity</label>
                        <select id="compliance_maturity" name="compliance_maturity" class="form-select" required>
                            <option value="none">None</option>
                            <option value="basic" selected>Basic</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>

                    <!-- Market Exposure -->
                    <div class="form-section">
                        <label for="market_exposure" class="form-label">Market Exposure</label>
                        <select id="market_exposure" name="market_exposure" class="form-select" required>
                            <option value="local">Local</option>
                            <option value="national" selected>National</option>
                            <option value="international">International</option>
                        </select>
                    </div>

                </div>

                <!-- Prior Incident -->
                <div class="form-section">
                    <fieldset>
                        <legend class="form-label">Prior Accessibility Incidents</legend>
                        <div class="radio-grid" role="radiogroup">
                            <label class="radio-option">
                                <input type="radio" name="prior_incident" value="none" checked>
                                <span class="radio-label">None</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="prior_incident" value="demand_letter">
                                <span class="radio-label">Demand Letter</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="prior_incident" value="settled">
                                <span class="radio-label">Settled Case</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="prior_incident" value="government_action">
                                <span class="radio-label">Government Action</span>
                            </label>
                        </div>
                    </fieldset>
                </div>

            </div>
        </div>
    </main>

    <!-- Results Display (hidden initially) -->
    <section id="risk-results" class="risk-results" style="display: none;" aria-live="polite">
        <div class="container">
            
            <!-- Main EAL Display -->
            <div class="result-card result-primary">
                <div class="eal-amount" id="eal-display">$0</div>
                <div class="eal-label">Expected Annual Loss (EAL)</div>
                <div class="risk-tier" id="risk-tier-display">Low Risk</div>
            </div>

            <!-- Jurisdiction Breakdown -->
            <div class="result-card">
                <h3 class="result-title">Risk by Jurisdiction</h3>
                <div id="jurisdiction-breakdown" class="jurisdiction-breakdown"></div>
            </div>

            <!-- Cost Composition -->
            <div class="result-card">
                <h3 class="result-title">Expected Cost Composition</h3>
                <div id="cost-composition" class="cost-breakdown"></div>
            </div>

            <!-- Prevention vs Risk Analysis -->
            <div class="result-grid">
                <div class="result-card result-prevention">
                    <div class="result-label">Prevention Cost</div>
                    <div class="result-value" id="prevention-cost">$0</div>
                    <div class="result-desc">Comprehensive audit + remediation</div>
                </div>
                <div class="result-card result-roi">
                    <div class="result-label">ROI Analysis</div>
                    <div class="result-value" id="roi-display">0%</div>
                    <div class="result-desc">Return on investment</div>
                    <div class="result-meta" id="payback-display">Payback in 0 months</div>
                </div>
            </div>

            <!-- Savings Summary -->
            <div class="result-card result-savings">
                <div class="savings-title">Expected Annual Savings: <span id="savings-display">$0</span></div>
                <p>Proactive compliance prevents costly litigation and demonstrates reasonable accommodation efforts</p>
            </div>

            <!-- Risk Factors -->
            <div class="result-card">
                <h3 class="result-title">Key Risk Factors</h3>
                <div id="risk-factors" class="risk-factors"></div>
            </div>

            <!-- Call-to-Action -->
            <div class="result-card result-cta">
                <h3>Take Action to Mitigate Risk</h3>
                <p>Get a comprehensive accessibility audit to identify specific vulnerabilities and create a strategic remediation plan</p>
                <div class="cta-buttons">
                    <button type="button" class="btn btn-primary" onclick="openAuditForm()">Get Audit Quote</button>
                    <button type="button" class="btn btn-secondary" onclick="downloadReport()">Download Detailed Report</button>
                </div>
            </div>

        </div>
    </section>

    <!-- Data Sources & Methodology Section -->
    <section class="methodology-section" style="display: none;">
        <div class="container">
            <div class="methodology-content">
                <div class="methodology-header">
                    <h3>Data Sources & Methodology</h3>
                    <div class="methodology-meta">
                        Version: 2025-09-03-rc1 | Data last updated: Sept 1, 2025
                    </div>
                </div>
                
                <div class="methodology-grid">
                    <div class="methodology-item">
                        <h4>Legal Frameworks</h4>
                        <p><strong>US:</strong> ADA Title III, DOJ Civil Penalties (28 CFR §36.504), Section 508 • 
                           <strong>EU:</strong> Web Accessibility Directive 2016/2102, European Accessibility Act 2019/882 • 
                           <strong>UK:</strong> Equality Act 2010, PSBAR 2018 • 
                           <strong>Canada:</strong> Accessible Canada Act, AODA</p>
                    </div>
                    
                    <div class="methodology-item">
                        <h4>Primary Data Sources</h4>
                        <p><strong>Litigation Data:</strong> UsableNet ADA Web Lawsuit Report 2023-2024, Seyfarth Shaw ADA Title III Litigation Report • 
                           <strong>Cost Benchmarks:</strong> IAAP remediation cost surveys, WebAIM accessibility project budgets • 
                           <strong>Regulatory:</strong> Published statutory penalty maximums by jurisdiction</p>
                    </div>

                    <div class="methodology-disclaimer">
                        <h4>⚠️ Important Disclaimers</h4>
                        <ul>
                            <li>Estimates are for educational and planning purposes only</li>
                            <li>Not intended as legal advice or guarantee of outcomes</li>
                            <li>Individual circumstances may vary significantly from modeled scenarios</li>
                            <li>Consult qualified legal counsel for specific compliance guidance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>