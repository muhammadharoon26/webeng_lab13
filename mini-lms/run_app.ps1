$php = "C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe"
# Use forward slashes to avoid escaping issues
$ext = "C:/Users/mharo/Downloads/Apps/php-8.4.15-nts-Win32-vs17-x64/ext"

Write-Host "Starting Mini-LMS..."
Write-Host "Using Extension Dir: $ext"

# -n : No php.ini (ignores default configs)
# -d : Define INI entry
& $php -n `
    -d extension_dir="$ext" `
    -d extension=php_openssl.dll `
    -d extension=php_pdo_mysql.dll `
    -d extension=php_mbstring.dll `
    -d extension=php_fileinfo.dll `
    -d extension=php_curl.dll `
    -d extension=php_zip.dll `
    -S 127.0.0.1:8000 -t public
