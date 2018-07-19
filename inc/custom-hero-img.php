<?php
/**
 * Functions which handles display of custom header images
 *
 * @package Constellation_Technologies
 */

function constellation_custom_header_section() {
  if( is_front_page() ) { ?>

    <section class="hero">

      <?php if ( function_exists( 'get_field' ) ) :
        $hero_title_left    = get_field( 'home_hero_title_left' );
        $hero_title_right   = get_field( 'home_hero_title_right' );
        $hero_content_left  = get_field( 'home_hero_content_left' );
				$hero_content_right = get_field( 'home_hero_content_right' ); ?>

				<video src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/constellation/media/low-6729115-preview.mp4" loop autoplay muted playsinline poster="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/constellation/imgs/video-poster-space.jpg"></video>

				<div class='hero-wrapper'>
					<div class="hero-callout-left">
							<h2 class="hero-title"><?php echo wp_kses_post( $hero_title_left ); ?></h2>
							<div class="hero-content"><?php echo wp_kses_post( $hero_content_left ); ?></div>
					</div>

					<div class="hero-callout-right">
							<h2 class="hero-title"><?php echo wp_kses_post( $hero_title_right ); ?></h2>
							<div class="hero-content"><?php echo wp_kses_post( $hero_content_right ); ?></div>
					</div>
				</div>
      <?php endif; ?>

    </section>

    <?php

  } elseif ( is_home() || is_archive() || is_single() ) {

		$news_feature_img = get_the_post_thumbnail( get_option( 'page_for_posts' ), 'feature-img' );

		if ( $news_feature_img ) { ?>

		<section class="feature-header">
			<figure class="feature-img">

				<?php echo $news_feature_img; ?>

				<div class="title-wrapper">
					<?php constellation_seo_blog_page_title(); ?>
				</div><!-- title-wrapper -->
			</figure>
		</section>

		<?php

		}

	} elseif ( is_page() && has_post_thumbnail() ) { ?>
		<section class="feature-header">
			<figure class="feature-img">

				<?php the_post_thumbnail('feature-img'); ?>

				<div class="title-wrapper">
					<?php constellation_seo_page_titles(); ?>
				</div><!-- title-wrapper -->
			</figure>
		</section>
		<?php

	} else {

		$page_feature_img = get_the_post_thumbnail( get_option( 'page_for_posts' ), 'feature-img' ); ?>

		<section class="feature-header">
			<figure class="feature-img">

				<?php echo $page_feature_img; ?>

				<div class="title-wrapper">
					<?php constellation_seo_page_titles(); ?>
				</div><!-- title-wrapper -->
			</figure>
		</section>
	<?php

	}
}
