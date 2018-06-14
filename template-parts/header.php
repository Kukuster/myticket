<?php
global $language_data;
$template = $page->get_page_template();


$home_page = get_page('home');
$book_train_page = get_page('book_train');
$book_plane_page = get_page('book_plane');
$contacts_page = get_page('contacts');
$login_page = get_page('login');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $page->get_page_title(); ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../inc/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../inc/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../inc/css/style.css" type="text/css" media="all">
<?php if ($template == 'book' || $template == 'seat'){ ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php } ?>
<!--[if lt IE 9]>
<script type="text/javascript" src="../inc/js/html5.js"></script>
<style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
<![endif]-->
</head>
<?php 
switch ($template){
    case 'home':
    case 'seat':
        $body_id='page1'; break;
    case 'book':
        $body_id='page3'; break;
    case 'contacts':
        $body_id='page6'; break;
    default:
        $body_id='page1'; break;
}
?>
<body id="<?php echo $body_id; ?>">
<?php  ?>
<div class="main">
  <!--header -->
  <header>
    <div class="wrapper">
      <h1><a href="<?php echo $home_page->get_url(); ?>" id="logo">AirLines</a></h1>
      <span id="slogan"><?php echo $language_data['header']['Fast, Frequent &amp; Safe Flights']; ?></span>
      <nav id="top_nav">
        <ul style="display: flex; flex-direction: row">
          <li><a href="<?php echo $home_page->get_url(); ?>" class="nav1"><?php echo $language_data['header']['Home']; ?></a></li>
          <li><a href="<?php echo $contacts_page->get_url(); ?>" class="nav3"><?php echo $language_data['header']['Contact']; ?></a></li>
          <li><a href="<?php echo $login_page->get_url(); ?>" class="nav2"><?php echo $language_data['header']['Login/Register']; ?></a></li>
          <div class="lang">
            <a href="javascript:void(0);" class="language-change" data-lang="ru">рус</a> /
            <a href="javascript:void(0);" class="language-change" data-lang="en">eng</a>
          </div>
        </ul>

      </nav>
    </div>
    <nav>
      <ul id="menu">
        <li <?php if ($page == $book_train_page){ ?> id="menu_active"<?php } ?>>
            <a href="<?php echo $book_train_page->get_url(); ?>">
                <span><span>Train</span></span>
            </a>
        </li>
        <li <?php if ($page == $book_plane_page){ ?> id="menu_active"<?php } ?>>
            <a href="<?php echo $book_plane_page->get_url(); ?>">
                <span><span>Plane</span></span>
            </a>
        </li>
        <li <?php if ($page == $contacts_page){ ?> id="menu_active"<?php } ?> class="end">
            <a href="<?php echo $contacts_page->get_url(); ?>">
                <span><span>Contacts</span></span>
            </a>
        </li>
      </ul>
    </nav>
  </header>
  <!-- / header -->
  