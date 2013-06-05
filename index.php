<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>

<div class="main">
  <div class="mastheadmain">
    <div class="container">
      <div class="row heading">
          <!-- <h1 class="bg">Buffalo Skating Club</h1> -->
          <h3 class="bg">
            <?php $tagline = get_bloginfo('description');
                  $split = explode(" ", $tagline);
                  for ($i=0; $i < count($split)/2; $i++) {
                    echo $split[$i] . " ";
                  }
            ?>
        </h3>

         <h3 class="bg">
            <?php $tagline = get_bloginfo('description');
                  $split = explode(" ", $tagline);
                  for ($i=count($split)/2; $i < count($split); $i++) {
                    echo $split[$i] . " ";
                  }
            ?>
        </h3>

        <a href="<?php echo get_permalink(361); ?>"><div class="invisbut">Learn More <i class="icon-angle-right"></i></div></a>
        </div>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <div class="span12">
       <?php
        // Blog post query
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
        if (have_posts()) : while ( have_posts() ) : the_post(); ?>

        <div <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
          <p class="meta"><?php echo bootstrapwp_posted_on();?></p>
          <div class="row">
            <div class="span12">
              <?php the_excerpt();?>
            </div>
          </div><!-- /.row -->
          <hr />
        </div><!-- /.post_class -->
        <?php endwhile; endif;?>
    </div>
  </div>
</div>

<?php get_footer(); ?>