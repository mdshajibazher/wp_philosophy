
                <article class="masonry__brick entry format-gallery" data-aos="fade-up">
                        
            <?php
                if(class_exists('Attachments')) :
                $attach= new Attachments('gallery');
                if($attach->exist()) : 
                ?>
            
                        <div class="entry__thumb slider">
                            <div class="slider__slides">
                                <?php while($single_attach = $attach->get()) : ?>
                                <div class="slider__slide">
                                    <?php echo $attach->image('philosophy-home-square'); ?>
                                </div>
                                <?php endwhile; ?>
    
                            </div>
                        </div>

                <?php  endif; endif; ?>
        
                        <?php get_template_part('template-parts/common/post/summery'); ?>
        
                    </article> <!-- end article -->