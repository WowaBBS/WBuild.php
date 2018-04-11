@echo off
:::call "C:/Program Files (x86)/Microsoft Visual Studio 14.0/VC\bin\vcvars32.bat"
:::call "C:/Program Files (x86)/Microsoft Visual Studio 14.0/VC\bin\amd64\vcvars64.bat"
::call "C:/Program Files (x86)/Microsoft Visual Studio 14.0/VC\bin\amd64_x86\vcvarsamd64_x86.bat"
:::call "C:/Program Files (x86)/Microsoft Visual Studio 14.0/VC\bin\x86_amd64\vcvarsx86_amd64.bat"
::call "C:/Program Files (x86)/Microsoft Visual Studio/2017/Community/VC\Auxiliary\Build\vcvars32.bat"
::call "C:/Program Files (x86)/Microsoft Visual Studio/2017/Community/VC\Auxiliary\Build\vcvars64.bat"
::call "C:/Program Files (x86)/Microsoft Visual Studio/2017/Community/VC\Auxiliary\Build\vcvarsamd64_x86.bat"
::call "C:/Program Files (x86)/Microsoft Visual Studio/2017/Community/VC\Auxiliary\Build\vcvarsx86_amd64.bat"
call "C:/Program Files (x86)/Microsoft Visual Studio 10.0/VC\bin\vcvars32.bat"

mkdir Exe 2>nul
mkdir Obj 2>nul
mkdir Lib 2>nul
del Exe\TestDepExe*.exe>nul

cl /nologo /Zi /Gm -I Src -c Src/TestDepLib2.cpp /FoObj/TestDepLib2.obj /FdObj/v140.pdb
cl /nologo /Zi /Gm -I Src -c Src/TestDepLib1.cpp /FoObj/TestDepLib1.obj /FdObj/v140.pdb
cl /nologo /Zi /Gm -I Src -c Src/TestDepLib3.cpp /FoObj/TestDepLib3.obj /FdObj/v140.pdb
cl /nologo /Zi /Gm -I Src -c Src/TestDepExe.cpp  /FoObj/TestDepExe.obj  /FdObj/v140.pdb

lib /nologo Obj/TestDepLib2.obj /OUT:Lib/TestDepLib2.lib /NODEFAULTLIB
lib /nologo Obj/TestDepLib1.obj /OUT:Lib/TestDepLib1.lib /NODEFAULTLIB
lib /nologo Obj/TestDepLib3.obj /OUT:Lib/TestDepLib3.lib /NODEFAULTLIB

echo --->Res.txt

call :Comp 1 2 3
call :Comp 1 3 2
call :Comp 2 1 3
call :Comp 2 3 1
call :Comp 3 1 2
call :Comp 3 2 1
exit /b

:Comp
Rem Build TestDepExe
::lib /?>lib.txt
::link /?>link.txt
::link @"D:\Proj\Engine\CPP\Comp\WBuild\Example\Build\TT\TestDepExe.Opt"
set Exe=Exe/TestDepExe%1%2%3.exe

set PARAMS=
::set PARAMS=%PARAMS% libcpmt.lib
::set PARAMS=%PARAMS% msvcprt.lib
::set PARAMS=%PARAMS% msvcurt.lib
set PARAMS=%PARAMS% Lib/TestDepLib%1.lib
set PARAMS=%PARAMS% Lib/TestDepLib%2.lib
set PARAMS=%PARAMS% Lib/TestDepLib%3.lib
set PARAMS=%PARAMS% Obj/TestDepExe.obj
::set PARAMS=%PARAMS% /VERBOSE:LIB
set PARAMS=%PARAMS% /VERBOSE
::set PARAMS=%PARAMS% /ENTRY:_main
::set PARAMS=%PARAMS% /NODEFAULTLIB
link /nologo %PARAMS% /OUT:%Exe% >%1%2%3_link.log

set PARAMS=
set PARAMS=%PARAMS% Obj/TestDepExe.obj
set PARAMS=%PARAMS% Lib/TestDepLib%3.lib
set PARAMS=%PARAMS% Lib/TestDepLib%2.lib
set PARAMS=%PARAMS% Lib/TestDepLib%1.lib
::set PARAMS=%PARAMS% libcpmt, LIBCMT, OLDNAMES
::C:\MinGW\Bin\g++ %PARAMS% -o %Exe% 2>%1%2%3_gpp.log


if not exist %Exe% goto Skip
Exe\TestDepExe%1%2%3.exe>>Res.txt
echo -%1%2%3>>Res.txt
Exe\TestDepExe%1%2%3.exe
echo -%1%2%3
:Skip

exit /b