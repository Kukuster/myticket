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

uri parameters
$_SERVER['QUERY_STRING']


*/

global $site_url;

if (isset($_SERVER['REQUEST_SCHEME']) && !empty($_SERVER['REQUEST_SCHEME']) && isset($_SERVER['SERVER_NAME']) && !empty($_SERVER['SERVER_NAME'])){
    $site_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
}






//// load libs
include_once 'libs/fpdf181/fpdf.php';









//// DB initialization
myticket_class_initialize();









//// Pages
require_once 'page.php';
global $pages;
$pages=array();


/// add_page(id, name, url,
///     template,
///     title,
///     [settings]
///);

add_page(1, 'home', '',
    'home',
    'MyTicket'
);

add_page(2, 'contacts', 'contacts',
    'contacts',
    'MyTicket | Contacts'
);

add_page(3, 'login', 'login',
    'login',
    'MyTicket | Log In'
);

add_page(4, 'book_train', 'book',
    'book',
    'MyTicket | Book Train',
    array(
        'filter_title'=>'Trains',
        'filter_subtitle'=>'Outbound routes',
        'vt_id'=>1,
        'route_image_filename'=>'train.png'
    )
);

add_page(5, 'book_plane', 'book-flight',
    'book',
    'MyTicket | Book Flight',
    array(
        'filter_title'=>'Planes',
        'filter_subtitle'=>'Outbound flights',
        'vt_id'=>2,
        'route_image_filename'=>'plane-icon_sq64.png'
    )
);

add_page(6, 'seat', 'seat',
    'seat',
    'MyTicket | Choose your seat'
);

add_page(7, 'payment', 'payment',
    'payment',
    'MyTicket | Payment'
);

add_page(8, 'payment_post', 'payment_post',
    'payment_post',
    'MyTicket | Processing payment...'
);

add_page(9, 'thank-you-purchased', 'thank-you-purchased',
    'thank-you-purchased',
    'MyTicket | Thank you!'
);

add_page(10, 'download-file', 'download-file',
    'download-file',
    'MyTicket | File'
);




//// Routing
$loaded_page = NULL;

foreach ($pages as $page){
    if (!$loaded && $page->is_requested_page($_SERVER['REDIRECT_URL'])){
        $page->load_page();
        $loaded_page = $page;
    }
}

global $page;
$page = $loaded_page;

if (!$page){
    http_response_code(404);
    get_template('404');
    die();
}




/**/
