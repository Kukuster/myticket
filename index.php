<?php

require_once 'functions.php';
require_once 'config.php';


//debug($_SERVER);
/*
http status:
$_SERVER['REDIRECT_STATUS']

uri (without domain):
$_SERVER['REQUEST_URI']

uri without parameters
$_SERVER['REDIRECT_URL']


*/


//// initializing DB
myticket_class_initialize();


//// Routing
global $template;
global $page_title;

switch ($_SERVER['REDIRECT_URL']){
    case '':
    case '/':
    case '/home':
    case '/home/':
        $template='home';
        $page_title='MyTicket';
        break;
    
    case '/about-us':
    case '/about-us/':
        $template='about-us';
        $page_title='MyTicket | About Us';
        break;
    
    case '/contacts':
    case '/contacts/':
        $template='contacts';
        $page_title='MyTicket | Contacts';
        break;
    
    case '/login':
    case '/login/':
        $template='login';
        $page_title='MyTicket | Log In';
        break;
    
    case '/book':
    case '/book/':
        $template='book';
        $page_title='MyTicket | Book';
        break;
    
    default:
        http_response_code(404);
        include_once 'pages/404.php';
        die();
        break;
    
}




get_template($template);


