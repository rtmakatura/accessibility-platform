# Git deployment script for ReadySetComply
Write-Host "Starting deployment process..." -ForegroundColor Green

# Add all changes
Write-Host "Adding files to git..." -ForegroundColor Yellow
git add .

# Check if there are changes to commit
$status = git status --porcelain
if ($status) {
    # Commit changes
    Write-Host "Committing changes..." -ForegroundColor Yellow
    git commit -m "Quick fixes via VS Code task - $(Get-Date -Format 'yyyy-MM-dd HH:mm')"
    
    # Push to GitHub (triggers auto-deployment)
    Write-Host "Pushing to GitHub..." -ForegroundColor Yellow
    git push origin main
    
    Write-Host "Deployment complete! Changes will be live in 2-3 minutes." -ForegroundColor Green
    Write-Host "Check your site: https://readysetcomply.com" -ForegroundColor Cyan
} else {
    Write-Host "No changes to commit." -ForegroundColor Yellow
}

Write-Host "Press any key to continue..." -ForegroundColor Gray
Read-Host
