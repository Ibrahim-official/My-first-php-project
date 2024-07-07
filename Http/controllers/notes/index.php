<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(\Core\Database::class);

/*   It initializes a 'new' Database object.
    The constructor of the Database class is called with a parameter $config['database'].
    $config['database'] is an array holding configuration settings for your application(containing database connection parameters such as hostname, username, password, and database name.)
    This array is passed to the constructor to configure the database connection within the Database object.*/

$notes = $db->query('SELECT * FROM `notes` WHERE User_id = 1')->get();

view("notes/index.view.php", [
	'heading' => 'My Notes',
	'notes' => $notes,
	'limit' => 70
]); 