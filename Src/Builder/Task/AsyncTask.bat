@echo off
if "%Time_Out%"=="" set Time_Out=1
echo %Task_Id% Item 1
timeout /T %Time_Out% /NOBREAK
echo %Task_Id% Item 2
if "%Task_Id%"=="C22" exit 1
timeout /T %Time_Out% /NOBREAK
echo %Task_Id% Item 3
timeout /T %Time_Out% /NOBREAK
echo %Task_Id% Item 4
timeout /T %Time_Out% /NOBREAK
echo %Task_Id% Item 5
echo Hello %Task_Id%>.Build/%Task_Id%.txt