<?php
    // Enqueue Styles
    add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
    function enqueue_theme_styles()
    {
        // Bootstrap 5
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

        // FontAwesome (v4.7)
        wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/assets/style/font-awesome-4.7.0/css/font-awesome.min.css');

        // Owl Carousel
        wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
        wp_enqueue_style('owl-theme-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');

        // Main Theme CSS
        wp_enqueue_style('main-theme', get_stylesheet_directory_uri() . '/assets/style/css/main-theme.css');
    }

    // Enqueue Scripts
    add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
    function enqueue_theme_scripts()
    {
        // jQuery (required for Owl Carousel if not already included)
        wp_enqueue_script('jquery');

        // Bootstrap 5 JS
            wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);

        // GSAP
        wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js', [], null, true);
        wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js', ['gsap'], null, true);

        // Owl Carousel JS
        wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], null, true);
                wp_enqueue_script('header-js', get_stylesheet_directory_uri() . '/assets/js/header.js', ['jquery'], null, true);

    }
 
 function marquee_gsap_script() {
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const track = document.querySelector(".marquee-track");
        const wrapper = document.querySelector(".marquee-wrapper");

        if (track && wrapper) {
            // Clone content
            const clone = track.cloneNode(true);
            wrapper.appendChild(clone);

            // Combine original + clone
            const fullTrack = wrapper.querySelectorAll(".marquee-track");

            // Wrap both inside container for GSAP
            const allContent = document.createElement("div");
            allContent.className = "marquee-inner";
            fullTrack.forEach(t => allContent.appendChild(t));
            wrapper.innerHTML = '';
            wrapper.appendChild(allContent);

            // Animate using GSAP
            const totalWidth = allContent.scrollWidth / 2;

            gsap.to(allContent, {
                x: -totalWidth,
                ease: "linear",
                repeat: -1,
                duration: 30
            });
        }
    });
    </script>
    <style>
      .marquee-inner {
        display: flex;
        width: max-content;
      }
    </style>
    <?php
}
add_action('wp_footer', 'marquee_gsap_script', 100);

  function allow_svg_uploads($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'allow_svg_uploads');

        // Allow only for admins (optional, for security)
        function fix_svg_mime_type_check($data, $file, $filename, $mimes)
        {
            $ext = isset($data['ext']) ? $data['ext'] : '';
            if ('svg' === $ext) {
                $data['type'] = 'image/svg+xml';
                $data['ext']  = 'svg';
            }
            return $data;
        }
        add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type_check', 10, 4);

        add_action('wp_ajax_increment_book_stats', 'increment_book_stats');
        add_action('wp_ajax_nopriv_increment_book_stats', 'increment_book_stats');




    // Remove author info from oEmbed
    function disable_embeds_filter_oembed_responsedata($data)
    {
        unset($data['author_url']);
        unset($data['author_name']);
        return $data;
    }
    add_filter('oembed_response_data', 'disable_embeds_filter_oembed_responsedata');

    // Add ACF options page (not related to translation)
    add_action('acf/init', 'my_acf_options_page');
    function my_acf_options_page() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' => 'Options',
                'menu_title' => 'Options',
                'menu_slug'  => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect'   => false,
            ]);
        }
    }


    // Register custom menu
    register_nav_menus([
        'mobile_menu' => 'Menu Mobile',
        'first_footer_menu' => 'First Footer Menu',
        'second_footer_menu' => 'Second Footer Menu'
    ]);

    // Customize layout title for ACF flexible content (kept since it's layout-specific)
    add_filter('acf/fields/flexible_content/layout_title/name=main_content', 'my_acf_fields_flexible_content_layout_title', 10, 4);
    function my_acf_fields_flexible_content_layout_title($title, $field, $layout, $i)
    {
        $title = $layout["label"];
        if ($text = get_sub_field('section_title')) {
            $title .= ' <b>(' . esc_html($text) . ')</b>';
        } elseif ($text = get_sub_field('title')) {
            $title .= ' <b>(' . esc_html($text) . ')</b>';
        }
        return $title;
    }

    // Change login logo
    if (!function_exists('tf_wp_admin_login_logo')):
        function tf_wp_admin_login_logo()
        { ?>
<style type="text/css">
body.login div#login h1 a {
    background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/logo.png"; ?>');
}
</style>
<?php }
        add_action('login_enqueue_scripts', 'tf_wp_admin_login_logo');
    endif;


    function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Prevent prefetching from increasing the count
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);