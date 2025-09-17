# Direct SiteGround deployment script for ReadySetComply
Write-Host "Starting direct deployment to SiteGround..." -ForegroundColor Green

# Set SSH key path
$sshKey = "siteground-key"

# Your SiteGround server details (you'll need to update these)
$server = "your-domain.com"  # Replace with your actual domain
$username = "your-username"  # Replace with your SiteGround SSH username
$remotePath = "~/public_html/wp-content/themes/generatepress-child/"

Write-Host "Deploying accessibility auditing page files..." -ForegroundColor Yellow

# Deploy page template
Write-Host "Uploading page template..." -ForegroundColor Cyan
scp -i $sshKey "public_html/wp-content/themes/generatepress-child/page-accessibility-auditing.php" "${username}@${server}:${remotePath}"

# Deploy updated functions.php
Write-Host "Uploading functions.php..." -ForegroundColor Cyan
scp -i $sshKey "public_html/wp-content/themes/generatepress-child/functions.php" "${username}@${server}:${remotePath}"

# Deploy CSS files
Write-Host "Uploading CSS files..." -ForegroundColor Cyan
scp -i $sshKey -r "public_html/wp-content/themes/generatepress-child/assets/css/" "${username}@${server}:${remotePath}assets/"

# Deploy JavaScript files  
Write-Host "Uploading JavaScript files..." -ForegroundColor Cyan
scp -i $sshKey -r "public_html/wp-content/themes/generatepress-child/assets/js/" "${username}@${server}:${remotePath}assets/"

# Deploy updated home page template
Write-Host "Uploading home page template..." -ForegroundColor Cyan
scp -i $sshKey "public_html/wp-content/themes/generatepress-child/page-templates/page-custom-home.php" "${username}@${server}:${remotePath}page-templates/"

Write-Host "Deployment complete!" -ForegroundColor Green
Write-Host "Your accessibility auditing page should now be live!" -ForegroundColor Green
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "1. Go to your WordPress admin: https://your-domain.com/wp-admin" -ForegroundColor White
Write-Host "2. Create a new page called 'Accessibility Auditing'" -ForegroundColor White  
Write-Host "3. Set the template to 'Accessibility Auditing'" -ForegroundColor White
Write-Host "4. Set the permalink to 'accessibility-auditing'" -ForegroundColor White
Write-Host "5. Publish the page" -ForegroundColor White
Write-Host ""
Write-Host "Your page will be available at: https://your-domain.com/accessibility-auditing/" -ForegroundColor Cyan

Write-Host "Press any key to continue..." -ForegroundColor Gray
Read-Host