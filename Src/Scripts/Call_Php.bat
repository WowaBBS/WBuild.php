@echo off

call %~dp0Find_Php.bat

setlocal

set Php_File=%~1
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
set Arg=%Arg% -d memory_limit=512M
set Arg=%Arg% -d "extension_dir=%Php_Path%/ext"
set Arg=%Arg% -c "%Php_Path%"
set Arg=%Arg% -f "%Php_File%"

"%Php_Path%\php.exe" %Arg% -- %Args%

endlocal
