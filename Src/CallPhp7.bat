@echo off
set Root=%~dp0
set PHP_Path=%Root%\PHP
if not exist %PHP_Path%\php.exe set PHP_Path=C:\SRV\Script\PHP\V7x2
%PHP_Path%\php.exe -c%PHP_Path%\ -f %1 -- %2 %3 %4 %5 %6 %7 %8 %9
