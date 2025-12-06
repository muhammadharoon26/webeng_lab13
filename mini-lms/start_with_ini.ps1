$php = "C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe"
$ini = "d:\Haroon\UNI\Semester 7\Web Engineering CS344\Lab\webeng_lab11\mini-lms\custom_php.ini"

Write-Host "Generating Key with custom INI..."
& $php -c $ini artisan key:generate

Write-Host "Starting Server with custom INI..."
& $php -c $ini -S 127.0.0.1:8000 -t public
