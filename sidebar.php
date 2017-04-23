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
	<section id="chatbox" class="widget chatbox"><script id="cid0020000153907373735" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 220px;height: 426px;">{"handle":"testst11","arch":"js","styles":{"a":"CC0000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"CC0000","l":"CC0000","m":"CC0000","n":"FFFFFF","p":"10","q":"CC0000","r":100,"fwtickm":1}}</script></section>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

<!-- <aside id="secondary" class="widget-area" role="complementary">
</aside> -->
