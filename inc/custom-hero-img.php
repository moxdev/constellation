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

				<video src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/constellation/media/sd-6729115-preview.mp4" loop autoplay muted playsinline></video>

				<div class='hero-wrapper'>
					<div class="hero-callout-left">
							<span class="hero-title"><?php echo wp_kses_post( $hero_title_left ); ?></span>
							<div class="hero-content"><?php echo wp_kses_post( $hero_content_left ); ?></div>
					</div>

					<div class="hero-callout-right">
							<span class="hero-title"><?php echo wp_kses_post( $hero_title_right ); ?></span>
							<div class="hero-content"><?php echo wp_kses_post( $hero_content_right ); ?></div>
					</div>
				</div>
      <?php endif; ?>

    </section>

    <?php

  }
}
