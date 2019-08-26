@echo off
setlocal

set ERRORLEVEL=
call %~dp0Find_File.bat cmake.exe
if "%ERRORLEVEL%"=="0" goto Found

set CMakeDir=%~dp0../../../.Build/Tools/CMake

::if exist C:\Programs\Dev\CMake\V3x11x3\bin\cmake.exe set CMAKE_PATH=C:\Programs\Dev\CMake\V3x11x3\bin
::if exist "C:\Program Files\CMake\bin\cmake.exe" set CMAKE_PATH=C:\Program Files\CMake\bin
::if exist "E:\Program Files\CMake\bin\cmake.exe" set CMAKE_PATH=E:\Program Files\CMake\bin
if exist "%CMakeDir%\bin\cmake.exe" set CMAKE_PATH=%CMakeDir%\bin

if "%CMAKE_PATH%"=="" call :DownloadCMake
if "%CMAKE_PATH%"=="" goto NotFound
set PATH=%CMAKE_PATH%;%PATH%
goto Found

:DownloadCMake
set CMakeZip=%~dp0CMake.zip
set CMakeTmp=%~dp0CMake
set UrlCMake=https://github.com/Kitware/CMake/releases/download/v3.15.2/cmake-3.15.2-win64-x64.zip

call DownloadFile.bat "%UrlCMake%" "%CMakeZip%"
call UnZipFile.bat "%CMakeZip%" "%CMakeTmp%"
RmDir "%CMakeDir%" 2>nul
move "%CMakeTmp%/cmake-3.15.2-win64-x64" "%CMakeDir%" 2>nul
RmDir "%CMakeTmp%" 2>nul
del "%CMakeZip%" 2>nul

if exist "%CMakeDir%\bin\cmake.exe" set CMAKE_PATH=%CMakeDir%\bin

exit /b

:Found
call :WhereFound cmake.exe
goto End

:NotFound
echo CMake not found
goto End

:WhereFound
echo CMake found at %~$PATH:1
exit /b

:End
endlocal