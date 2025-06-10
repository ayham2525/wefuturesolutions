<?php if (get_sub_field('visible')) : ?>
<section class="our_services">
  <div class="container">
    <?php if(get_sub_field('title')):?>
    <h2 class="section-title">
        <?php echo get_sub_field('title'); ?>
    </h2>
    <?php endif;?>

    <?php if(have_rows('content_repeater')): ?>
    <div class="cards">
      <?php while(have_rows('content_repeater')): the_row(); 
        $link = get_sub_field('link');
        $has_link = $link && isset($link['url']);
      ?>
      <<?php echo $has_link ? 'a href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target'] ?: '_self') . '" class="card col-auto"' : 'div class="card col-auto"'; ?>>
        <div class="icon">
          <?php if(get_sub_field('image')): 
              $image = get_sub_field('image'); 
              $image_src = wp_get_attachment_image_src($image, 'large');
              $img = $image_src[0]; 
          ?>
            <img src="<?php echo esc_url($img); ?>" title="<?php echo esc_attr(get_sub_field('title')); ?>">
          <?php endif; ?>
        </div>

        <?php if(get_sub_field('title')): ?>
        <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
        <?php endif; ?>

        <?php if(get_sub_field('text')): ?>
        <div class="text"><?php echo wp_kses_post(get_sub_field('text')); ?></div>
        <?php endif; ?>
      </<?php echo $has_link ? 'a' : 'div'; ?>>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
