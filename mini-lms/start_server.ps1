$php = "C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe"
$extDir = "C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\ext"

& $php -d extension_dir="$extDir" `
    -d extension=openssl `
    -d extension=pdo_mysql `
    -d extension=mbstring `
    -d extension=fileinfo `
    -d extension=curl `
    -d extension=zip `
    -S 127.0.0.1:8000 -t public
