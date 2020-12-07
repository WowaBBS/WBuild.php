@echo off

call %~dp0_Php_Env.bat

if "%Current_Php_Version%"=="%Php_Version%" goto Skip

if "%Php_Distrib%"=="" set Php_Distrib=%~dp0php\
if "%Php_Configurator_Id%"=="" set Php_Configurator_Id=Def_0
if "%Php_Configurator%"=="" set Php_Configurator=%~dp0Configurator.php7

if not exist "%Php_Path%/php.exe" if exist "%~dp0../_InitPhp.bat" call "%~dp0../_InitPhp.bat"
if not exist "%Php_Path%/php.exe" call "%~dp0DownloadPhp.bat"
if not exist "%Php_Path%/php.exe" echo %Php_Path%/php.exe not found

if exist "%Php_Path%/Init_%Php_Configurator_Id%" goto SkipConfigure
setlocal

mkdir "%Php_Path%/Init_%Php_Configurator_Id%" 2>nul

set Arg=
set Arg=%Arg% -d "extension_dir=%Php_Path%/ext"
set Arg=%Arg% -c "%Php_Path%"
set Arg=%Arg% -f "%Php_Configurator%"

"%Php_Path%\php.exe" %Arg% -- %Args%

endlocal
:SkipConfigure

set Current_Php_Version=%Php_Version%
set Call_Php=call "%~dp0call_php.bat"

:Skip
