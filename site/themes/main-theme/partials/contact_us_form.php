<?php if(get_sub_field('visible')):?>
<section class="contact_us_form py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php if(get_sub_field('title')):?>
                <div class="title">
                    <?php echo get_sub_field('title')?>
                </div>
                <?php endif;?>
                <?php if(get_sub_field('text')):?>
                <div class="text">
                    <?php echo get_sub_field('text')?>
                </div>
                <?php endif;?>
                <?php if( have_rows('content_repeater') ):?>
                <div class="content">
                    <ul>
                        <?php   while( have_rows('content_repeater') ) : the_row();?>
                        <li>
                            <?php if(get_sub_field('is_link')):?>
                            <?php if(get_sub_field('link')):?>
                            <?php $link = get_sub_field('link');?>
                            <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
                                <?php if(get_sub_field('icon')):?>
                                <?php  
                     $src = null;
                     $image = get_sub_field('icon'); 
                     $image_src = wp_get_attachment_image_src( $image, 'large' );
                     $img = $image_src[0]; ?>
                                <img class="icon" src="<?php echo $img;?>">
                                <?php endif;?>
                                <?php echo $link['title'];?></a>
                            <?php endif;?>
                            <?php endif;?>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
                <?php endif;?>
            </div>
            <div class="col-12 col-md-6">
                <?php echo do_shortcode(get_sub_field('form_code'))?>
            </div>
        </div>
    </div>
</section>
<?php endif;?>