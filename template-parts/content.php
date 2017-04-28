<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yummy_Gummy_Opening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="position:relative">
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
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<div></div>
		<div class="flag"><?php the_time('M') ?><br><?php the_time('d') ?></div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'candyland' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			$mydb = new wpdb('mybb','123123','mybbdb','localhost');
			$rows = $mydb->get_results("select username, usertitle from mybb_users");
			echo "<ul>";
			foreach ($rows as $obj) :
			   echo "<li>".$obj->username, $obj->usertitle."</li>";
			endforeach;
			echo "</ul>";

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'candyland' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php candyland_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
