<?php if(get_sub_field('visible')):?>
<section class="faq py-5" id="<?php echo get_sub_field('id')?>">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <?php if(get_sub_field('title')): ?>
          <h2 class="mb-2 title">
            <?php echo get_sub_field('title'); ?>
          </h2>
        <?php endif; ?>
           <?php if(get_sub_field('text')): ?>
          <div class="text">
            <?php echo get_sub_field('text'); ?>
          </div>
        <?php endif; ?>
      </div>
       <div class="col-12 col-md-6">

       </div>

      

      <div class="col-sm-12 col-md-12">
        <?php $i = 0; if( have_rows('content_repeater') ): ?>
          <div class="accordion" id="faqAccordion">
            <?php while( have_rows('content_repeater') ) : the_row(); ?>
              <div class="faq-item">
                <div class="faq-header" data-toggle="collapse" data-target="#faq<?php echo $i; ?>">
                  <h5><?php echo get_sub_field('title'); ?></h5>
                  <span class="icon">&#8250;</span> <!-- Right arrow -->
                </div>
                <div id="faq<?php echo $i; ?>" class="faq-body collapse">
                  <p><?php echo get_sub_field('text'); ?></p>
                </div>
              </div>
            <?php $i++; endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<script>
  document.querySelectorAll('.faq-header').forEach(header => {
    header.addEventListener('click', () => {
      const target = document.querySelector(header.dataset.target);

      document.querySelectorAll('.faq-body').forEach(body => {
        if (body !== target) {
          body.classList.remove('show');
          body.previousElementSibling.classList.remove('active');
        }
      });

      target.classList.toggle('show');
      header.classList.toggle('active');
    });
  });
</script>
<?php endif;?>
