@echo off
set PHP="C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe"
:: IMPORTANT: No quotes around the path here to avoid double quoting issues
set EXT=C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\ext

echo Starting Mini-LMS v2...
echo Using PHP: %PHP%
echo Using Ext: %EXT%

%PHP% -n ^
 -d extension_dir="%EXT%" ^
 -d extension=openssl ^
 -d extension=pdo_mysql ^
 -d extension=mbstring ^
 -d extension=fileinfo ^
 -d extension=curl ^
 -d extension=zip ^
 -S 127.0.0.1:8000 -t public
