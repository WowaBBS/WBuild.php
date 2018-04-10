@echo off
cls

set WBuild_Root=%~dp0

echo Make tasks
call %WBuild_Root%\BeginTime.bat
call %WBuild_Root%\Compile.bat -modules %1 -target %2 -tasks %3 -op %4
call %WBuild_Root%\EndTime.bat

if errorlevel 1 echo Error && exit /b

if not exist %3 exit /b

echo Start tasks
call %WBuild_Root%\BeginTime.bat
call %3
call %WBuild_Root%\EndTime.bat

::timeout /t 1
echo The end!!!!!!!!!!!!!!!!
exit /b
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
call %WBuild_Root%\Flush.bat
