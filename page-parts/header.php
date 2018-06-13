<?php 
global $template, $page_title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $page_title; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="../inc/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../inc/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../inc/css/style.css" type="text/css" media="all">
<?php if ($template == 'book'){ ?>
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
<div class="main">
  <!--header -->
  <header>
    <div class="wrapper">
      <h1><a href="/" id="logo">AirLines</a></h1>
      <span id="slogan">Fast, Frequent &amp; Safe Flights</span>
      <nav id="top_nav">
        <ul style="display: flex; flex-direction: row">
          <li><a href="/" class="nav1">Home</a></li>
          <li><a href="/contacts" class="nav3">Contact</a></li>
          <li><a href="/login" class="nav2">Вход/Регистр</a></li>
          <div class="lang">
            <a href="#">рус</a> /
            <a href="#">eng</a>
          </div>
        </ul>

      </nav>
    </div>
    <nav>
      <ul id="menu">
        <li <?php if ($template == 'about-us'){ ?> id="menu_active"<?php } ?>><a href="/about-us"><span><span>About</span></span></a></li>
        <li <?php if ($template == 'book'){ ?> id="menu_active"<?php } ?>><a href="/book"><span><span>Book</span></span></a></li>
        <li <?php if ($template == 'contacts'){ ?> id="menu_active"<?php } ?> class="end"><a href="/contacts"><span><span>Contacts</span></span></a></li>
      </ul>
    </nav>
  </header>
  <!-- / header -->
  