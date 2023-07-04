<?php
session_start();
$conn = mysqli_connect("fdb1028.awardspace.net", "4261838_spletnoprogramiranje", "MilanRadic4102", "4261838_spletnoprogramiranje");
//Admin authentication
$config['admin_username'] = 'admin';
$config['admin_password']= 'root123';
$config['admin_repassword']= 'root123';


//Modul default values
$config['default_admin_page'] = 'users.php';
$config['default_admin_page_action'] = 'view';


//DB info
$config['db_hostname'] = "fdb1028.awardspace.net";
$config['db_username'] = "4261838_spletnoprogramiranje";
$config['db_password'] = "MilanRadic4102";
$config['db_name'] = "4261838_spletnoprogramiranje";