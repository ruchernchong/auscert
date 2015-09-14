Programming Language: PHP by using CodeIgniter
Data Storage: MySQL database

Application Deployment Procedures

1. Find the auscertdb.sql file, which is the mysql database backup file in the main folder. 
2. Create a database named "auscertdb" and import with the auscertdb.sql file.
3. configure the database connection information by going to /application/config/database.php and there are instructions about how to configure the host, username and password in the file.
4. deploy the whole folder as the web application.