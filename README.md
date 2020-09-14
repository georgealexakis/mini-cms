# Mini CMS

Mini CMS is a tiny CMS project, that enables the management of a simple website.
Just add the arrays to your website and edit the texts from the administrator panel.
Firstly, you should setup the database and accsess the panel.

## Installation

1. Copy and paste mini-cms files to the root folder (mini-cms folder, img folder, mc-login.php file).
2. Create database with mini-cms and insert tables and data from mini-cms.sql.
3. Modify default server information from mini-cms/db_information.php.

`$servername = "localhost";`

`$dbadmin_name = "root";`

`$dbadmin_password = "";`

`$dbname = "mini-cms";`

4. Add the following php code at the top of your website files.

`<?php`

`include('mini-cms/db_information.php');`

`include('mini-cms/login.php');`

`include('mini-cms/retrieve-photos.php');`

`include('mini-cms/retrieve-texts.php');`

`?>`

5. Add <?php echo $text[i]; ?> for website texts (1<=i<=20).
6. Add <?php echo $url[i]; ?> for image url, <?php echo $category[i]; ?> for image category and <?php echo $name[i]; ?> for image name (1<=i<=6).
7. Browse to /mc-login.php to login with default credentials username: example@gmail.com and password:1234.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
