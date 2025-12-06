@echo off
SET PHP=C:\xampp\php\php.exe
SET INI=C:\xampp\php\php.ini

echo Generating Application Key...
"%PHP%" artisan key:generate

echo.
echo Starting Laravel Development Server...
echo Using XAMPP PHP with php.ini
echo.
"%PHP%" -c "%INI%" -S 127.0.0.1:8000 -t public
