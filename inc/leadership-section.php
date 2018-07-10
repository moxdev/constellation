<?php
/**
 * Functions which displays the Leadership section on the Leadership Page.
 *
 * @package Constellation_Technologies
 */

function constellation_leadership_section() {
	if( function_exists( 'get_field' ) ) :
		if( have_rows('leadership') ): ?>

		<section class="leadership">

			<?php while( have_rows('leadership') ): the_row();
				$img = get_sub_field('image');
				$content = get_sub_field('content'); ?>

			<div class="flex-wrapper">

				<?php if( $img ) : ?>

					<figure class="headshot">

						<img src="<?php echo esc_url( $img['sizes']['leadership-image'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" description="<?php echo esc_attr( $img['description'] ); ?>">

					</figure>

				<?php endif; ?>

				<?php if( $content ) : ?>

					<div class='bio'>

						<?php echo wp_kses_post( $content ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php endwhile; ?>

		</section>

		<?php endif;
	endif;
}
