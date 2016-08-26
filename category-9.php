<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Category Template
 *
 *
 * @file           category.php
 * @package        Responsive
 * @author         Gerard Greenidge
 * @copyright      2003 - 2015 EDUNOW INC.
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header();

$args = array(
'post_type'  => 'auctionitem',
	"orderby" => "meta_value",
	"meta_key" => "artist_last_name",
	"order" => "asc",
	'cat'=> $cat
);
$the_query = new WP_Query( $args )
 ?>
<div id="content-archive" class="grid col-940">
	<?php if ( $the_query->have_posts() ) : ?>
<h1><?php single_cat_title( '', true ); ?></h1>
<p>The selected art on this page have been generously donated at 100% by the artists for Art Auction XVI. We thank them for their support and welcome you to visit their respective websites to learn more about them and their work. All of these artworks were available for online bidding. Art Auction XVI online bidding is now closed. Please visit the Museum at the Art Auction XVI exhibition to place an in-person bid between May 27 and May 30. All online bids are final.</p>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<div class="post-entry by-artistlastname">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'artwork-thumbnail' ) ); ?><div class="cat_artistname"><?php echo get('artist_first_name'); ?> <?php echo get('artist_last_name'); ?></div></a>
					<?php endif; ?>
				</div><!-- end of .post-entry -->
				<?php responsive_entry_bottom(); ?>
			</div>
			<?php responsive_entry_after(); ?>
		<?php
		endwhile; ?>
<!--
<?php		
get_template_part( 'loop-nav', get_post_type() ); ?>
-->
<?php
	else :
		get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>
</div><!-- end of #content-archive -->
<?php get_footer(); ?>