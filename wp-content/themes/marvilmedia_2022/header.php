<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package marvilmedia
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Bootstrap core CSS -->


<?php wp_head(); ?>


<!-- FontAwesome Icons -->
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    </head>
    

<?php if( $options = get_option('marvilmedia_theme_options') ): ?>
<style>
<?php echo $options['customcss']; ?>
</style>
<?php else: ?>
<?php endif; ?>  

<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){

	$('img').each(function(){ 
		$(this).removeAttr('width')
		$(this).removeAttr('height');
	});

});
  </script>
    </head>
<?php
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
?>

<body id="<?php echo $dir ?>" <?php body_class(); ?>>
    
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
  <i class="fa fa-arrow-up"></i>
</button>	
	
	
<!-- Header Section -->
	
	<section class="container-fluid main-intro" id="home-intro">
        
                
<!--Navbar-->
<nav class="navbar fixed-top">
    
<div class="container-fluid">
    
  <!-- Collapse button -->
  <button class="navbar-toggler ml-auto mr-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
    aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="white-text">menu <i class="fa fa-bars" aria-hidden="true"></i></span></button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent15">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#home-intro" data-toggle="collapse" data-target=".navbar-collapse.show">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#home-about" data-toggle="collapse" data-target=".navbar-collapse.show">About The Film</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://onenighttoforever.rsvpify.com" target="_blank">Experience Curacao</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://onenighttoforeverpremiere.rsvpify.com/" target="_blank">Experience The Premiere</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#home-critic" data-toggle="collapse" data-target=".navbar-collapse.show">Critic Reviews</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#home-credits" data-toggle="collapse" data-target=".navbar-collapse.show">Credits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/onenighttoforever/" target="_blank">Follow on IG</a>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->
</div>
    
    
</nav>
<!--/.Navbar--> 
        
        
    
		<img src="<?php echo get_bloginfo('template_url') ?>/bootstrap/images/intro-image.png" class="img-fluid img-intro" alt="Responsive image">
        
        <div class="button-wrapper">
        <a class="btn btn-lg btn-primary btn-curacao" href=" https://onenighttoforever.rsvpify.com" role="button" target="_blank">EXPERIENCE CURACAO</a>
        <a class="btn btn-lg btn-primary btn-premiere" href="https://www.eventbrite.com/e/291607996367" role="button" target="_blank">EXPERIENCE THE PREMIERE</a>
        </div>
	</section>    
    
    
        <!-- /header container-->