<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  	<meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <!-- Main Style -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

  </head>
  <body>
        <!-- NAVBAR -->
    <div id="page">
      <div id="header">
        <a href="#menu"></a>
      </div>

      <nav id="menu">

        <?php wp_nav_menu(
          array(
            'theme_location' => 'top-menu'
          ));
        ?>

      </nav>
    </div>