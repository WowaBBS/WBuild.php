@echo off
rem cls

set WBuild_Root=%~dp0

call "%WBuild_Root%Scripts/Time_Begin.bat"
call "%WBuild_Root%Scripts/Call_Php.bat" "%WBuild_Root%\Compile.php7" %*
call "%WBuild_Root%Scripts/Time_End.bat"
