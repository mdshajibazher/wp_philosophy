
<?php get_header(); ?>


<!-- s-content
================================================== -->
<section class="s-content">
    
    
<div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1>Category: <?php single_cat_title(); ?></h1>

                <p class="lead"><?php echo category_description(); ?></p>
            </div>
        </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            <?php if(!have_posts()){ ?>
               <h4 style="text-align: center"> <?php  echo  __('No Post Found','philosophy'); ?></h4>
           <?php } ?>

            <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/post-formats/post', get_post_format()) ?>

            <?php endwhile; ?>
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php philosphy_pagination(); ?>
            </nav>
        </div>
    </div>

</section> <!-- s-content -->


<?php get_footer(); ?>