
if "%Php_Version%"=="" set Php_Version=7.4.11
::if "%Php_Ver_Nts%"=="" set Php_Ver_Nts=-nts
set Php_Ver_Nts=
set Php_Path=%Php_Distrib%Php%Php_Version:.=x%%Php_Ver_Nts%
