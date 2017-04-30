<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yummy_Gummy_Opening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-page'); ?> style="position:relative">

	<!-- Title, posted on, comment, edit -->
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php candyland_posted_on(); ?>
			<?php if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link"> | ';
				/* translators: %s: post title */
				comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'candyland' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
				echo '</span>';
			} ?>
			<?php edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'candyland' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link"> | ',
				'</span>'
			); ?>


		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<div></div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

  <div class="entry-tags">
  <!-- Tags and Categories -->
	<?php if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list();
		if ( $categories_list && candyland_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'candyland' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'candyland' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	} ?>
</div>

	<footer class="entry-footer">
		<?php candyland_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
