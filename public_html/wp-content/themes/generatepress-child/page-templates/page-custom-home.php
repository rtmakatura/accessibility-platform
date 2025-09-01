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

<!-- Paste the HTML structure examples here -->
<div class="u-fullbleed">
  <div class="u-section">
    <div class="u-narrow u-stack-lg" style="text-align: center;">
      <h1 class="u-section-title">Ready to Lead in Digital Accessibility?</h1>
      <p class="u-lead">Join forward-thinking organizations who choose proactive accessibility compliance over reactive remediation</p>
      <div class="u-btn-row" style="justify-content: center;">
        <a href="#audit" class="u-btn u-btn-primary">Get Your Accessibility Audit</a>
        <a href="#consultation" class="u-btn u-btn-secondary">Schedule Consultation</a>
      </div>
    </div>
  </div>
</div>

<!-- Services section -->
<div class="u-section">
  <div class="u-section-header">
    <span class="u-eyebrow">Our Services</span>
    <h2 class="u-section-title2">Comprehensive Solutions for Every Need</h2>
    <p class="u-lead">From Web Recovery through best complete documentation...</p>
  </div>
  
  <div class="u-grid u-grid-autofit-300 u-stretch">
    <div class="u-card u-card-hover">
      <div class="u-card-inner u-stack">
        <div class="u-icon u-icon-audit"></div>
        <h4>WCAG 2.1 AAA+ Testing</h4>
        <p>Complete accessibility evaluation against the latest standards...</p>
      </div>
    </div>
    <!-- Add more cards here -->
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>