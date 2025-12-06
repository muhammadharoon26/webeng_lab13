@echo off
echo Using XAMPP PHP (all extensions enabled)...
"C:\xampp\php\php.exe" artisan key:generate
"C:\xampp\php\php.exe" -S 127.0.0.1:8000 -t public
