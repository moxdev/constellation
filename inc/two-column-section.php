<?php
/**
 * Functions which handles left column for icons/title and right column for content for Two Column Page Template
 *
 * @package Constellation_Technologies
 */

function constellation_two_column_section() {
	if( function_exists( 'get_field' ) ) :
		if( have_rows('columns') ): ?>

		<section class="two-columns">

			<?php while( have_rows('columns') ): the_row();
				$img = get_sub_field('image');
				$title = get_sub_field('image_title');
				$content = get_sub_field('content'); ?>

			<div class="flex-wrapper">

				<?php if( $img ) : ?>

					<div class='col-1 flex-child'>
						<img src="<?php echo esc_url( $img['sizes']['two-column-image'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" description="<?php echo esc_attr( $img['description'] ); ?>">

						<?php if( $title ) : ?>

							<h2><?php echo wp_kses_post( $title ); ?></h2>

						<?php endif; ?>

					</div>

				<?php endif; ?>

				<?php if( $content ) : ?>

					<div class='col-2 flex-child'>

						<?php echo wp_kses_post( $content ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php endwhile; ?>

		</section>

		<?php endif;
	endif;
}
