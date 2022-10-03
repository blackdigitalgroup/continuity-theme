<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Continuity_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php


		if(is_page_template('page-templates/full-width-page-template.php' )) {

        } else {
            if ( !is_front_page() && !is_page_template('page-templates/full-width-page-template.php' ) ) {
                ?>
                <div class="internal-hero-row relative">
                    <div class="container mx-auto flex">
                        <?php
                        continuity_theme_post_thumbnail();
                        the_title( '<h1 class="entry-title uppercase font-heading absolute top-1/2 -translate-y-1/2">', '</h1>' );
                        ?>

                    </div>
                </div>
                <?php 
                
            }
        }


		?>
	</header>

	<div class="mx-auto entry-content !container">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . esc_html__( 'Pages:', 'continuity-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer>
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span>%s</span>', 'continuity-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span>',
				'</span>'
			);
			?>
		</footer>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
