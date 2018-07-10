<?php
/**
 * Template Name: Two Column
 *
 * Left column for displaying image/title and right column for displaying content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Constellation_Technologies
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class='wrapper'>

				<?php if( function_exists( 'constellation_two_column_section' ) ) : constellation_two_column_section(); endif; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
