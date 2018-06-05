@echo off
cls

setlocal

set Redirect=cscript //B ../../Redirect.js
set OutError=%0.err
set OutLog=%0.log

D:\Langs\callphp7 "Compile.php7" 2>%OutError% | %Redirect% 2>%OutLog%

endlocal
