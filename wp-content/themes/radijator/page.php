<?php 
    get_header();
    $dir_path = get_stylesheet_directory_uri(); 
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <?php the_content();?>
  </div>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</main>

<?php get_footer();?>