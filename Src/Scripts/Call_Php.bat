@echo off

call %~dp0Find_Php.bat

setlocal

set PHP_File=%~1
shift

set Args=%1
:Parse
shift
set First=%1
if not defined First goto :EndParse
  set Args=%Args% %First%
  goto :Parse
:EndParse

set Arg=
set Arg=%Arg% -d memory_limit=256M
set Arg=%Arg% -d "extension_dir=%PHP_Path%/ext"
set Arg=%Arg% -c "%PHP_Path%"
set Arg=%Arg% -f "%PHP_File%"

"%PHP_Path%\php.exe" %Arg% -- %Args%

endlocal
