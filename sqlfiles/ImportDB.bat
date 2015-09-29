@ECHO OFF

mysql -u auscert -padmin auscertdb < auscertdb.sql

if ERRORLEVEL==0 goto success
if ERRORLEVEL==1 goto failure

:success
echo Database has been successfully imported.

:failure
echo Database has failed to import the file.

pause