@echo off
set Root=%~dp0
set PHP_Path=%Root%\PHP
if not exist %PHP_Path%\php.exe call %Root%\_InitPhp.bat
set PHP_File=%1
shift
%PHP_Path%\php.exe -c%PHP_Path%\ -f %PHP_File% -- %*
