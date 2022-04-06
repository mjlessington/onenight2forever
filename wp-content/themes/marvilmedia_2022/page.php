<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ColbertBall
 */

get_header(); ?>

 <!-- CONTENT
        =================================-->
       <!-- Main Content -->
        
	<section class="container-fluid about-main">
		<div class="container">
        <?php
		// Start the loop.
		while ( have_posts() ) : the_post(); 
        ?>
                        
       <?php the_content(); ?> 
                        
        <?php // End the loop.
		endwhile;
		?>
                    
                    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'marvilmedia' ),
				'after'  => '</div>',
			) );
		?>
      
		</div>
	</section>
        <!-- /CONTENT ============-->
         
         
<?php get_footer(); ?>