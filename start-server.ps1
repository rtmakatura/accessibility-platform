# PowerShell script to start WordPress on localhost:8003

Write-Host "Starting WordPress on localhost:8003..." -ForegroundColor Green
Set-Location -Path "public_html"

# Check for PHP in common locations
$phpLocations = @(
    "C:\xampp\php\php.exe",
    "C:\php\php.exe",
    "C:\Program Files\php\php.exe",
    "C:\wamp64\bin\php\php7.4.33\php.exe",
    "C:\wamp\bin\php\php7.4.33\php.exe"
)

$phpPath = $null
foreach ($location in $phpLocations) {
    if (Test-Path $location) {
        $phpPath = $location
        Write-Host "Found PHP at: $location" -ForegroundColor Yellow
        break
    }
}

if ($phpPath) {
    Write-Host "Server starting at http://localhost:8003" -ForegroundColor Cyan
    Write-Host "Press Ctrl+C to stop the server" -ForegroundColor Yellow
    & $phpPath -S localhost:8003
} else {
    Write-Host "PHP not found! Please install PHP first." -ForegroundColor Red
    Write-Host "Options:" -ForegroundColor Yellow
    Write-Host "1. Download XAMPP from: https://www.apachefriends.org/" -ForegroundColor White
    Write-Host "2. Download PHP from: https://windows.php.net/download/" -ForegroundColor White
    Write-Host "3. Install via Chocolatey: choco install php" -ForegroundColor White
    Read-Host "Press Enter to exit"
}