# Risk Calculator Integration - Setup Guide

This guide explains how to integrate the Accessibility Risk Calculator with your GeneratePress WordPress theme.

## Files Created

### 1. Page Template
- **File**: `public_html/wp-content/themes/generatepress-child/page-risk-calculator.php`
- **Purpose**: WordPress page template for the risk calculator
- **Usage**: Applied when "Risk Calculator" template is selected for a page

### 2. CSS Styles
- **File**: `public_html/wp-content/themes/generatepress-child/assets/css/04-pages/_risk-calculator.css`
- **Purpose**: Styles for the risk calculator that match your design system
- **Integration**: Automatically imported via `main.css`

### 3. JavaScript Functionality
- **File**: `public_html/wp-content/themes/generatepress-child/assets/js/risk-calculator.js`
- **Purpose**: Vanilla JavaScript calculator functionality (converted from React)
- **Features**: Real-time calculations, accessibility support, screen reader announcements

### 4. Functions Integration
- **File**: `public_html/wp-content/themes/generatepress-child/functions.php`
- **Addition**: `enqueue_risk_calculator_assets()` function
- **Purpose**: Loads JavaScript only on risk calculator pages for performance

## WordPress Setup Instructions

### Step 1: Create a New Page
1. Go to **WordPress Admin > Pages > Add New**
2. Set the page title to "Risk Calculator" 
3. Leave the content area empty (template handles all content)
4. In **Page Attributes** meta box, select **Template: Risk Calculator**
5. Set the slug to `risk-calculator` for clean URLs
6. **Publish** the page

### Step 2: Add Navigation Menu Item
1. Go to **Appearance > Menus**
2. Add the Risk Calculator page to your main navigation
3. Position it appropriately in your menu structure
4. **Save Menu**

### Step 3: Test the Integration
1. Visit the Risk Calculator page on your site
2. Test form interactions and calculations
3. Verify responsive design on mobile devices
4. Check accessibility with screen readers

## Design System Integration

The risk calculator automatically integrates with your existing design system:

### Color Scheme
- Primary: `var(--color-primary)` (#192A80)
- Secondary: `var(--color-secondary)` (#196F80)
- Accent: `var(--color-accent)` (#EF6F6C)
- All colors from your `_variables.css` file

### Typography
- Matches your existing font stack and sizing
- Uses consistent spacing and line heights
- Maintains proper heading hierarchy

### Layout
- Responsive grid system consistent with home page
- Mobile-first approach with proper breakpoints
- Container widths match site standards

## Accessibility Features

### WCAG 2.1 AA Compliance
✅ **Keyboard Navigation**: Full tab order support  
✅ **Screen Reader Support**: ARIA labels and live regions  
✅ **Focus Indicators**: High contrast focus states  
✅ **Color Contrast**: Meets AA standards  
✅ **Semantic HTML**: Proper headings and form structure  
✅ **Live Updates**: Screen reader announcements for calculations  

### Form Accessibility
- Proper `<label>` associations
- Required field indicators
- Error handling and validation
- Fieldsets for radio button groups
- Descriptive help text

## Performance Optimizations

### JavaScript Loading
- Only loads on risk calculator pages
- Deferred loading for better page speed
- No external dependencies
- Optimized calculation algorithms

### CSS Organization
- Modular structure matches your existing system
- Only loads when needed
- Follows your established naming conventions

## Customization Options

### Modifying Risk Constants
Edit the `RISK_CONSTANTS` object in `risk-calculator.js` to adjust:
- Jurisdiction-specific values
- Industry multipliers
- Cost calculations
- Risk tier thresholds

### Styling Adjustments
Modify `_risk-calculator.css` to customize:
- Colors and branding
- Layout and spacing
- Form styling
- Results display

### Adding New Jurisdictions
1. Add jurisdiction data to `RISK_CONSTANTS.jurisdiction_defaults`
2. Add checkbox option in the template
3. Update legal frameworks in methodology section

## Integration with Contact Forms

### Connecting "Get Audit Quote" Button
Update the `openAuditForm()` function in JavaScript to:
- Open a contact modal
- Redirect to contact page
- Integrate with your preferred form plugin

### Example Integration
```javascript
window.openAuditForm = function() {
    // Redirect to contact page with calculator data
    const params = new URLSearchParams({
        source: 'risk-calculator',
        eal: Math.round(calculatedRisk.EAL_total),
        risk_tier: calculatedRisk.risk_tier
    });
    window.location.href = '/contact/?' + params.toString();
};
```

## Maintenance and Updates

### Regular Updates Needed
- **Legal frameworks**: Update when accessibility laws change
- **Cost data**: Refresh annually based on industry reports
- **Risk multipliers**: Adjust based on litigation trends

### Version Tracking
Current version: `2025-09-03-rc1`
Update the version number in both JavaScript and methodology when making changes.

## Troubleshooting

### Calculator Not Loading
1. Check browser console for JavaScript errors
2. Verify template is selected for the page
3. Confirm JavaScript file is enqueued correctly

### Styling Issues
1. Clear any caching plugins
2. Check CSS import in `main.css`
3. Verify CSS custom properties are loading

### Responsive Issues
1. Test with browser dev tools
2. Check mobile breakpoints in CSS
3. Verify viewport meta tag is present

## Support and Documentation

### Design System Reference
- All styles follow your existing `_variables.css`
- Consistent with home page component patterns
- Maintains GeneratePress compatibility

### Accessibility Resources
- WCAG 2.1 AA guidelines implemented
- Screen reader testing recommended
- Keyboard navigation fully functional

For additional customization or troubleshooting, reference your existing design system documentation and GeneratePress theme guidelines.