@echo off
echo Creating directory junction for PHP extensions...
echo This allows PHP to find extensions at C:\php\ext

REM Create C:\php if it doesn't exist
if not exist "C:\php" mkdir "C:\php"

REM Create junction pointing to actual ext directory
mklink /J "C:\php\ext" "C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\ext"

echo.
echo Junction created successfully!
echo.
echo Now run: .\start_final.bat
pause
