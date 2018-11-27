# Quentin McCarthy Portfolio

## Instructions to initalise
The db_init.php file has been created specifically to initalise the required databases in the back-end using SQL. If the db_init.php file fails for whatever reason, check that:
 - The name of the database in phpmyadmin and the DB_TABLE value in the .env file match
 - The DB_USER and DB_PASS values in the .env file are correct and the user has permissions in the database
 - The DB_HOST value in the .env file is correct (Default is localhost)
 - The database in phpmyadmin is empty (The db_init file may have created the tables, but failed further along the line.)

If the file still fails to create the database, follow the instructions below.

## Instructions for manual database setup
The commands to create the databases in this file are SQL commands which are sent to 'phpmyadmin' on the server. These commands will need to be manually entered into phpmyadmin under the database specified in the .env file's DB_TABLE value.

If you do not know how to login to phpmyadmin, the default username and password is 'root' and 'root'.<br />
If these do not work, you will need to contact the server host to ask for the login.

Once logged into phpmyadmin, on the left sidebar you will need to select the database you specified by clicking on its name. This will open the database and it should be empty. If the database is not empty, select the option 'check all' under the table, then click 'With selected' and in the dropdown menu select 'Drop'. It will ask you to confirm executing the query, select 'Yes'.

Once done, you will be brought back to the main database screen. In the top tabs, select 'SQL'.<br />
This will take you to a text entry form. This is where we will enter the following commands.<br />
After every command, you will need to click 'Go' in the bottom right corner.<br />
Ensure that you enter these commands EXACTLY as per instructions and that you enter them IN ORDER.<br />

These commands are for creating the 'users' table, which will contain all users for the website, though more than likely only one.

```sql
CREATE TABLE `users` (`id` tinyint(6) UNSIGNED NOT NULL, `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL, `username` varchar(25) CHARACTER SET utf8mb4 NOT NULL, `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

This command is for creating the 'root' user for the website and as such will need to be edited.<br />
Change the $email and $username as needed, DO NOT LEAVE THEM AS THEY ARE.<br />
By default, the password for the account will be 'password', however you may change that at a later time.<br />
```sql
INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES (1, '$email', '$username', '$2y$10$94Z9UvCOefe6IfkVdWcMD.T63ziMk7mU2qRmyQPxy62pTr99Sp44y');
```

```sql
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
```

These commands are for creating the 'sidebar_info' table, which will contain the code for the sidebar information on the user.

```sql
CREATE TABLE `sidebar_info` (`id` tinyint(6) UNSIGNED NOT NULL, `contentid` varchar(25) CHARACTER SET utf8mb4 NOT NULL, `content` varchar(1000) CHARACTER SET utf8mb4 NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (1, 'userImage', 'default-userimage.png');
```

Customisation of these inputs isn't implemented into the db_init.php file yet, however during manual entry of these commands please change them as follows, DO NOT LEAVE THEM AS THEY ARE.<br />
$username will be the name that shows up in the sidebar, HTML tags apply so you can use \<b\> \<em\> \<sup\> etc etc.<br />
$usercontent will be the content that shows up under the image and name, HTML tags apply.<br />
$userbehance is a link to your behance profile. Changing this to be blank will disable it if you do not have a behance profile.<br />
```sql
INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (2, 'userName', '$username');
INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (3, 'userContent', '$usercontent');
INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (4, 'userBehance', '$userbehance');
```

```sql
ALTER TABLE `sidebar_info` ADD PRIMARY KEY (`id`);
ALTER TABLE `sidebar_info` MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
```

If any of these commands fail, and you cannot confirm that they succeeded despite the error, do not continue.<br />
Create an issue upon the repository https://github.com/QuentinMcCarthy/portfolio/issues
