<?php
//routes.php expects access to some kind of Router object
//listen for a GET request ('to the homepage' and, 'here are the corresponding controller path')
$router->get('/', 'controller/index.php');
$router->get('/about', 'controller/about.php');
$router->get('/contact', 'controller/contact.php');

$router->get('/notes', 'controller/notes/index.php');
$router->get('/note', 'controller/notes/show.php');
$router->get('/note/create', 'controller/notes/create.php');
$router->post('/note/create', 'controller/notes/create.php');

$router->delete('/note', 'controller/notes/destroy.php');