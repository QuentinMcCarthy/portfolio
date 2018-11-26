# Quentin McCarthy Portfolio

## Instructions to initalise
The db_init.php file has been created specifically to initalise the required databases in the back-end using SQL. If the db_init.php file fails for whatever reason, before attempting to alter the file or manually create the databases, check that:
 - The name of the database in phpmyadmin and the DB_TABLE value in the .env file match
 - The DB_USER and DB_PASS values in the .env file are correct and the user has permissions in the database
 - The DB_HOST value in the .env file is correct (Default is localhost)
 - The database in phpmyadmin is empty (The db_init file may have created the tables, but failed further along the line.)
