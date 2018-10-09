@echo off
rem cls

set WBuild_Root=%~dp0

echo Make tasks
del "%~3" 2>nul
call "%WBuild_Root%BeginTime.bat"
call "%WBuild_Root%Compile.bat" -modules "%~1" -target %2 -tasks "%~3" -op %4
call "%WBuild_Root%EndTime.bat"

echo The end...