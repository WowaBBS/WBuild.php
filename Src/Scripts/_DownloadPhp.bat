
set Php_Store_Type=%1
set Php_RC=%2

::set Php_Name_Zip=php-7.2.4-Win32-VC15-x64.zip
set Php_Name_Zip=php-%Php_Version%%Php_RC%%Php_Ver_Nts%-%Php_OS%-%Php_Compiler%-%Php_OS_Type%.zip
set Php_File_Zip=%Php_Distrib%Downloads\%Php_Name_Zip%
set Php_Url=%Php_Store_Url%/%Php_Store_Type%/%Php_Name_Zip%

call %~dp0DownloadFile.bat "%Php_Url%" "%Php_File_Zip%"
