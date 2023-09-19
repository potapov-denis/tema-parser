-- create the databases
CREATE DATABASE IF NOT EXISTS temaparser_db;

-- create the users for each database
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `temaparser_db`.* TO 'root'@'%' identified by 'temaparser_password';

FLUSH PRIVILEGES;