<?php get_header(); ?>
    <?php $img = ''; if(get_field('articles_main_image' , 'option')):?>
        <?php  
                     $src = null;
                     $image = get_field('articles_main_image' , 'option'); 
                     $image_src = wp_get_attachment_image_src( $image, 'large' );
                     $img = $image_src[0]; ?>
        <?php endif;?>
  <section class="hero-image" style="background-image: url('<?php echo $img; ?>');">
    <div class="hero-overlay">
      <div class="container">
        <h1 class="article-title">Articles</h1>
      </div>
    </div>
  </section>
<section class="articles-archive">
  <div class="container">
    <h1 class="section-title">Our Articles</h1>
    <div class="articles-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="article-card">
          <a href="<?php the_permalink(); ?>">
            <div class="article-image">
              <?php the_post_thumbnail('medium'); ?>
            </div>
          </a>
          <div class="article-content">
            <h2 class="article-title"><?php the_title(); ?></h2>
            <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">View Article  <svg class="icon-arrow" width="16px" height="16px" viewBox="0 -6.5 36 36" xmlns="http://www.w3.org/2000/svg" fill="currentColor" fill-rule="nonzero">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <title>right-arrow</title> <desc>Created with Sketch.</desc> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-212.000000, -159.000000)" fill="#00b9ae" fill-rule="nonzero"> <g id="square-filled" transform="translate(50.000000, 120.000000)"> <path d="M187.108012,39.2902857 L197.649804,49.7417043 L197.708994,49.7959169 C197.889141,49.9745543 197.986143,50.2044182 198,50.4382227 L198,50.5617773 C197.986143,50.7955818 197.889141,51.0254457 197.708994,51.2040831 L197.6571,51.2479803 L187.108012,61.7097143 C186.717694,62.0967619 186.084865,62.0967619 185.694547,61.7097143 C185.30423,61.3226668 185.30423,60.6951387 185.694547,60.3080911 L194.702666,51.3738496 L162.99947,51.3746291 C162.447478,51.3746291 162,50.9308997 162,50.3835318 C162,49.8361639 162.447478,49.3924345 162.99947,49.3924345 L194.46779,49.3916551 L185.694547,40.6919089 C185.30423,40.3048613 185.30423,39.6773332 185.694547,39.2902857 C186.084865,38.9032381 186.717694,38.9032381 187.108012,39.2902857 Z M197.115357,50.382693 L186.401279,61.0089027 L197.002151,50.5002046 L197.002252,50.4963719 L196.943142,50.442585 L196.882737,50.382693 L197.115357,50.382693 Z" id="right-arrow"> </path> </g> </g> </g> </g>
                    </svg></a>
          </div>
        </article>
      <?php endwhile; else : ?>
        <p>No articles found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
