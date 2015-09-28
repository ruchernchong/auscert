@ECHO OFF

mysql -u auscert -padmin auscertdb < auscertdb.sql

if %errorlevel% == 0 goto success
if %errorlevel% == 1 goto failure

:success
echo Database has been successfully imported.

:failure
echo Database has failed to import the file.

pause