<?php
/**
 * Template Name: Home 
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bellast
 */

get_header();
?>
<section class="slider-style-six">
        <div class="container">
            <div class="row">
            <?php 
            $args = array(
                'post_type' => 'post',
                'post_per_pages'     => 3,
            );

            $query = new WP_Query($args);
            while($query->have_posts()):$query->the_post();
            
            if(1 > $query->current_post){
            ?>
                <div class="col-md-8 col-sm-12 col-xs-12 first-column">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                               <?php the_post_thumbnail(); ?>
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content blog-content-one">
                                            <div class="meta-text"><?php the_category();?></div>
                                            <div class="title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                                            <div class="date"><span>On</span> <?php echo get_the_date('M j, Y') ?><i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> <?php the_author(); ?></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 column">
            <?php
             } 
            else if(3 > $query->current_post){
            ?>
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                        <?php the_post_thumbnail(); ?>
                            <div class="overlay">
                                <div class="inner-box">
                                    <div class="content blog-content-one">
                                    <div class="meta-text"><?php the_category();?></div>
                                        <div class="title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                                        <div class="date"><span>On</span> <?php echo get_the_date('M j, Y') ?><i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                    endwhile;
                         wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- blog side -->
    <section class="blog-side blog-style-one blog-style-three">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                    <div class="blog-details-content">
                        <div class="row">
                            <?php 
                                $args = array(
                                    'post_type'  => 'post',
                                );
                                $query = new WP_Query($args);
                                while($query->have_posts()):$query->the_post(); 
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="content-box overlay-item">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></figure>
                                            <div class="overlay-box">
                                                <div class="overlay-inner">
                                                    <div class="content">
                                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-content-one blog-content-two sp-six centred">
                                        <div class="top-content">
                                            <div class="meta-text"><?php the_category();?></div>
                                            <div class="title"><h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4></div>
                                            <div class="date"><span>On</span>  <?php echo get_the_date('M j, Y') ?> &nbsp;&nbsp;<i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By </span><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></div>
                                        </div>
                                        <div class="text">
                                            <p><?php the_excerpt();?></p>
                                        </div>
                                        <ul class="meta-list centred">
                                            <li><a href="<?php the_permalink(); ?>"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; <?php echo get_comments_number();?></a> &nbsp; <i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; 13</a></li>
                                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> &nbsp;Share</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php if(the_posts_pagination()){?>
                        <ul class="page-pagination page-pagination centred">
                            <?php the_posts_pagination( array(
                                    'mid_size'  => 2,
                                    'prev_text' => __( '<i class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp;PREV', 'bellast' ),
                                    'next_text' => __( 'NEXT&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i>', 'bellast' ),
                                ) ); ?>
                        </ul>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 sidebar-side">
                  <?php get_sidebar();?>

                </div>
            </div>
        </div>
    </section>
    <!-- blog side end -->
<?php
get_footer();


