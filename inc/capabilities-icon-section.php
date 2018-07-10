<?php
/**
 * Functions which handles display of capabilities icon section for Capabilities Page
 *
 * @package Constellation_Technologies
 */

function constellation_capabilities_icon_section() {
	if( function_exists( 'get_field' ) ) :
		if( have_rows('icon_section') ): ?>

		<section class="capabilities-icons">
			<?php while( have_rows('icon_section') ): the_row();
				$img = get_sub_field('icon_image');
				$title = get_sub_field('icon_title');
				$page_link = get_sub_field('page_link'); ?>

			<div class="icon-wrapper">

				<?php if( $img ) : ?>
					<a href="<?php echo esc_html( $page_link ); ?>">
						<img src="<?php echo esc_url( $img['sizes']['capabilities-icon'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" description="<?php echo esc_attr( $img['description'] ); ?>">
						<?php if( $title ) : ?>
							<h2><?php echo wp_kses_post( $title ); ?></h2>
						<?php endif; ?>
					</a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>
		</section>

		<?php endif;
	endif;
}
