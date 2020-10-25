@echo off

if "%Php_Version%"=="" set Php_Version=7.4.11

if "%Current_Php_Version%"=="%Php_Version%" goto Skip

if "%Php_Distrib%"=="" set Php_Distrib=%~dp0php\
if "%Php_Configurator_Id%"=="" set Php_Configurator_Id=Def_0
if "%Php_Configurator%"=="" set Php_Configurator=%~dp0Configurator.php7

set PHP_Path=%Php_Distrib%Php%Php_Version:.=x%
if not exist "%PHP_Path%/php.exe" if exist "%~dp0../_InitPhp.bat" call "%~dp0../_InitPhp.bat"
if not exist "%PHP_Path%/php.exe" call "%~dp0DownloadPhp.bat" "%PHP_Path%"
if not exist "%PHP_Path%/php.exe" echo %PHP_Path%/php.exe not found

if exist "%Php_Path%/Init_%Php_Configurator_Id%" goto SkipConfigure
setlocal

mkdir "%Php_Path%/Init_%Php_Configurator_Id%" 2>nul

set Arg=
set Arg=%Arg% -d "extension_dir=%PHP_Path%/ext"
set Arg=%Arg% -c "%PHP_Path%"
set Arg=%Arg% -f "%Php_Configurator%"

"%PHP_Path%\php.exe" %Arg% -- %Args%

endlocal
:SkipConfigure

set Current_Php_Version=%Php_Version%
set Call_Php=call "%~dp0call_php.bat"

:Skip
