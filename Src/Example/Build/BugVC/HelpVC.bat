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

lib /?>lib.txt
link /?>link.txt
