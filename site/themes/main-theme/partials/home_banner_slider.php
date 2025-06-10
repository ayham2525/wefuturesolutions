<?php if (get_sub_field('visible')) : ?>
<section class="home_banner_slider">
    <?php if( have_rows('content_repeater') ): ?>
    <div class="owl-carousel owl-theme">
        <?php while( have_rows('content_repeater') ) : the_row(); ?>
            <?php if(get_sub_field('image')): ?>
                <?php  
                    $image = get_sub_field('image'); 
                    $image_src = wp_get_attachment_image_src($image, 'full');
                    $img = $image_src[0]; 
                ?>
                <div class="item" style="background-image: url('<?php echo $img; ?>'); background-size: cover; background-position: center; height: 100vh;">
                  <div class="slider-caption">
                        <?php if(get_sub_field('title')):?>
                            <h1 class="title"><?php echo get_sub_field('title');?></h1>
                        <?php endif;?>
                              <?php if(get_sub_field('text')):?>
                            <div class="text"><?php echo get_sub_field('text');?></div>
                        <?php endif;?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>

<script>
jQuery(document).ready(function ($) {
    const autoplayTime = 3000;

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: autoplayTime,
        autoplayHoverPause: true,
        dots: true,
        nav: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn', // Required if using fadeOut
        smartSpeed: 1000,     // smooth transitions
        onInitialized: function () {
            injectDotProgress();
            setTimeout(() => {
                startProgress();
            }, 50);
        },
        onTranslate: function () {
            resetProgress();
        },
        onChanged: function () {
            startProgress();
        }
    });

    function injectDotProgress() {
        $('.owl-dot').each(function () {
            if ($(this).find('.progress').length === 0) {
                $(this).append('<span class="progress"></span>');
            }
        });
    }

    function startProgress() {
        $('.owl-dot .progress').stop(true, true).css({ width: '0%' });
        $('.owl-dot.active .progress').animate({
            width: '100%'
        }, autoplayTime, 'linear');
    }

    function resetProgress() {
        $('.owl-dot .progress').stop(true, true).css({ width: '0%' });
    }
});
</script>
<?php endif; ?>
