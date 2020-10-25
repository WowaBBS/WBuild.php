@echo off
setlocal

if "%Php_Version%"=="" set Php_Version=7.4.1
if "%Php_Distrib%"=="" set Php_Distrib=%~dp0Tools/

set PhpDir=%~1

if "%PhpDir%"=="" set PhpDir=%Php_Distrib%Php%Php_Version:.=x%

::set UrlPhpFile=php-7.2.4-Win32-VC15-x64.zip
set UrlPhpFile=php-%Php_Version%-Win32-vc15-x64.zip
::set PhpZip=%~dp0php.zip
mkdir %Php_Distrib%Downloads\ 2>nul
set PhpZip=%Php_Distrib%Downloads\%UrlPhpFile%

set UrlPhp=https://windows.php.net/downloads/releases/archives/%UrlPhpFile%
call %~dp0DownloadFile.bat "%UrlPhp%" "%PhpZip%"
if exist "%PhpZip%" goto skip

set UrlPhp=https://windows.php.net/downloads/releases/%UrlPhpFile%
call %~dp0DownloadFile.bat "%UrlPhp%" "%PhpZip%"

:skip
call %~dp0UnZipFile.bat "%PhpZip%" "%PhpDir%"
::del "%PhpZip%" 2>nul

endlocal