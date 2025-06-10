</main><!-- /#main -->
<footer id="footer" class="custom-footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Subscribe Section -->
            <div class="col-md-4">
                <h5 class="footer-heading"><?php echo get_field('footer_form_title','option');?></h5>
                <p><?php echo get_field('footer_form_text','option');?></p>
                   <?php echo do_shortcode(get_field('footer_form_code' , 'option'))?>
            </div>

            <!-- Footer Menu (About, Services, Support) -->
            <div class="col-md-8">
    <div class="row">
        <!-- First footer menu -->
        <div class="col-sm-6">
            <h6 class="footer-heading">
                <?php echo esc_html( get_field( 'first_footer_menu_title', 'option' ) ); ?>
            </h6>

            <?php
            if ( has_nav_menu( 'first_footer_menu' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'first_footer_menu',
                    'container'      => false,               // no extra <div>
                    'menu_class'     => 'list-unstyled',     // keeps Bootstrap styling
                    'depth'          => 1,                   // single-level list
                    'fallback_cb'    => false,               // hide if not set
                ) );
            endif;
            ?>
        </div>

        <!-- Second footer menu (still static here, or register another) -->
        <div class="col-sm-6">
            <h6 class="footer-heading">
                <?php echo esc_html( get_field( 'second_footer_menu_title', 'option' ) ); ?>
            </h6>
            <?php
            if ( has_nav_menu( 'second_footer_menu' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'second_footer_menu',
                    'container'      => false,               // no extra <div>
                    'menu_class'     => 'list-unstyled',     // keeps Bootstrap styling
                    'depth'          => 1,                   // single-level list
                    'fallback_cb'    => false,               // hide if not set
                ) );
            endif;
            ?>
        </div>
    </div>
</div>


            <!-- Optional Footer Widgets -->
            <?php if ( is_active_sidebar( 'third_widget_area' ) ) : ?>
            <div class="col-md-12">
                <?php dynamic_sidebar( 'third_widget_area' ); ?>
                <?php if ( current_user_can( 'manage_options' ) ) : ?>
                <span class="edit-link">
                    <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"
                        class="badge badge-secondary"><?php esc_html_e( 'Edit', 'wp_bootstrap_starter' ); ?></a>
                </span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Bottom Section -->
            <div class="col-md-12 d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <p class="mb-0 small">

                    <?php echo get_field('copy_right','option');?>
                </p>
                <div class="footer-social">
                    <?php   while ( have_rows( 'socials', 'option' ) ) : the_row();?>
                    <?php if(get_sub_field('link')):?>
                    <?php $link = get_sub_field('link');?>
                    <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">

                        <?php if(get_sub_field('icon')):?>
                        <?php  
                     $src = null;
                     $image = get_sub_field('icon'); 
                     $image_src = wp_get_attachment_image_src( $image, 'large' );

                     $img = $image_src[0]; ?>
                        <img class="img-fluid" src="<?php echo $img;?>">
                        <?php endif;?>
                        <?php echo $link['title'];?></a>
                    <?php endif;?>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll('.service_section');

        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        observer.unobserve(entry
                        .target); // remove if you want it to animate only once
                    }
                });
            }, {
                threshold: 0.3
            });

            sections.forEach(section => {
                observer.observe(section);
            });
        }
    });
    </script>
</footer>

</div><!-- /#wrapper -->
<?php
		wp_footer();
	?>
</body>

</html>