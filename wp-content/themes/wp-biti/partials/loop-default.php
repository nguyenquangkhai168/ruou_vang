<?php 
    get_header(); 
    $queried_object = get_queried_object(); 
    global $post;
?>
</header>
<main id="main">
    <?php 
        while (have_posts()) : the_post();
        the_content();
        endwhile;
    ?>    
</main>
<div class="clear"></div>
<?php get_footer(); ?>