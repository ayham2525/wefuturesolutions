<?php if(get_sub_field('visible')):?>
<section class="dev-types-section marquee-loop py-5">
  <div class="container-fluid p-0">
    <?php if(get_sub_field('title')):?>
    <h2 class="section-title text-center mb-4">
        <?php echo get_sub_field('title'); ?>
    </h2>
    <?php endif; ?>
    
    <?php if(have_rows('content_repeater')): ?>
    <div class="marquee-wrapper">
      <div class="marquee-track">
        <?php while(have_rows('content_repeater')): the_row(); ?>
          <div class="dev-card"><?php echo get_sub_field('title'); ?></div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
