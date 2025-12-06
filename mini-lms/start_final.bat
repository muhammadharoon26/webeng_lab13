@echo off
echo ================================================
echo Mini-LMS Startup Script
echo ================================================
echo.
echo Stopping any existing PHP servers...
taskkill /F /IM php.exe 2>nul
timeout /t 2 /nobreak >nul

SET PHP=C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe

echo Verifying PHP version and extensions...
"%PHP%" -v
echo.
"%PHP%" -m | findstr /C:"mbstring"
if errorlevel 1 (
    echo ERROR: mbstring extension not loaded!
    echo.
    echo Please ensure C:\php\ext junction exists and points to:
    echo C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\ext
    pause
    exit /b 1
)

echo mbstring IS LOADED!
echo.
echo Generating Application Key...
"%PHP%" artisan key:generate

echo.
echo Starting Development Server...
echo Visit: http://127.0.0.1:8000/courses
echo.
"%PHP%" -S 127.0.0.1:8000 -t public
