<?php
/**
 * Template Name: Front Page
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, <?php echo get_template_directory_uri()?>/images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 ?>
<?php get_header(); ?>


        <!-- Main Content -->
<section class="container-fluid main-about" id="home-about">
		
        <div class="container">
        <div class="row about-header">
            <img src="<?php echo get_bloginfo('template_url') ?>/bootstrap/images/about-header.png" class="img-fluid img-header-title" alt="Responsive image">
        </div>
        
        <div class="row about-content">
            <div class="col-5">
            <img src="<?php echo get_bloginfo('template_url') ?>/bootstrap/images/about-top-image.png" class="img-fluid img-about-top" alt="Responsive image">
                
            <img src="<?php echo get_bloginfo('template_url') ?>/bootstrap/images/about-bottom-image.png" class="img-fluid img-about-bottom" alt="Responsive image">
        </div>
            <div class="col-7">
               <p>It all began at a mutual friend’s birthday in February of 2017. Tremayne was with her then girlfriend when they met and hit it off with Olivia. Numbers were exchanged and plans to hang out were discussed, but as fate would have it, schedules prevented them from getting together. Although they would all see each other again the following year at the same friend’s birthday, it wasn’t until 2019 that things took an unexpected turn.</p>

<p>Tremayne had arrived solo that year and through the course of conversation Olivia came to discover that she was no longer in a relationship. That conversation became a hang out after the party, and the hang out never ended. It took 3 parties, 2 years, and 1 conversation for their paths to properly align. But once these two truly connected, it wasn’t long before they knew forever was in the future. In January 2020, they made their debut as a couple and by Tremayne’s birthday on July 15, 2020, Olivia proposed.</p>

<p>They are both thrilled to continue building on the bond they share and spend the rest of their lives together. Although no one can say exactly what the future holds, if their present “couple style” is any indication, it will be an amazing ride filled with laughter, love, and laced with couture.</p> 
        </div>
        </div>
        </div>
        
	</section>
    
    
	<section class="container-fluid main-critic" id="home-critic">
		
		<img src="<?php echo get_bloginfo('template_url') ?>/bootstrap/images/critic-review.png" class="img-fluid img-host" alt="Responsive image">
	</section>

    
        <!-- /CONTENT ============-->
         
         
<?php get_footer(); ?>