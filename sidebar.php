<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yummy_Gummy_Opening
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<section id="chatbox" class="widget chatbox" style="height:400px;">
		<script id="cid0020000153956491537" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 100%;">{"handle":"testst11","arch":"js","styles":{"a":"bf5c92","b":100,"c":"000000","d":"000000","k":"bf5c92","l":"bf5c92","m":"bf5c92","q":"bf5c92","r":100,"fwtickm":1}}</script>
	</section>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

<!-- <aside id="secondary" class="widget-area" role="complementary">
</aside> -->
