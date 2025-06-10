<?php if (get_sub_field('visible')) : ?>
<div class="image_with_title_and_text py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 <?php if(!get_sub_field('image_left')):?>order-md-last<?php endif;?>">
                <?php if(get_sub_field('image')):?>
        <?php  
                     $src = null;
                     $image = get_sub_field('image'); 
                     $image_src = wp_get_attachment_image_src( $image, 'large' );

                     $img = $image_src[0]; ?>
                 <div class="image-wrapper position-relative">
            <div class="hero-overlay"></div>
            <img class="img-fluid" src="<?php echo $img; ?>">
        </div>
        <?php endif;?>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="content">
                    <div class="col-12">
                    <?php if(get_sub_field('title')): ?>
                    <h2 class="title py-2"><?php echo esc_html(get_sub_field('title')); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <?php if(get_sub_field('text')): ?>
                    <div class="text  pt-2 py-5"><?php echo get_sub_field('text'); ?></div>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>