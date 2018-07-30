<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title()?></title>
    
    <!-- Bootstrap -->
    
    <!-- =======================================================
      Theme Name: Day
      Theme URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
    <?php wp_head();?> <!-- here requires ccs and js files-->
</head>

<body>
<header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <?php $text_header = get_option('options1')?>
                    <a href="<?php echo home_url();?>"><h1><?php echo $text_header?></h1></a>
                </div>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                        <?php
                                global $menu_args;
                                wp_nav_menu($menu_args);
                        ?>
                </div>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header-->
