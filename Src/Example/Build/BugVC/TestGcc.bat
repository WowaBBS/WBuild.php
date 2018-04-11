@echo off
set PATH=C:\MinGW\Bin\;%PATH%

del Exe\TestDepExe*.exe>nul

g++ -I Src -c Src/TestDepLib2.cpp -o Obj/TestDepLib2.obj
g++ -I Src -c Src/TestDepLib1.cpp -o Obj/TestDepLib1.obj 
g++ -I Src -c Src/TestDepLib3.cpp -o Obj/TestDepLib3.obj 
g++ -I Src -c Src/TestDepExe.cpp  -o Obj/TestDepExe.obj  

ar ruv Lib/TestDepLib2.lib Obj/TestDepLib2.obj
ar ruv Lib/TestDepLib1.lib Obj/TestDepLib1.obj
ar ruv Lib/TestDepLib3.lib Obj/TestDepLib3.obj

::exit /b

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
set Exe=Exe/TestDepExe%1%2%3.exe

set PARAMS=
set PARAMS=%PARAMS% Obj/TestDepExe.obj
set PARAMS=%PARAMS% Lib/TestDepLib%3.lib
set PARAMS=%PARAMS% Lib/TestDepLib%2.lib
set PARAMS=%PARAMS% Lib/TestDepLib%1.lib
g++ %PARAMS% -o %Exe% 2>%1%2%3.log

if not exist %Exe% goto Skip
Exe\TestDepExe%1%2%3.exe>>Res.txt
echo -%1%2%3>>Res.txt
Exe\TestDepExe%1%2%3.exe
echo -%1%2%3
:Skip

exit /b