@echo off
echo Creating php.ini in PHP installation directory...
echo.

SET PHPDIR=C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64

REM Create php.ini in the actual PHP directory
(
echo extension_dir = "ext"
echo extension=openssl
echo extension=pdo_mysql
echo extension=mbstring
echo extension=fileinfo
echo extension=curl
echo extension=zip
echo date.timezone = UTC
) > "%PHPDIR%\php.ini"

echo php.ini created at: %PHPDIR%\php.ini
echo.
echo Verifying extensions load...
"%PHPDIR%\php.exe" -m | findstr /C:"mbstring"
if errorlevel 1 (
    echo ERROR: mbstring still not loading!
) else (
    echo SUCCESS: mbstring is now loaded!
)
echo.
echo Now run: .\start_final.bat
pause
