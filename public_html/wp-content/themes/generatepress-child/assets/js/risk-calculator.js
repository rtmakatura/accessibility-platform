/**
 * Risk Calculator JavaScript
 * Vanilla JavaScript implementation for WordPress integration
 * Converted from React component to maintain functionality
 */

(function() {
    'use strict';

    // Risk calculation constants
    const RISK_CONSTANTS = {
        version: "2025-09-03-rc1",
        jurisdiction_defaults: {
            US: {
                P_incident_base: 0.06,
                Cost_settlement_med: 15000,
                Cost_legal_med: 8000,
                Cost_remediation_med: 25000,
                P_reg_fine: 0.01,
                Expected_fine: 75000
            },
            EU: {
                P_incident_base: 0.02,
                Cost_settlement_med: 20000,
                Cost_legal_med: 12000,
                Cost_remediation_med: 30000,
                P_reg_fine: 0.03,
                Expected_fine: 80000
            },
            UK: {
                P_incident_base: 0.025,
                Cost_settlement_med: 25000,
                Cost_legal_med: 15000,
                Cost_remediation_med: 25000,
                P_reg_fine: 0.015,
                Expected_fine: 45000
            },
            CA: {
                P_incident_base: 0.03,
                Cost_settlement_med: 15000,
                Cost_legal_med: 10000,
                Cost_remediation_med: 25000,
                P_reg_fine: 0.02,
                Expected_fine: 100000
            }
        },
        industry_mult: {
            retail: 1.6,
            hospitality: 1.4,
            finance: 1.5,
            healthcare: 1.5,
            education: 1.4,
            government: 1.3,
            software: 1.3,
            other: 1.0
        },
        size_cost_mult: {
            '1-49': 0.8,
            '50-249': 1.0,
            '250-999': 1.2,
            '1000+': 1.4
        },
        pages_mult: {
            '1-50': 0.8,
            '51-250': 1.0,
            '251-1k': 1.2,
            '1k-10k': 1.4,
            '10k+': 1.6
        },
        pdf_mult: {
            low: 0.9,
            medium: 1.0,
            high: 1.2
        },
        third_party_mult: {
            minimal: 0.9,
            moderate: 1.0,
            extensive: 1.2
        },
        market_mult: {
            local: 0.8,
            national: 1.0,
            international: 1.3
        },
        compliance_mult: {
            none: 1.0,
            basic: 0.7,
            intermediate: 0.5,
            advanced: 0.3
        },
        compliance_floor: {
            none: 0.03,
            basic: 0.025,
            intermediate: 0.02,
            advanced: 0.015
        },
        prior_incident_mult: {
            none: 1.0,
            demand_letter: 1.2,
            settled: 1.4,
            government_action: 1.6
        },
        revenue_cost_mult: function(revenue) {
            if (revenue <= 5000000) return 0.8;
            if (revenue <= 25000000) return 1.0;
            if (revenue <= 100000000) return 1.2;
            if (revenue <= 500000000) return 1.35;
            if (revenue <= 2000000000) return 1.5;
            return 1.7;
        },
        prevention: {
            rev_pct: 0.0002,
            pages_bases: [0.5, 1.0, 1.5, 2.0, 2.5],
            pdf_bases: [0.5, 1.0, 1.5]
        },
        risk_tiers: {
            absolute: { low: 15000, high: 75000 },
            relative: { low: 0.0003, high: 0.0012 }
        },
        caps: { P_incident_max: 0.35, P_fine_max: 0.20 }
    };

    // Calculator state
    let calculatorInputs = {
        jurisdictions: ['US'],
        industry: 'retail',
        employee_size: '250-999',
        annual_revenue_usd: 50000000,
        website_pages: '1k-10k',
        pdf_volume: 'high',
        compliance_maturity: 'basic',
        prior_incident: 'none',
        third_party_integrations: 'extensive',
        market_exposure: 'national',
        year_horizon: 1
    };

    let calculatedRisk = null;

    // DOM References
    let formElements = {};
    let resultElements = {};

    // Initialize calculator when DOM is ready
    function init() {
        cacheFormElements();
        cacheResultElements();
        attachEventListeners();
        updateCalculation();
    }

    // Cache form element references
    function cacheFormElements() {
        formElements = {
            jurisdictions: document.querySelectorAll('input[name="jurisdictions"]'),
            industry: document.getElementById('industry'),
            employee_size: document.getElementById('employee_size'),
            annual_revenue: document.getElementById('annual_revenue'),
            website_pages: document.getElementById('website_pages'),
            pdf_volume: document.getElementById('pdf_volume'),
            third_party_integrations: document.getElementById('third_party_integrations'),
            compliance_maturity: document.getElementById('compliance_maturity'),
            market_exposure: document.getElementById('market_exposure'),
            prior_incident: document.querySelectorAll('input[name="prior_incident"]')
        };
    }

    // Cache result element references
    function cacheResultElements() {
        resultElements = {
            container: document.getElementById('risk-results'),
            ealDisplay: document.getElementById('eal-display'),
            riskTier: document.getElementById('risk-tier-display'),
            jurisdictionBreakdown: document.getElementById('jurisdiction-breakdown'),
            costComposition: document.getElementById('cost-composition'),
            preventionCost: document.getElementById('prevention-cost'),
            roiDisplay: document.getElementById('roi-display'),
            paybackDisplay: document.getElementById('payback-display'),
            savingsDisplay: document.getElementById('savings-display'),
            riskFactors: document.getElementById('risk-factors'),
            methodology: document.querySelector('.methodology-section')
        };
    }

    // Attach event listeners to form elements
    function attachEventListeners() {
        // Jurisdiction checkboxes
        formElements.jurisdictions.forEach(checkbox => {
            checkbox.addEventListener('change', handleJurisdictionChange);
        });

        // Select elements
        ['industry', 'employee_size', 'website_pages', 'pdf_volume', 
         'third_party_integrations', 'compliance_maturity', 'market_exposure'].forEach(id => {
            if (formElements[id]) {
                formElements[id].addEventListener('change', handleFormChange);
            }
        });

        // Revenue input
        if (formElements.annual_revenue) {
            formElements.annual_revenue.addEventListener('input', debounce(handleFormChange, 500));
        }

        // Prior incident radio buttons
        formElements.prior_incident.forEach(radio => {
            radio.addEventListener('change', handleFormChange);
        });
    }

    // Handle jurisdiction checkbox changes
    function handleJurisdictionChange() {
        const selectedJurisdictions = Array.from(formElements.jurisdictions)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        
        // Ensure at least one jurisdiction is selected
        if (selectedJurisdictions.length === 0) {
            formElements.jurisdictions[0].checked = true;
            selectedJurisdictions.push('US');
        }
        
        calculatorInputs.jurisdictions = selectedJurisdictions;
        updateCalculation();
    }

    // Handle form input changes
    function handleFormChange(event) {
        const { name, value, type } = event.target;
        
        if (type === 'number') {
            calculatorInputs[name] = parseInt(value) || 0;
        } else if (name === 'prior_incident') {
            calculatorInputs.prior_incident = value;
        } else {
            calculatorInputs[name.replace('-', '_')] = value;
        }
        
        updateCalculation();
    }

    // Update calculation and display results
    function updateCalculation() {
        calculatedRisk = calculateRisk(calculatorInputs, RISK_CONSTANTS);
        displayResults();
    }

    // Main risk calculation function
    function calculateRisk(inputs, constants) {
        const {
            jurisdictions, industry, employee_size, annual_revenue_usd,
            website_pages, pdf_volume, compliance_maturity, prior_incident,
            third_party_integrations, market_exposure
        } = inputs;

        const results = {
            EAL_total: 0,
            jurisdiction_breakdown: {},
            prevention_cost: 0,
            expected_savings: 0,
            roi: 0,
            payback_months: 0,
            risk_tier: 'Low',
            cost_composition: { settlement: 0, legal: 0, remediation: 0, fines: 0 }
        };

        // Get multipliers
        const industry_mult = constants.industry_mult[industry] || 1.0;
        const size_cost_mult = constants.size_cost_mult[employee_size] || 1.0;
        const pages_mult = constants.pages_mult[website_pages] || 1.0;
        const pdf_mult = constants.pdf_mult[pdf_volume] || 1.0;
        const third_party_mult = constants.third_party_mult[third_party_integrations] || 1.0;
        const market_mult = constants.market_mult[market_exposure] || 1.0;
        const compliance_mult = constants.compliance_mult[compliance_maturity] || 1.0;
        const compliance_floor = constants.compliance_floor[compliance_maturity] || 0.03;
        const prior_incident_mult = constants.prior_incident_mult[prior_incident] || 1.0;
        const revenue_cost_mult = constants.revenue_cost_mult(annual_revenue_usd);

        // Calculate for each jurisdiction
        jurisdictions.forEach(jurisdiction => {
            const jData = constants.jurisdiction_defaults[jurisdiction];
            if (!jData) return;

            // Calculate probability
            let Pj = jData.P_incident_base;
            Pj *= industry_mult;
            Pj *= pages_mult * pdf_mult * third_party_mult * market_mult;
            Pj *= prior_incident_mult;
            Pj *= compliance_mult;
            Pj = Math.max(Pj, compliance_floor);
            Pj = Math.min(Pj, constants.caps.P_incident_max);

            // Calculate costs
            const Cj_base = jData.Cost_settlement_med + jData.Cost_legal_med + jData.Cost_remediation_med;
            const Cj = Cj_base * size_cost_mult * revenue_cost_mult * industry_mult;

            // Calculate regulatory fines
            const Fj = jData.Expected_fine * size_cost_mult * revenue_cost_mult * industry_mult;
            let Pr_fine_j = jData.P_reg_fine * compliance_mult;
            Pr_fine_j = Math.min(Pr_fine_j, constants.caps.P_fine_max);

            // EU EAA timeline logic
            if (jurisdiction === 'EU') {
                const currentDate = new Date();
                const eaaEffective = new Date('2025-06-28');
                if (currentDate >= eaaEffective) {
                    Pr_fine_j = 0.06 * compliance_mult;
                    Pr_fine_j = Math.min(Pr_fine_j, constants.caps.P_fine_max);
                }
            }

            // Calculate EAL for this jurisdiction
            const EAL_j = Pj * Cj + Pr_fine_j * Fj;
            results.EAL_total += EAL_j;

            // Store breakdown
            results.jurisdiction_breakdown[jurisdiction] = {
                P_incident: Pj,
                C_avg: Cj,
                P_fine: Pr_fine_j,
                expected_fine: Fj,
                EAL: EAL_j,
                settlement_cost: jData.Cost_settlement_med * size_cost_mult * revenue_cost_mult * industry_mult,
                legal_cost: jData.Cost_legal_med * size_cost_mult * revenue_cost_mult * industry_mult,
                remediation_cost: jData.Cost_remediation_med * size_cost_mult * revenue_cost_mult * industry_mult
            };

            // Add to cost composition
            results.cost_composition.settlement += (Pj * jData.Cost_settlement_med * size_cost_mult * revenue_cost_mult * industry_mult);
            results.cost_composition.legal += (Pj * jData.Cost_legal_med * size_cost_mult * revenue_cost_mult * industry_mult);
            results.cost_composition.remediation += (Pj * jData.Cost_remediation_med * size_cost_mult * revenue_cost_mult * industry_mult);
            results.cost_composition.fines += (Pr_fine_j * Fj);
        });

        // Calculate prevention cost
        const revenue_based = annual_revenue_usd * constants.prevention.rev_pct;
        const pages_idx = ['1-50', '51-250', '251-1k', '1k-10k', '10k+'].indexOf(website_pages);
        const pdf_idx = ['low', 'medium', 'high'].indexOf(pdf_volume);
        const pages_base = constants.prevention.pages_bases[pages_idx] || 1.0;
        const pdf_base = constants.prevention.pdf_bases[pdf_idx] || 1.0;
        const footprint_based = pages_base * 6000 + pdf_base * 3000;
        
        const risk_responsive = Math.min(results.EAL_total * 0.6, Math.max(revenue_based, footprint_based));
        const dynamic_minimum = annual_revenue_usd <= 5000000 ? 3000 : 
                               annual_revenue_usd <= 25000000 ? 5000 : 8000;
        results.prevention_cost = Math.max(risk_responsive, dynamic_minimum);
        results.expected_savings = results.EAL_total * 0.85;
        
        if (results.prevention_cost > 0) {
            results.roi = (results.expected_savings - results.prevention_cost) / results.prevention_cost;
            results.payback_months = results.expected_savings > 0 ? 
                (12 * results.prevention_cost / results.expected_savings) : 0;
        }

        // Risk tiering
        const risk_ratio = results.EAL_total / Math.max(annual_revenue_usd, 1);
        
        if (results.EAL_total < constants.risk_tiers.absolute.low) {
            results.risk_tier = 'Low';
        } else if (results.EAL_total > constants.risk_tiers.absolute.high) {
            results.risk_tier = 'High'; 
        } else {
            const relative_tier = risk_ratio < constants.risk_tiers.relative.low ? 'Low' :
                risk_ratio > constants.risk_tiers.relative.high ? 'High' : 'Medium';
            results.risk_tier = relative_tier === 'High' ? 'High' : 'Medium';
        }

        return results;
    }

    // Display results in the DOM
    function displayResults() {
        if (!calculatedRisk || !resultElements.container) return;

        // Show results section
        resultElements.container.style.display = 'block';
        
        // Show methodology section
        if (resultElements.methodology) {
            resultElements.methodology.style.display = 'block';
        }

        // Update EAL display
        if (resultElements.ealDisplay) {
            resultElements.ealDisplay.textContent = `$${Math.round(calculatedRisk.EAL_total).toLocaleString()}`;
        }

        // Update risk tier
        if (resultElements.riskTier) {
            const tier = calculatedRisk.risk_tier.toLowerCase();
            resultElements.riskTier.textContent = `${calculatedRisk.risk_tier} Risk`;
            resultElements.riskTier.className = `risk-tier ${tier}`;
        }

        // Update jurisdiction breakdown
        updateJurisdictionBreakdown();

        // Update cost composition
        updateCostComposition();

        // Update prevention cost and ROI
        if (resultElements.preventionCost) {
            resultElements.preventionCost.textContent = `$${Math.round(calculatedRisk.prevention_cost).toLocaleString()}`;
        }

        if (resultElements.roiDisplay) {
            resultElements.roiDisplay.textContent = `${Math.round(calculatedRisk.roi * 100)}%`;
        }

        if (resultElements.paybackDisplay) {
            resultElements.paybackDisplay.textContent = `Payback in ${Math.round(calculatedRisk.payback_months)} months`;
        }

        if (resultElements.savingsDisplay) {
            resultElements.savingsDisplay.textContent = `$${Math.round(calculatedRisk.expected_savings).toLocaleString()}`;
        }

        // Update risk factors
        updateRiskFactors();

        // Announce to screen readers
        announceToScreenReader(`Risk calculation updated. Expected annual loss: $${Math.round(calculatedRisk.EAL_total).toLocaleString()}. Risk tier: ${calculatedRisk.risk_tier}.`);
    }

    // Update jurisdiction breakdown display
    function updateJurisdictionBreakdown() {
        if (!resultElements.jurisdictionBreakdown) return;

        const html = calculatorInputs.jurisdictions.map(jurisdiction => {
            const jData = calculatedRisk.jurisdiction_breakdown[jurisdiction];
            if (!jData) return '';

            const percentage = ((jData.EAL || 0) / calculatedRisk.EAL_total * 100).toFixed(1);
            
            return `
                <div class="jurisdiction-item" 
                     title="Incident Probability: ${(jData.P_incident * 100).toFixed(1)}% | Average Cost: $${Math.round(jData.C_avg).toLocaleString()} | Fine Probability: ${(jData.P_fine * 100).toFixed(1)}% | Expected Fine: $${Math.round(jData.expected_fine).toLocaleString()}">
                    <div class="jurisdiction-code">${jurisdiction}</div>
                    <div class="jurisdiction-amount">$${Math.round(jData.EAL).toLocaleString()}</div>
                    <div class="jurisdiction-percent">${percentage}% of total risk</div>
                </div>
            `;
        }).join('');

        resultElements.jurisdictionBreakdown.innerHTML = html;
    }

    // Update cost composition display
    function updateCostComposition() {
        if (!resultElements.costComposition) return;

        const composition = calculatedRisk.cost_composition;
        
        const html = `
            <div class="cost-item">
                <div class="cost-item-amount cost-settlement">$${Math.round(composition.settlement).toLocaleString()}</div>
                <div class="cost-item-label">Settlement Costs</div>
            </div>
            <div class="cost-item">
                <div class="cost-item-amount cost-legal">$${Math.round(composition.legal).toLocaleString()}</div>
                <div class="cost-item-label">Legal Defense</div>
            </div>
            <div class="cost-item">
                <div class="cost-item-amount cost-remediation">$${Math.round(composition.remediation).toLocaleString()}</div>
                <div class="cost-item-label">Remediation</div>
            </div>
            <div class="cost-item">
                <div class="cost-item-amount cost-fines">$${Math.round(composition.fines).toLocaleString()}</div>
                <div class="cost-item-label">Regulatory Fines</div>
            </div>
        `;

        resultElements.costComposition.innerHTML = html;
    }

    // Update risk factors display
    function updateRiskFactors() {
        if (!resultElements.riskFactors) return;

        const factors = generateRiskFactors();
        
        const html = factors.map(factor => `
            <div class="risk-factor-item">${factor}</div>
        `).join('');

        resultElements.riskFactors.innerHTML = html;
    }

    // Generate risk factor analysis
    function generateRiskFactors() {
        const factors = [];
        
        // Industry risk factor
        const industryMult = RISK_CONSTANTS.industry_mult[calculatorInputs.industry] || 1.0;
        if (industryMult > 1.2) {
            factors.push(`🏢 **${calculatorInputs.industry.charAt(0).toUpperCase() + calculatorInputs.industry.slice(1)}** industry has elevated accessibility litigation risk (${industryMult}x multiplier)`);
        }
        
        // Organization size factor
        if (calculatorInputs.employee_size === "1000+") {
            factors.push(`👥 **Large organization** (${calculatorInputs.employee_size}) increases litigation targeting and regulatory scrutiny`);
        }
        
        // Revenue scaling
        if (calculatorInputs.annual_revenue_usd > 100000000) {
            factors.push(`💰 **High revenue** ($${(calculatorInputs.annual_revenue_usd/1000000).toFixed(0)}M) scales settlement expectations and damages`);
        }
        
        // Digital footprint
        if (calculatorInputs.website_pages === '1k-10k' || calculatorInputs.website_pages === '10k+' || calculatorInputs.pdf_volume === "high") {
            factors.push(`🌐 **Large digital footprint** (${calculatorInputs.website_pages} pages, ${calculatorInputs.pdf_volume} PDF volume) increases compliance surface area`);
        }
        
        // Compliance maturity
        if (calculatorInputs.compliance_maturity === "basic" || calculatorInputs.compliance_maturity === "none") {
            factors.push(`⚠️ **${calculatorInputs.compliance_maturity.charAt(0).toUpperCase() + calculatorInputs.compliance_maturity.slice(1)} compliance** maturity increases vulnerability to successful claims`);
        }
        
        // Prior incidents
        if (calculatorInputs.prior_incident !== "none") {
            factors.push(`📋 **Previous accessibility incidents** create established litigation patterns and higher targeting probability`);
        }
        
        // Multiple jurisdictions
        if (calculatorInputs.jurisdictions.length > 1) {
            factors.push(`🌍 **Multi-jurisdiction exposure** (${calculatorInputs.jurisdictions.join(", ")}) compounds regulatory and litigation risks`);
        }
        
        // High market exposure
        if (calculatorInputs.market_exposure === "international") {
            factors.push(`📈 **International market exposure** increases visibility to accessibility advocacy groups and plaintiff attorneys`);
        }
        
        // Default messages if no specific risk factors
        if (factors.length === 0) {
            factors.push(`✅ **Moderate risk profile** based on industry standards and organizational characteristics`);
            factors.push(`📊 **Standard compliance** expectations apply for your industry and jurisdiction(s)`);
        }
        
        return factors;
    }

    // Utility function: debounce
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func.apply(this, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Utility function: announce to screen readers
    function announceToScreenReader(message, priority = 'polite') {
        const liveRegion = document.getElementById(
            priority === 'assertive' ? 'live-region-assertive' : 'live-region'
        );
        if (liveRegion) {
            liveRegion.textContent = message;
            setTimeout(() => {
                liveRegion.textContent = '';
            }, 1000);
        }
    }

    // Global functions for button actions
    window.openAuditForm = function() {
        // Implement audit form opening logic
        announceToScreenReader('Opening audit quote form', 'assertive');
        // You can add modal opening or redirect logic here
        console.log('Open audit form requested');
    };

    window.downloadReport = function() {
        // Implement report download logic
        announceToScreenReader('Preparing detailed risk report for download', 'assertive');
        // You can add report generation/download logic here
        console.log('Download report requested');
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();