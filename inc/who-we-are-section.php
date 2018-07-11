<?php
/**
 * Functions which handles left column for icons/title and right column for content for Two Column Page Template
 *
 * @package Constellation_Technologies
 */

function constellation_who_we_are_section() {
	if( function_exists( 'get_field' ) ) :
		$certifications = get_field('certifications');
		$core_values    = get_field('core_values');

		if( $certifications || $core_values ): ?>

		<section class="who-we-are">

			<div class="flex-wrapper">

				<?php if( $certifications ) : ?>

					<div class='certifications'>

						<?php echo wp_kses_post( $certifications ); ?>

					</div>

				<?php endif; ?>

				<?php if( $core_values ) : ?>

					<div class='core-values'>

						<?php echo wp_kses_post( $core_values ); ?>

					</div>

				<?php endif; ?>

			</div>
		</section>

		<?php endif;
	endif;
}
