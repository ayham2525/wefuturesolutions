<section class="recent_articles">
  <div class="container">
    <div class="section-header">
      <?php if(get_sub_field('title')):?>
      <h2><?php echo get_sub_field('title')?></h2>
      <?php endif;?>
      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="view-all">View All</a>
    </div>
    <div class="articles-row">
      <?php
      $recent_posts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish'
      ]);
      if ( $recent_posts->have_posts() ) :
        while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
          <article class="article-card">
            <div class="article-image" style="background-image: url('<?php the_post_thumbnail_url('medium_large'); ?>');"></div>
            <div class="article-body">
              <h3 class="article-title"><?php the_title(); ?></h3>
              <p class="article-snippet">
                <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
              </p>
              <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </div>
          </article>
      <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p>No recent articles found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
