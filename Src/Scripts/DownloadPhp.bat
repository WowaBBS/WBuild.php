@echo off
setlocal

call %~dp0_Php_Env.bat

if "%Php_Distrib%"==""  set Php_Distrib=%~dp0Tools/
if "%Php_OS%"==""       set Php_OS=Win32
if "%Php_OS_Type%"==""  set Php_OS_Type=x64

if "%Php_Compiler%"=="" if "%Php_Version:~0,1%"=="8" set Php_Compiler=vs16
if "%Php_Compiler%"=="" set Php_Compiler=vc15

mkdir %Php_Distrib%Downloads\ 2>nul

set Php_Store_Url=https://windows.php.net/downloads

call %~dp0_DownloadPhp.bat releases/archives
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat releases
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat qa RC5
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat qa RC4
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat qa RC3
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat qa RC2
if exist "%Php_File_Zip%" goto skip

call %~dp0_DownloadPhp.bat qa RC1
if exist "%Php_File_Zip%" goto skip

:skip
call %~dp0UnZipFile.bat "%Php_File_Zip%" "%Php_Path%"
::del "%Php_File_Zip%" 2>nul

endlocal