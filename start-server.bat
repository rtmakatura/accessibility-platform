@echo off
echo Starting WordPress on localhost:8003...
cd public_html

REM Try common PHP locations
IF EXIST "C:\xampp\php\php.exe" (
    echo Using XAMPP PHP...
    C:\xampp\php\php.exe -S localhost:8003
) ELSE IF EXIST "C:\php\php.exe" (
    echo Using standalone PHP...
    C:\php\php.exe -S localhost:8003
) ELSE IF EXIST "C:\Program Files\php\php.exe" (
    echo Using Program Files PHP...
    "C:\Program Files\php\php.exe" -S localhost:8003
) ELSE (
    echo PHP not found! Please install PHP first.
    echo Download from: https://windows.php.net/download/
    echo Or install XAMPP from: https://www.apachefriends.org/
    pause
    exit /b 1
)