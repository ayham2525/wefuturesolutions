<?php if (get_sub_field('visible')) : ?>
<section class="service_blocks py-5">
  <div class="container">
    <!-- Section Title -->
    <div class="section-header text-center">
       <?php if(get_sub_field('title')): ?>
      <h2><?php echo get_sub_field('title');?></h2>
      <?php endif;?>
      <?php if(get_sub_field('text')): ?>
      <p><?php echo get_sub_field('text');?></p>
        <?php endif;?>
    </div>

     <?php if( have_rows('content_repeater') ):?>
    <div class="process-grid">
 <?php   while( have_rows('content_repeater') ) : the_row();?>
      <div class="step">
      <?php if(get_sub_field('title')): ?>
      <h4><?php echo get_sub_field('title');?></h4>
      <?php endif;?>
        <?php if(get_sub_field('text')): ?>
      <p><?php echo get_sub_field('text');?></p>
        <?php endif;?>
      </div>
      <?php endwhile;?>
  
    </div>
    <?php endif;?>
  </div>
</section>

 
<?php endif;?>