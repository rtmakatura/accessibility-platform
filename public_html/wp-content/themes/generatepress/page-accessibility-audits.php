<?php
/**
 * Template Name: Accessibility Audits Full Width
 */

get_header(); ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unified Accessibility Platform</title>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>

body.page-id-4724 .site-content,
body.page-id-4724 .content-area,
body.page-id-4724 .site-main {
    display: none !important;
}
    /* ========================================
       EXACT BRAND COLOR SYSTEM
       ======================================== */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        /* Exact Brand Colors Only */
        --brand-teal: #196F80;
        --brand-blue: #192A80;
        --brand-light-teal: #6FA6B0;
        --brand-dark-teal: #3A6269;
        --brand-light-gray: #DFEBED;
        --brand-medium-gray: #E1E6ED;
        --brand-gray: #9E9E9F;
        --brand-blue-gray: #9898B1;
        --brand-coral: #EF6F6C;
        --brand-navy: #1B1B42;
        
        /* Typography Scale */
        --text-xs: 0.75rem;
        --text-sm: 0.875rem;
        --text-base: 1rem;
        --text-lg: 1.125rem;
        --text-xl: 1.25rem;
        --text-2xl: 1.5rem;
        --text-3xl: 1.875rem;
        --text-4xl: 2.25rem;
        --text-5xl: 3rem;
        --text-6xl: 3.75rem;
        
        /* Spacing System */
        --space-1: 0.25rem;
        --space-2: 0.5rem;
        --space-3: 0.75rem;
        --space-4: 1rem;
        --space-5: 1.25rem;
        --space-6: 1.5rem;
        --space-8: 2rem;
        --space-10: 2.5rem;
        --space-12: 3rem;
        --space-16: 4rem;
        --space-20: 5rem;
        --space-24: 6rem;
        
        /* Border Radius */
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 28px;
        
        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(27, 27, 66, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(27, 27, 66, 0.1), 0 2px 4px -1px rgba(27, 27, 66, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(27, 27, 66, 0.1), 0 4px 6px -2px rgba(27, 27, 66, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(27, 27, 66, 0.1), 0 10px 10px -5px rgba(27, 27, 66, 0.04);
    }

    body {
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        color: var(--brand-navy);
        background: var(--brand-light-gray);
    }

    /* ========================================
       SECTION FRAMEWORK WITH NAV INTEGRATION
       ======================================== */
    
    .unified-section {
        position: relative;
        width: 100vw;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        padding: var(--space-20) 0;
        overflow: hidden;
    }

    /* Hero section - smooth integration with GeneratePress nav */
    .section-hero {
        background: linear-gradient(135deg, 
            var(--brand-light-gray) 0%, 
            var(--brand-medium-gray) 50%, 
            #ffffff 100%);
        padding-top: 6rem; /* Increased padding to prevent header overlap */
        margin-top: 0;
    }

    /* Add transition zone for nav integration */
    .section-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 40px;
        background: linear-gradient(180deg, 
            rgba(223, 235, 237, 0.8) 0%, 
            rgba(223, 235, 237, 0.2) 100%);
        z-index: 0;
    }
    
    .section-process {
        background: linear-gradient(135deg, 
            #ffffff 0%, 
            var(--brand-medium-gray) 50%, 
            var(--brand-light-gray) 100%);
        margin-top: -2px;
    }
    
    .section-audit-types {
        background: linear-gradient(135deg, 
            var(--brand-light-gray) 0%, 
            var(--brand-medium-gray) 50%, 
            #ffffff 100%);
        margin-top: -2px;
    }
    
    .unified-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 var(--space-6);
        position: relative;
        z-index: 1;
    }

    /* Typography */
    .hero-title {
        font-size: clamp(var(--text-4xl), 5vw, var(--text-6xl));
        font-weight: 800;
        color: var(--brand-navy);
        text-align: center;
        margin-bottom: var(--space-6);
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: var(--text-xl);
        color: var(--brand-dark-teal);
        text-align: center;
        max-width: 700px;
        margin: 0 auto var(--space-16);
        line-height: 1.6;
    }

    .section-title {
        font-size: clamp(var(--text-3xl), 4vw, var(--text-5xl));
        font-weight: 800;
        color: var(--brand-navy);
        text-align: center;
        margin-bottom: var(--space-5);
        letter-spacing: -0.01em;
        line-height: 1.2;
    }

    .section-subtitle {
        font-size: var(--text-lg);
        color: var(--brand-dark-teal);
        text-align: center;
        max-width: 600px;
        margin: 0 auto var(--space-24);
        line-height: 1.6;
    }

    /* ========================================
       HERO SECTION
       ======================================== */

    .content-block {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(25, 111, 128, 0.15);
        border-radius: var(--radius-xl);
        padding: var(--space-12);
        margin: var(--space-12) 0;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
    }

    .content-block:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(25, 111, 128, 0.25);
        background: rgba(255, 255, 255, 0.95);
    }

    .content-block::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--brand-teal) 0%, var(--brand-light-teal) 100%);
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .content-block:hover::before {
        opacity: 1;
    }

    .illustration-container {
        text-align: center;
        margin: var(--space-8) 0;
    }

    .main-illustration {
        width: 100%;
        max-width: 800px;
        height: auto;
        border-radius: var(--radius-lg);
        transition: all 0.3s ease;
    }

    .illustration-description {
        margin-top: var(--space-8);
        padding-top: var(--space-6);
        border-top: 1px solid rgba(25, 111, 128, 0.15);
        color: var(--brand-dark-teal);
        font-size: var(--text-base);
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--space-4);
        margin: var(--space-8) 0;
    }

    .feature-tag {
        background: rgba(111, 166, 176, 0.1);
        border: 1px solid var(--brand-light-teal);
        color: var(--brand-navy);
        padding: var(--space-4) var(--space-6);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-weight: 600;
        text-align: center;
        transition: all 0.2s ease;
        cursor: default;
    }

    .feature-tag:hover,
    .feature-tag:focus {
        background: rgba(111, 166, 176, 0.15);
        border-color: var(--brand-teal);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(25, 111, 128, 0.15);
    }

    .highlight-accent {
        color: var(--brand-teal);
        font-weight: 600;
    }

    /* ========================================
       PROCESS SECTION (2x2 GRID)
       ======================================== */

    .section-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        overflow: hidden;
    }

    .floating-gradient {
        position: absolute;
        border-radius: 50%;
        opacity: 0.3;
        filter: blur(60px);
    }

    .gradient-1 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(25, 111, 128, 0.08) 0%, transparent 70%);
        top: -100px;
        left: -100px;
        animation: float-1 20s ease-in-out infinite;
    }

    .gradient-2 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(111, 166, 176, 0.06) 0%, transparent 70%);
        top: 50%;
        right: -50px;
        animation: float-2 25s ease-in-out infinite;
    }

    .gradient-3 {
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(58, 98, 105, 0.05) 0%, transparent 70%);
        bottom: -50px;
        left: 30%;
        animation: float-3 30s ease-in-out infinite;
    }

    .process-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-8);
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .process-card {
        position: relative;
    }

    .card-container {
        position: relative;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--brand-light-teal);
        border-radius: var(--radius-lg);
        padding: 0;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
    }

    .process-card:hover .card-container {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
        border-color: var(--brand-teal);
        background: rgba(255, 255, 255, 0.95);
    }

    .step-indicator {
        position: absolute;
        top: -12px;
        right: 24px;
        z-index: 10;
    }

    .step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--brand-teal) 0%, var(--brand-dark-teal) 100%);
        color: #ffffff;
        font-size: var(--text-base);
        font-weight: 700;
        border-radius: var(--radius-md);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .card-content {
        padding: var(--space-10) var(--space-8);
        text-align: center;
        position: relative;
    }

    .icon-wrapper {
        position: relative;
        width: 64px;
        height: 64px;
        margin: 0 auto var(--space-8);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .process-card:hover .icon-wrapper {
        transform: scale(1.05);
    }

    .icon-bg {
        position: absolute;
        top: -16px;
        left: -16px;
        right: -16px;
        bottom: -16px;
        background: rgba(111, 166, 176, 0.1);
        border-radius: var(--radius-lg);
        transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0.7;
    }

    .process-card:hover .icon-bg {
        opacity: 1;
    }

    .icon-wrapper svg {
        width: 100%;
        height: 100%;
        color: var(--brand-teal);
        position: relative;
        z-index: 2;
    }

    .card-title {
        font-size: var(--text-2xl);
        font-weight: 700;
        margin-bottom: var(--space-4);
        color: var(--brand-navy);
        line-height: 1.3;
        letter-spacing: -0.015em;
    }

    .card-description {
        font-size: var(--text-base);
        line-height: 1.7;
        color: var(--brand-dark-teal);
        margin: 0;
        font-weight: 400;
    }

    /* ========================================
       AUDIT TYPES SECTION - NO SCALING ON HOVER
       ======================================== */

    .audit-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
        gap: var(--space-12);
        margin: var(--space-16) auto 0;
    }

    .audit-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid var(--brand-light-teal);
        border-radius: var(--radius-lg);
        padding: var(--space-12) var(--space-10);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 600px;
        overflow: visible;
        z-index: 1;
    }

    /* NO SCALE - Only lift and shadow change */
    .audit-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(27, 27, 66, 0.12), 0 8px 16px rgba(25, 111, 128, 0.08);
        border-color: var(--brand-teal);
        background: rgba(255, 255, 255, 0.98);
        z-index: 10;
    }

    .audit-icon-container {
        width: 90px;
        height: 90px;
        margin: 0 auto var(--space-8);
        background: linear-gradient(135deg, var(--brand-teal) 0%, var(--brand-dark-teal) 100%);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 0 8px 24px rgba(25, 111, 128, 0.2);
        transition: all 0.3s ease;
    }

    /* Subtle icon rotation only - no scaling */
    .audit-card:hover .audit-icon-container {
        transform: rotate(2deg);
        box-shadow: 0 12px 32px rgba(25, 111, 128, 0.25);
    }

    .audit-icon-container svg {
        width: 50px;
        height: 50px;
        color: #ffffff;
    }

    .audit-card-title {
        font-size: var(--text-3xl);
        font-weight: 800;
        margin-bottom: var(--space-5);
        color: var(--brand-navy);
        text-align: center;
        letter-spacing: -0.025em;
    }

    .audit-card-description {
        font-size: var(--text-lg);
        line-height: 1.7;
        color: var(--brand-dark-teal);
        margin-bottom: var(--space-8);
        text-align: center;
    }

    .includes-section {
        flex-grow: 1;
        margin-bottom: var(--space-8);
    }

    .includes-label {
        font-weight: 700;
        margin-bottom: var(--space-5);
        color: var(--brand-navy);
        font-size: var(--text-lg);
        display: flex;
        align-items: center;
        gap: var(--space-2);
    }

    .includes-label::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, rgba(111, 166, 176, 0.4) 0%, transparent 100%);
    }

    /* Feature List with Brand Colors */
    .feature-list {
        list-style: none !important;
        margin: 0 0 var(--space-8) 0 !important;
        padding: 0 !important;
    }

    .feature-list li {
        position: relative !important;
        padding: 0 0 0 36px !important;
        margin: 0 0 var(--space-4) 0 !important;
        line-height: 1.6;
        color: var(--brand-dark-teal);
        font-size: var(--text-base);
        display: block !important;
        text-align: left !important;
        list-style: none !important;
    }

    .feature-list li::marker {
        display: none !important;
    }

    .feature-list li::before {
        content: '';
        position: absolute;
        left: 0 !important;
        top: 2px;
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, var(--brand-teal) 0%, var(--brand-light-teal) 100%);
        border-radius: 6px;
    }

    .feature-list li::after {
        content: '';
        position: absolute;
        left: 7px !important;
        top: 9px;
        width: 10px;
        height: 6px;
        border-left: 2px solid #ffffff;
        border-bottom: 2px solid #ffffff;
        transform: rotate(-45deg);
    }

    .best-for {
        margin-top: auto;
        padding: var(--space-6);
        background: rgba(111, 166, 176, 0.08);
        border-radius: var(--radius-md);
        border: 1px solid var(--brand-light-teal);
    }

    .best-for-label {
        font-weight: 700;
        color: var(--brand-teal);
        margin-bottom: var(--space-2);
        font-size: var(--text-base);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .best-for-text {
        font-size: var(--text-base);
        color: var(--brand-navy);
        line-height: 1.6;
        font-weight: 500;
    }

    .card-number {
        position: absolute;
        top: 25px;
        right: 25px;
        width: 35px;
        height: 35px;
        background: rgba(111, 166, 176, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--brand-teal);
        font-size: var(--text-lg);
    }

    /* ========================================
       CTA SECTION WITH BRAND COLORS
       ======================================== */

    .cta-section {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        border: 1px solid var(--brand-light-teal);
        border-radius: var(--radius-xl);
        padding: var(--space-16);
        margin: var(--space-16) 0;
        text-align: center;
        position: relative;
        box-shadow: var(--shadow-xl);
    }

    .cta-title {
        font-size: clamp(var(--text-3xl), 4vw, var(--text-5xl));
        font-weight: 700;
        color: var(--brand-navy);
        margin-bottom: var(--space-6);
        letter-spacing: -0.02em;
        line-height: 1.3;
    }

    .cta-description {
        font-size: var(--text-xl);
        color: var(--brand-dark-teal);
        margin-bottom: var(--space-12);
        line-height: 1.5;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: var(--space-6);
        justify-content: center;
        flex-wrap: wrap;
    }

    .primary-button {
        display: inline-flex;
        align-items: center;
        gap: var(--space-3);
        background: linear-gradient(135deg, var(--brand-teal) 0%, var(--brand-dark-teal) 100%);
        color: #ffffff;
        text-decoration: none;
        padding: var(--space-5) var(--space-10);
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: var(--text-base);
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(25, 111, 128, 0.25);
    }

    .primary-button:hover {
        background: linear-gradient(135deg, var(--brand-light-teal) 0%, var(--brand-teal) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(25, 111, 128, 0.35);
    }

    .secondary-button {
        display: inline-flex;
        align-items: center;
        gap: var(--space-3);
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid var(--brand-teal);
        color: var(--brand-teal);
        text-decoration: none;
        padding: var(--space-5) var(--space-10);
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: var(--text-base);
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .secondary-button:hover {
        background: rgba(111, 166, 176, 0.1);
        border-color: var(--brand-dark-teal);
        transform: translateY(-2px);
        color: var(--brand-dark-teal);
    }

    /* ========================================
       FAQ SECTION
       ======================================== */

    .section-faq {
        background: linear-gradient(135deg, 
            #ffffff 0%, 
            var(--brand-light-gray) 50%, 
            var(--brand-medium-gray) 100%);
        margin-top: -2px;
    }

    .faq-wrapper {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: var(--space-12);
        margin-top: var(--space-8);
    }

    /* Sidebar Navigation */
    .faq-sidebar {
        height: fit-content;
        position: sticky;
        top: var(--space-8);
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid var(--brand-light-teal);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        box-shadow: var(--shadow-md);
    }

    .faq-nav-title {
        font-size: var(--text-xl);
        font-weight: 600;
        margin: 0 0 var(--space-6) 0;
        color: var(--brand-navy);
    }

    .faq-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .faq-nav-list > li {
        margin-bottom: var(--space-8);
    }

    .faq-nav-list > li > strong {
        color: var(--brand-navy);
        display: block;
        font-size: var(--text-sm);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: var(--space-3);
    }

    .faq-nav-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .faq-nav-list ul li {
        margin-bottom: var(--space-2);
    }

    .faq-nav-list a {
        color: var(--brand-teal);
        text-decoration: none;
        font-size: var(--text-sm);
        line-height: 1.5;
        display: block;
        padding: var(--space-1) 0;
        transition: color 0.2s ease;
        border-bottom: 1px solid transparent;
    }

    .faq-nav-list a:hover {
        color: var(--brand-dark-teal);
        border-bottom-color: var(--brand-light-teal);
    }

    /* Main FAQ Content */
    .faq-content {
        min-width: 0;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(111, 166, 176, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--space-12);
        box-shadow: var(--shadow-md);
    }

    .faq-section {
        margin-bottom: var(--space-12);
    }

    .faq-section h3 {
        color: var(--brand-navy);
        font-size: var(--text-3xl);
        font-weight: 700;
        margin-bottom: var(--space-8);
        padding-bottom: var(--space-4);
        border-bottom: 2px solid var(--brand-light-teal);
    }

    .faq-subheading {
        color: var(--brand-navy);
        font-size: var(--text-xl);
        font-weight: 600;
        margin: var(--space-10) 0 var(--space-6);
        padding-left: var(--space-4);
        border-left: 4px solid var(--brand-light-teal);
    }

    .faq-item {
        margin-bottom: var(--space-8);
        padding: var(--space-6);
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(111, 166, 176, 0.15);
        border-radius: var(--radius-md);
        transition: all 0.2s ease;
    }

    .faq-item:hover {
        background: rgba(255, 255, 255, 0.9);
        border-color: var(--brand-light-teal);
        box-shadow: var(--shadow-sm);
    }

    .faq-question {
        color: var(--brand-navy);
        font-size: var(--text-lg);
        font-weight: 600;
        margin: 0 0 var(--space-3);
        scroll-margin-top: var(--space-8);
        line-height: 1.4;
    }

    .faq-answer {
        color: var(--brand-dark-teal);
        line-height: 1.6;
        margin: 0;
        font-size: var(--text-base);
    }

    .faq-answer strong {
        color: var(--brand-navy);
        font-weight: 600;
    }

    .faq-answer em {
        color: var(--brand-teal);
        font-style: normal;
        font-weight: 500;
    }

    /* Final CTA */
    .faq-final-cta {
        margin-top: var(--space-16);
        text-align: center;
        padding: var(--space-12) 0;
        border-top: 2px solid var(--brand-light-teal);
        background: rgba(111, 166, 176, 0.05);
        border-radius: var(--radius-md);
    }

    .faq-final-cta h3 {
        font-size: var(--text-2xl);
        margin-bottom: var(--space-4);
        font-weight: 600;
        color: var(--brand-navy);
        border: none;
        padding: 0;
    }

    .faq-final-cta p {
        font-size: var(--text-lg);
        margin-bottom: var(--space-8);
        color: var(--brand-dark-teal);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: var(--space-8);
    }

    /* ========================================
       ACCESSIBILITY ENHANCEMENTS
       ======================================== */

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    /* Focus styles with brand colors */
    .process-card:focus-within,
    .audit-card:focus-within {
        outline: 3px solid var(--brand-teal);
        outline-offset: 4px;
    }

    .feature-tag:focus {
        outline: 2px solid var(--brand-teal);
        outline-offset: 2px;
    }

    .primary-button:focus,
    .secondary-button:focus {
        outline: 3px solid var(--brand-light-teal);
        outline-offset: 2px;
    }

    /* High Contrast Support */
    @media (prefers-contrast: high) {
        .content-block,
        .card-container,
        .audit-card,
        .cta-section {
            border: 2px solid var(--brand-navy);
            background: #ffffff;
        }
        
        .primary-button {
            background: var(--brand-navy);
        }
        
        .feature-tag {
            border-color: var(--brand-navy);
            background: var(--brand-light-gray);
        }
    }

    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {
        .floating-gradient {
            animation: none;
        }
        
        .content-block,
        .card-container,
        .audit-card,
        .main-illustration,
        .feature-tag,
        .primary-button,
        .secondary-button,
        .icon-wrapper,
        .audit-icon-container {
            transition: none;
        }
        
        .content-block:hover,
        .process-card:hover .card-container,
        .audit-card:hover,
        .content-block:hover .main-illustration,
        .feature-tag:hover,
        .primary-button:hover,
        .secondary-button:hover,
        .process-card:hover .icon-wrapper,
        .audit-card:hover .audit-icon-container {
            transform: none;
        }
    }

    /* ========================================
       RESPONSIVE DESIGN
       ======================================== */

    @media (max-width: 1024px) {
        .hero-title {
            font-size: var(--text-4xl);
        }
        
        .section-title {
            font-size: var(--text-4xl);
        }
    }

    @media (max-width: 768px) {
        .unified-section {
            padding: var(--space-16) 0;
        }
        
        .unified-container {
            padding: 0 var(--space-5);
        }
        
        .section-subtitle {
            margin-bottom: var(--space-20);
        }
        
        .process-grid {
            grid-template-columns: 1fr;
            gap: var(--space-6);
        }
        
        .audit-grid {
            grid-template-columns: 1fr;
            gap: var(--space-10);
            margin-top: var(--space-12);
        }
        
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-3);
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .primary-button,
        .secondary-button {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        
        .card-content {
            padding: var(--space-8) var(--space-6);
        }
        
        .audit-card {
            padding: var(--space-10) var(--space-8);
            min-height: auto;
        }
        
        /* Reduce hover lift on mobile */
        .audit-card:hover {
            transform: translateY(-4px);
        }
    }

    @media (max-width: 968px) {
        /* FAQ Mobile Layout */
        .faq-wrapper {
            grid-template-columns: 1fr;
            gap: var(--space-6);
        }

        .faq-sidebar {
            position: relative;
            top: 0;
            margin-bottom: var(--space-6);
            padding: var(--space-6);
        }

        .faq-content {
            padding: var(--space-8);
        }

        .faq-section h3 {
            font-size: var(--text-2xl);
        }
    }

    @media (max-width: 480px) {
        .unified-section {
            padding: var(--space-12) 0;
        }
        
        .section-hero {
            padding-top: var(--space-6);
        }
        
        .hero-title {
            font-size: var(--text-3xl);
        }
        
        .section-title {
            font-size: var(--text-3xl);
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            font-size: var(--text-sm);
        }
        
        .audit-icon-container {
            width: 75px;
            height: 75px;
            margin-bottom: var(--space-6);
        }
        
        .audit-icon-container svg {
            width: 40px;
            height: 40px;
        }

        /* FAQ Mobile Styles */
        .faq-wrapper {
            grid-template-columns: 1fr;
            gap: var(--space-8);
        }

        .faq-sidebar {
            position: relative;
            top: 0;
            margin-bottom: var(--space-8);
            padding: var(--space-6);
        }

        .faq-nav-title {
            font-size: var(--text-lg);
        }

        .faq-content {
            padding: var(--space-8);
        }

        .faq-section h3 {
            font-size: var(--text-2xl);
        }

        .faq-question {
            font-size: var(--text-base);
        }

        .faq-final-cta {
            padding: var(--space-8) var(--space-4);
        }

        .faq-final-cta h3 {
            font-size: var(--text-xl);
        }

        .faq-final-cta p {
            font-size: var(--text-base);
        }
    }

    /* ========================================
       ANIMATIONS
       ======================================== */

    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0); }
        25% { transform: translate(30px, -20px); }
        50% { transform: translate(-20px, 20px); }
        75% { transform: translate(20px, 10px); }
    }

    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(-25px, 15px); }
        66% { transform: translate(15px, -25px); }
    }

    @keyframes float-3 {
        0%, 100% { transform: translate(0, 0); }
        40% { transform: translate(20px, -15px); }
        80% { transform: translate(-15px, 10px); }
    }

    /* ========================================
       PRINT STYLES
       ======================================== */

    @media print {
        .unified-section {
            background: #ffffff !important;
            width: auto;
            margin-left: 0;
            margin-right: 0;
            left: auto;
            right: auto;
            padding: var(--space-10) 0;
        }
        
        .section-backdrop,
        .floating-gradient {
            display: none;
        }
        
        .content-block,
        .card-container,
        .audit-card,
        .cta-section {
            background: #ffffff;
            border: 1px solid var(--brand-gray);
            box-shadow: none;
            break-inside: avoid;
        }
        
        .primary-button,
        .secondary-button {
            background: transparent;
            color: var(--brand-teal);
            border: 1px solid var(--brand-teal);
        }
    }
</style>

<!-- HERO SECTION -->
<section class="unified-section section-hero">
    <div class="unified-container">
        <header>
            <h1 class="hero-title">Transform Your Digital Presence</h1>
            <p class="hero-subtitle">
                Comprehensive accessibility solutions that combine expert analysis with cutting-edge technology to create inclusive digital experiences that exceed compliance standards
            </p>
        </header>

        <div class="content-block">
            <div class="illustration-container">
                <img decoding="async" src="http://readysetcomply.com/wp-content/uploads/2025/08/ChatGPT-Image-Aug-14-2025-03_00_15-PM.png" alt="Accessibility audit process illustration showing four key steps: Discovery and Scope where we understand your digital environment and priorities, Automated and Manual Testing combining industry tools with hands-on assistive technology testing, Annotated Findings Report with detailed descriptions and severity ratings, and Prioritized Remediation Roadmap sorted by impact and effort for fastest compliance wins" class="main-illustration" style="opacity: 1; transition: opacity 0.4s;">
            </div>
            <div class="illustration-description">
                <p>Our <span class="highlight-accent">proven 4-step methodology</span> ensures comprehensive accessibility evaluation and clear, prioritized remediation guidance that your development team can implement efficiently.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-tag" tabindex="0" role="button" aria-describedby="discovery-desc">
                    Discovery & Planning
                    <div class="sr-only" id="discovery-desc">Understanding your digital environment and accessibility priorities</div>
                </div>
                <div class="feature-tag" tabindex="0" role="button" aria-describedby="testing-desc">
                    Comprehensive Testing
                    <div class="sr-only" id="testing-desc">Automated tools combined with manual assistive technology testing</div>
                </div>
                <div class="feature-tag" tabindex="0" role="button" aria-describedby="reporting-desc">
                    Detailed Reporting
                    <div class="sr-only" id="reporting-desc">Annotated findings with severity ratings and code references</div>
                </div>
                <div class="feature-tag" tabindex="0" role="button" aria-describedby="roadmap-desc">
                    Actionable Roadmap
                    <div class="sr-only" id="roadmap-desc">Prioritized recommendations sorted by impact and implementation effort</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROCESS SECTION -->
<section class="unified-section section-process" aria-labelledby="audit-process-heading">
    <div class="section-backdrop" aria-hidden="true">
        <div class="floating-gradient gradient-1"></div>
        <div class="floating-gradient gradient-2"></div>
        <div class="floating-gradient gradient-3"></div>
    </div>
    
    <div class="unified-container">
        <header>
            <h2 id="audit-process-heading" class="section-title">Our Accessibility Audit Process</h2>
            <p class="section-subtitle">A comprehensive approach to digital accessibility that delivers actionable results</p>
        </header>
        
        <div class="process-grid" role="list">
            <!-- Step 1: Discovery & Scope -->
            <article class="process-card" role="listitem">
                <div class="card-container">
                    <div class="step-indicator">
                        <span class="step-number">01</span>
                    </div>
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <div class="icon-bg"></div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="12" stroke="currentColor" stroke-width="2"></circle>
                                <path d="M16 8v8l5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h3 class="card-title">Discovery & Scope</h3>
                        <p class="card-description">
                            We begin by understanding your digital environment, user base, and accessibility priorities. This step ensures we focus our audit efforts most effectively.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Step 2: Automated & Manual Testing -->
            <article class="process-card" role="listitem">
                <div class="card-container">
                    <div class="step-indicator">
                        <span class="step-number">02</span>
                    </div>
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <div class="icon-bg"></div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="14" cy="16" r="6" stroke="currentColor" stroke-width="2"></circle>
                                <path d="M18 20l6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                <path d="M11 16l2 2 3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h3 class="card-title">Automated & Manual Testing</h3>
                        <p class="card-description">
                            We combine industry-leading automated tools with hands-on manual testing using assistive technologies like NVDA, JAWS, VoiceOver, and TalkBack.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Step 3: Annotated Findings Report -->
            <article class="process-card" role="listitem">
                <div class="card-container">
                    <div class="step-indicator">
                        <span class="step-number">03</span>
                    </div>
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <div class="icon-bg"></div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 6h12l5 5v15a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2z" stroke="currentColor" stroke-width="2"></path>
                                <path d="M20 6v5h5M10 16h12M10 20h12M10 24h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        <h3 class="card-title">Annotated Findings Report</h3>
                        <p class="card-description">
                            You'll receive a detailed report with issue descriptions, screenshots with callouts, severity ratings, and code-level references.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Step 4: Prioritized Remediation Roadmap -->
            <article class="process-card" role="listitem">
                <div class="card-container">
                    <div class="step-indicator">
                        <span class="step-number">04</span>
                    </div>
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <div class="icon-bg"></div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 9h16M8 16h12M8 23h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                <circle cx="8" cy="9" r="1.5" fill="currentColor"></circle>
                                <circle cx="8" cy="16" r="1.5" fill="currentColor"></circle>
                                <circle cx="8" cy="23" r="1.5" fill="currentColor"></circle>
                            </svg>
                        </div>
                        <h3 class="card-title">Prioritized Remediation Roadmap</h3>
                        <p class="card-description">
                            Our recommendations are sorted by impact and effort, so your team knows exactly where to start for the fastest compliance wins.
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- AUDIT TYPES SECTION -->
<section class="unified-section section-audit-types" aria-labelledby="audit-types-heading">
    <div class="unified-container">
        <header>
            <h2 id="audit-types-heading" class="section-title">Audit Types We Offer</h2>
            <p class="section-subtitle">Comprehensive accessibility solutions tailored to your organization's specific needs and compliance requirements</p>
        </header>
        
        <div class="audit-grid" role="list">
            <!-- Accessibility Audit Card -->
            <article class="audit-card" role="listitem" tabindex="0">
                <span class="card-number" aria-hidden="true">01</span>
                
                <div class="audit-icon-container">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <path d="M9 11l3 3L22 4"></path>
                    </svg>
                </div>
                
                <h3 class="audit-card-title">Accessibility Audit</h3>
                
                <p class="audit-card-description">
                    A complete evaluation of your website, app, or document library, combining automated scans with in-depth manual testing.
                </p>
                
                <div class="includes-section">
                    <p class="includes-label">What's Included</p>
                    <ul class="feature-list" role="list">
                        <li role="listitem">WCAG 2.2 AA/AAA compliance checks</li>
                        <li role="listitem">Assistive technology testing (NVDA, JAWS, VoiceOver, TalkBack)</li>
                        <li role="listitem">Color contrast and design reviews</li>
                        <li role="listitem">Detailed annotated report with severity ratings</li>
                        <li role="listitem">Prioritized remediation roadmap</li>
                    </ul>
                </div>
                
                <div class="best-for">
                    <p class="best-for-label">Best For</p>
                    <p class="best-for-text">Organizations seeking a clear, actionable picture of accessibility issues and how to resolve them.</p>
                </div>
            </article>
            
            <!-- Accessibility Policy Review Card -->
            <article class="audit-card" role="listitem" tabindex="0">
                <span class="card-number" aria-hidden="true">02</span>
                
                <div class="audit-icon-container">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                
                <h3 class="audit-card-title">Accessibility Policy Review</h3>
                
                <p class="audit-card-description">
                    An expert analysis of your existing accessibility policies, statements, and internal processes.
                </p>
                
                <div class="includes-section">
                    <p class="includes-label">What's Included</p>
                    <ul class="feature-list" role="list">
                        <li role="listitem">Review of accessibility policy content and placement</li>
                        <li role="listitem">Gap analysis against current laws and standards</li>
                        <li role="listitem">Recommendations for updates to reflect WCAG, ADA, and Section 508 compliance</li>
                        <li role="listitem">Guidance on integrating accessibility into ongoing governance</li>
                    </ul>
                </div>
                
                <div class="best-for">
                    <p class="best-for-label">Best For</p>
                    <p class="best-for-text">Organizations needing to ensure their policies are up-to-date, compliant, and actionable.</p>
                </div>
            </article>
            
            <!-- VPAT/ACR Creation Card -->
            <article class="audit-card" role="listitem" tabindex="0">
                <span class="card-number" aria-hidden="true">03</span>
                
                <div class="audit-icon-container">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                
                <h3 class="audit-card-title">
                    <abbr title="Voluntary Product Accessibility Template">VPAT</abbr>/<abbr title="Accessibility Conformance Report">ACR</abbr> Creation
                </h3>
                
                <p class="audit-card-description">
                    Preparation of a Voluntary Product Accessibility Template (VPAT) and Accessibility Conformance Report (ACR) that documents how your product meets WCAG and Section 508 standards.
                </p>
                
                <div class="includes-section">
                    <p class="includes-label">What's Included</p>
                    <ul class="feature-list" role="list">
                        <li role="listitem">Detailed feature-by-feature conformance assessment</li>
                        <li role="listitem">Clear, compliant formatting per ITI guidelines</li>
                        <li role="listitem">Collaborative review to ensure accuracy</li>
                        <li role="listitem">Final signed VPAT/ACR ready for procurement or client submission</li>
                    </ul>
                </div>
                
                <div class="best-for">
                    <p class="best-for-label">Best For</p>
                    <p class="best-for-text">Vendors or agencies responding to RFPs, government contracts, or client requests requiring formal accessibility documentation.</p>
                </div>
            </article>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2 class="cta-title">Ready to Lead in Digital Accessibility?</h2>
            <p class="cta-description">
                Join forward-thinking organizations who choose proactive accessibility compliance over reactive remediation
            </p>
            <div class="cta-buttons">
                <button class="primary-button" type="button" aria-describedby="audit-action">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M9 12l2 2 4-4"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                    </svg>
                    Start Your Accessibility Audit
                </button>
                <button class="secondary-button" type="button" aria-describedby="consultation-action">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Schedule Consultation
                </button>
            </div>
            <div class="sr-only">
                <p id="audit-action">Initiate a comprehensive evaluation of your website or application's accessibility compliance</p>
                <p id="consultation-action">Schedule a personalized consultation to discuss your accessibility goals and requirements</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ SECTION -->
<section class="unified-section section-faq" aria-labelledby="faq-heading">
    <div class="unified-container">
        <header>
            <h2 id="faq-heading" class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Everything you need to know about our accessibility audit services and processes</p>
        </header>

        <div class="faq-wrapper" role="region" aria-label="Accessibility Audits & Assessments FAQ">
            <!-- Sidebar Navigation -->
            <nav class="faq-sidebar" aria-label="FAQ Navigation">
                <h3 class="faq-nav-title">Quick Navigation</h3>
                <ul class="faq-nav-list">
                    <li>
                        <strong>Scope & Limitations</strong>
                        <ul>
                            <li><a href="#guarantee-compliance">Do you guarantee full accessibility compliance?</a></li>
                            <li><a href="#testing-standards">What standards do you test against?</a></li>
                            <li><a href="#coverage-scope">What does an accessibility audit cover?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Process & Engagement</strong>
                        <ul>
                            <li><a href="#audit-timeline">How long does an audit take?</a></li>
                            <li><a href="#work-with-team">Will you work directly with our internal team?</a></li>
                            <li><a href="#getting-started">What do you need from us to get started?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Deliverables & Formats</strong>
                        <ul>
                            <li><a href="#audit-format">What format will the audit results be in?</a></li>
                            <li><a href="#developer-tasks">Do you provide developer-ready tasks?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Pricing & Payment</strong>
                        <ul>
                            <li><a href="#fixed-prices">Are your prices fixed?</a></li>
                            <li><a href="#payment-plans">Do you offer payment plans?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Ongoing Support</strong>
                        <ul>
                            <li><a href="#retesting">Do you offer re-testing after fixes?</a></li>
                            <li><a href="#remediation-help">Can you help with remediation?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Technology Coverage</strong>
                        <ul>
                            <li><a href="#platforms">Which platforms do you audit?</a></li>
                            <li><a href="#assistive-tech">Which assistive technologies do you test with?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Legal & Risk</strong>
                        <ul>
                            <li><a href="#lawsuit-help">Will you help if we face a lawsuit or complaint?</a></li>
                            <li><a href="#accessibility-statement">Can you help us create an accessibility statement?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>General</strong>
                        <ul>
                            <li><a href="#best-suited">Who are your services best suited for?</a></li>
                            <li><a href="#international">Do you work with clients outside the U.S.?</a></li>
                            <li><a href="#compliance-guarantee">Do you guarantee compliance or lawsuit protection?</a></li>
                            <li><a href="#customization">Can packages be customized?</a></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Package-Specific</strong>
                        <ul>
                            <li><a href="#pkg-audit">Accessibility Audit (Manual + Automated)</a></li>
                            <li><a href="#pkg-policy">Accessibility Policy Review</a></li>
                            <li><a href="#pkg-vpat">VPAT / ACR Creation</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- FAQ Content -->
            <div class="faq-content">
                <!-- Scope & Limitations -->
                <section class="faq-section" id="scope-limitations">
                    <h3>Scope & Limitations</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="guarantee-compliance">Do you guarantee full accessibility compliance?</h4>
                        <p class="faq-answer">No provider can guarantee permanent compliance. Accessibility is an ongoing practice and digital products evolve. Our audits significantly reduce risk by addressing current WCAG 2.2 requirements and best practices and by giving you a prioritized remediation plan.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="testing-standards">What standards do you test against?</h4>
                        <p class="faq-answer">Our default audits test against <strong>WCAG 2.2 Level AA</strong>. Where applicable, we map results to <strong>Section 508</strong> (U.S. Rehabilitation Act), ADA web guidance, and <strong>EN 301 549</strong>. On request, we can assess selected AAA success criteria.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="coverage-scope">What does an accessibility audit cover?</h4>
                        <p class="faq-answer">We evaluate representative templates or screens, critical user journeys (e.g., sign-in, forms, checkout), navigation structure, content semantics, color and contrast, keyboard support, focus management, error handling, and assistive technology behavior.</p>
                    </div>
                </section>

                <!-- Process & Engagement -->
                <section class="faq-section" id="process-engagement">
                    <h3>Process & Engagement</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="audit-timeline">How long does an audit take?</h4>
                        <p class="faq-answer">Typical engagements for smaller sites take <strong>2–3 weeks</strong>. Larger websites, web apps, or multi-platform products usually run <strong>4–8 weeks</strong> depending on scope and complexity.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="work-with-team">Will you work directly with our internal team?</h4>
                        <p class="faq-answer">Yes. We can deliver findings only, collaborate with your developers/designers during remediation, and retest fixes. We're flexible to your workflow and tools.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="getting-started">What do you need from us to get started?</h4>
                        <p class="faq-answer">Access to a staging or live environment, a prioritized list of pages/flows, any design system or brand guidelines, and contact information for your technical owners. If content is behind authentication, temporary credentials are helpful.</p>
                    </div>
                </section>

                <!-- Deliverables & Formats -->
                <section class="faq-section" id="deliverables-formats">
                    <h3>Deliverables & Formats</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="audit-format">What format will the audit results be in?</h4>
                        <p class="faq-answer">You'll receive a written report (PDF) with annotated screenshots, severity/impact ratings, WCAG references, and a prioritized roadmap. We also include code/design guidance and <em>optionally</em> create import-ready tickets (e.g., Jira, Trello, GitHub).</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="developer-tasks">Do you provide developer-ready tasks?</h4>
                        <p class="faq-answer">Yes. On request, we provide tickets containing steps to reproduce, expected behavior, acceptance criteria, and references to the relevant success criteria.</p>
                    </div>
                </section>

                <!-- Pricing & Payment -->
                <section class="faq-section" id="pricing-payment">
                    <h3>Pricing & Payment</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="fixed-prices">Are your prices fixed?</h4>
                        <p class="faq-answer">For common scopes we offer flat-rate packages. If your product spans multiple brands, platforms, or contains unusual complexity, we'll create a custom quote.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="payment-plans">Do you offer payment plans?</h4>
                        <p class="faq-answer">For larger projects we can phase payments (e.g., deposit + milestone + final). Terms are agreed in the statement of work before we begin.</p>
                    </div>
                </section>

                <!-- Ongoing Support -->
                <section class="faq-section" id="ongoing-support">
                    <h3>Ongoing Support</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="retesting">Do you offer re-testing after fixes?</h4>
                        <p class="faq-answer">Yes. After you implement fixes, we re-test the affected areas, confirm improvements, and refresh the report so you have up-to-date documentation.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="remediation-help">Can you help with remediation?</h4>
                        <p class="faq-answer">We can advise your team during remediation, pair with developers or designers, or provide targeted training tied to the audit findings.</p>
                    </div>
                </section>

                <!-- Technology Coverage -->
                <section class="faq-section" id="technology-coverage">
                    <h3>Technology Coverage</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="platforms">Which platforms do you audit?</h4>
                        <p class="faq-answer">Websites, web applications, and native mobile apps. We also audit and remediate digital documents (PDF, Word, PowerPoint) as part of separate work items.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="assistive-tech">Which assistive technologies do you test with?</h4>
                        <p class="faq-answer">We use NVDA and JAWS on Windows, VoiceOver on macOS/iOS, TalkBack on Android, screen magnifiers/zoom, keyboard-only navigation, and voice/switch input to reflect real-world usage.</p>
                    </div>
                </section>

                <!-- Legal & Risk -->
                <section class="faq-section" id="legal-risk">
                    <h3>Legal & Risk</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="lawsuit-help">Will you help if we face a lawsuit or complaint?</h4>
                        <p class="faq-answer">We're not a law firm and can't provide legal advice, but we supply audit reports, remediation evidence, and activity logs your counsel can use to demonstrate due diligence.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="accessibility-statement">Can you help us create an accessibility statement?</h4>
                        <p class="faq-answer">Yes. Our <strong>Accessibility Policy Review</strong> produces an updated public statement and internal policy recommendations aligned to your organization's workflow.</p>
                    </div>
                </section>

                <!-- General -->
                <section class="faq-section" id="general-questions">
                    <h3>General</h3>

                    <div class="faq-item">
                        <h4 class="faq-question" id="best-suited">Who are your services best suited for?</h4>
                        <p class="faq-answer">Local governments, healthcare providers, educational institutions, nonprofits, and SMB technology teams who need expert guidance and clear, actionable deliverables.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="international">Do you work with clients outside the U.S.?</h4>
                        <p class="faq-answer">Yes. We price in USD and align to WCAG 2.2 and U.S. regulations (e.g., Section 508), and we can adapt deliverables to EN 301 549 or other regional frameworks.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="compliance-guarantee">Do you guarantee compliance or lawsuit protection?</h4>
                        <p class="faq-answer">No. Accessibility is shared and continuous. Our work reduces risk and improves usability, but no vendor can guarantee immunity from legal claims.</p>
                    </div>

                    <div class="faq-item">
                        <h4 class="faq-question" id="customization">Can packages be customized?</h4>
                        <p class="faq-answer">Yes. We can tailor scope, depth, and deliverables to your platforms, timelines, and team capacity.</p>
                    </div>
                </section>

                <!-- Package-Specific -->
                <section class="faq-section" id="package-questions">
                    <h3>Package-Specific Questions</h3>

                    <!-- Accessibility Audit (Manual + Automated) -->
                    <h4 class="faq-subheading" id="pkg-audit">Accessibility Audit (Manual + Automated)</h4>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">What's included in the audit?</h5>
                        <p class="faq-answer">Manual + automated WCAG 2.2 AA testing across representative pages/templates and key user flows, assistive technology checks, annotated findings with severity, and a prioritized remediation roadmap.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">Can I choose which pages are tested?</h5>
                        <p class="faq-answer">Yes. We'll help you select pages that represent your templates, components, and critical journeys so the results generalize across your product.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">Do you audit documents as part of the site audit?</h5>
                        <p class="faq-answer">Documents (PDF/Word/PowerPoint) are quoted separately. We can include a document sample audit on request and provide remediation services if needed.</p>
                    </div>

                    <!-- Accessibility Policy Review -->
                    <h4 class="faq-subheading" id="pkg-policy">Accessibility Policy Review</h4>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">What's included in the policy review?</h5>
                        <p class="faq-answer">Assessment of your current public accessibility statement and internal policy; recommendations for roles, workflow, KPIs, and procurement language; and an updated, publication-ready statement.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">How often should policies be updated?</h5>
                        <p class="faq-answer">Annually at minimum, or following significant platform changes or standard revisions (e.g., new WCAG releases).</p>
                    </div>

                    <!-- VPAT / ACR Creation -->
                    <h4 class="faq-subheading" id="pkg-vpat">VPAT / ACR Creation</h4>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">What do you need from us?</h5>
                        <p class="faq-answer">Access to the product or site for testing and any prior accessibility documentation. We handle testing, mapping to criteria, and author the ACR in the specified VPAT edition.</p>
                    </div>
                    
                    <div class="faq-item">
                        <h5 class="faq-question">Which VPAT editions do you support?</h5>
                        <p class="faq-answer">We can produce Section 508 (U.S.), EN 301 549 (EU), and INT editions. One edition is included; additional editions can be added for a supplemental fee.</p>
                    </div>
                </section>

                <!-- Final CTA -->
                <div class="faq-final-cta">
                    <h3>Still have more questions?</h3>
                    <p>We're here to help you move from findings to fixes and build an accessible, compliant digital experience.</p>
                    <button class="primary-button" type="button" aria-label="Contact us about accessibility audits and assessments">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Unified interaction management
        const buttons = document.querySelectorAll('.primary-button, .secondary-button');
        const featureTags = document.querySelectorAll('.feature-tag');
        const images = document.querySelectorAll('.main-illustration');

        // Button interactions
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const buttonText = this.textContent.trim();
                console.log(`Action: ${buttonText}`);
                
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                announceToScreenReader(`${buttonText} activated`);
            });
        });

        // Feature tag keyboard navigation
        featureTags.forEach((tag, index) => {
            tag.addEventListener('keydown', function(e) {
                let targetIndex;
                
                switch(e.key) {
                    case 'ArrowRight':
                    case 'ArrowDown':
                        e.preventDefault();
                        targetIndex = (index + 1) % featureTags.length;
                        featureTags[targetIndex].focus();
                        break;
                    case 'ArrowLeft':
                    case 'ArrowUp':
                        e.preventDefault();
                        targetIndex = index === 0 ? featureTags.length - 1 : index - 1;
                        featureTags[targetIndex].focus();
                        break;
                    case 'Enter':
                    case ' ':
                        e.preventDefault();
                        announceToScreenReader(`Feature: ${tag.textContent.trim()}`);
                        break;
                }
            });
        });

        // Image loading
        images.forEach((img) => {
            img.addEventListener('load', function() {
                if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    img.style.opacity = '0';
                    img.style.transition = 'opacity 0.4s ease';
                    setTimeout(() => {
                        img.style.opacity = '1';
                    }, 100);
                }
            });

            img.addEventListener('error', function() {
                console.error(`Failed to load image: ${img.src}`);
                announceToScreenReader('Image failed to load. Alternative text description is available.');
            });

            if (img.complete) {
                img.dispatchEvent(new Event('load'));
            }
        });

        // Screen reader announcements
        function announceToScreenReader(message) {
            const announcement = document.createElement('div');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.className = 'sr-only';
            announcement.textContent = message;
            document.body.appendChild(announcement);
            
            setTimeout(() => {
                if (document.body.contains(announcement)) {
                    document.body.removeChild(announcement);
                }
            }, 1000);
        }

        // Smooth scrolling for internal links
        document.addEventListener('click', function(e) {
            if (e.target.getAttribute('href') && e.target.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(e.target.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
                        block: 'start'
                    });
                    target.focus();
                }
            }
        });

        console.log('Unified accessibility platform loaded with brand colors');
    });
</script>

<?php get_footer(); ?>