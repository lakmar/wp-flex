<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Typekit Asynchronous Snippet -->
<!--<script src="<?php /*uncomment for tk glory => */ /*echo get_template_directory_uri();*/ ?>/js/tk-async.js"></script>-->
<!-- End Typekit Asynchronous Snippet -->

<!-- character encoding utf-8 -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- google chrome frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">

<!-- title -->
<title><?php 
if( function_exists( 'is_tag' ) && is_tag() ) : single_tag_title( 'Tag Archive for &quot;' ); echo '&quot; - '; 
elseif( is_archive() ) :
esc_attr( wp_title( '' ) ); echo 'Archive -';
elseif( is_search() ) :
echo 'Search for &quot;' . wp_specialchars( $s ) . '&quot; -';
elseif( !( is_404() ) && ( is_single() ) || ( is_page() ) ) :
esc_attr( wp_title( '' ) ); echo '-';
elseif( is_404() ) :
echo 'Not Found -';
endif;
if( is_home() ):
esc_attr( bloginfo( 'name' ) ); esc_attr( bloginfo( 'description' ) ); esc_attr( wp_title() );
else :
esc_attr( bloginfo( 'name' ) );
endif;
if( $paged > 1 ) :
echo '-page' . $paged;
endif;
?></title>

<!-- search engine robots meta instructions -->
<?php if ( is_search() || is_404() ) : ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="all">
<?php endif; ?>

<!-- index search meta data -->
<?php if ( is_home() ) : ?>
<meta name="description" content="<?php esc_attr( bloginfo( 'name' ) ); esc_attr( bloginfo( 'description' ) ); ?>">

<!-- single page meta tag description -->
<?php elseif ( is_single() ) : ?>
<meta name="description" content="<?php esc_attr( wp_title() ) ?>">

<!-- archive pages meta tag description -->
<?php elseif ( is_archive() ) : ?>
<meta name="description" content="">

<?php elseif ( is_search() ) : ?>
<meta name="" content="<?php wp_specialchars( $s ) ?>">

<!-- fallback meta tag description -->
<?php else : ?>
<meta name="description" content="<?php esc_attr( bloginfo( 'name' ) ); esc_attr( bloginfo( 'description' ) ) ?>">
<?php endif; ?>

<!-- Mobile viewport optimized: h5bp.com/viewport -->
<meta name="viewport" content="width=device-width">

<!-- http://t.co/dKP3o1e -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

<!-- Sets whether a web application runs in full-screen mode -->
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- open graph meta tags -->
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="">
<meta property="fb:admins" content="">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
<!-- base css -->
<link rel="stylesheet" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!-- IE7 css -->
<!--[if IE7]><link rel="stylesheet" media="screen" href="<?php bloginfo( 'stylesheet_directory' ) ?>/css/ie7.css"><![endif]-->
<!-- IE8 css -->
<!--[if IE 8]><link rel="stylesheet" media="screen" href="<?php bloginfo( 'stylesheet_directory' ) ?>/css/ie8.css"><![endif]-->

<!-- pingback url -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- RSS Feed -->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo( 'rss2_url' ); ?>" />

<!-- All JavaScript at the bottom, except this Modernizr. Modernizr enables HTML5 elements & feature detects; 
         for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr.js"></script>
<?php //required comment functionality ?>
<?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php comments_popup_script(); ?>
<?php wp_head(); //required for all wordpress themes and placed at the end of the head tag element ?>
</head>

<!-- body element tag -->
<?php if ( is_single() ) : ?>
<body <?php body_class(); ?> id="themename-single">
<?php elseif ( is_home() ) : ?>
<body <?php body_class(); ?> id="themename-index">
<?php else : ?>
<body <?php body_class(); ?> id="themename-<?php the_title(); ?>">
<?php endif; ?>
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<header role="banner">
  <?php 
	  	//Custom header
		// Check if this is a post or page, if it has a thumbnail, and if it's a big one
		if ( is_singular() && has_post_thumbnail( $post->ID ) && ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' )) && $image[1] >= HEADER_IMAGE_WIDTH ) : ?>
  <?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'usemap' => '#Map' ) ); // We have a new header image! ?>
  <h1><a href="<?php echo home_url();  ?>"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
  <h2><?php echo esc_attr( bloginfo( 'description' ) ); ?></h2>
  <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" usemap="#Map" />
  <?php else : ?>
  <h1><a href="<?php echo home_url();  ?>"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
  <h2><?php echo esc_attr( bloginfo( 'description' ) ); ?></h2>
  <?php endif; ?>
  <!-- end header custom image -->
  
  <!-- http://codex.wordpress.org/Function_Reference/wp_nav_menu -->
  <nav role="navigation">
    <ol>
      <?php 
		//wp_list_pages arguments as an array
		$nav_themename = array(
							   'depth'        	=> 2,
							   'show_date'    	=> '',
							   'date_format'  	=> get_option( 'date_format' ),
							   'child_of'     	=> 0,
							   'exclude'      	=> '',
							   'include'      	=> '',
							   'title_li'     	=> '',
							   'echo'         	=> 1,
							   'authors'      	=> '',
							   'sort_column'  	=> 'menu_order',
							   'link_before'  	=> '',
							   'link_after'   	=> '',
							   'walker' 		=> '' 
							); ?>
      <?php 
		  //begin wp_list_pages loop
		  if( wp_list_pages($nav_themename) ) : while ( wp_list_pages( $nav_themename ) ) : 
	   ?>
      <?php wp_list_pages( $nav_themename ); //list items from the array above ?>
      <?php endwhile; //end while wp_list_pages ?>
      <?php endif; //end if wp_list_pages ?>
    </ol>
  </nav>
  <?php //endif; ?>
</header>
<article><a href="<?php bloginfo('rss2_url') ?>">RSS Feed</a></article>

<?php //required call for search-form ?>
<?php get_search_form(); ?>