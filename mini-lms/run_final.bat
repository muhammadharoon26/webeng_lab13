@echo off
set PHP="C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\php.exe"
set EXT="C:\Users\mharo\Downloads\Apps\php-8.4.15-nts-Win32-vs17-x64\ext"

echo Starting Mini-LMS...
%PHP% -c "d:\Haroon\UNI\Semester 7\Web Engineering CS344\Lab\webeng_lab11\mini-lms\custom_php.ini" -S 127.0.0.1:8000 -t public
