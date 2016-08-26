<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Ships Log Single Posts Template
 *
 *
 * @file           single-auctionitem.php
 * @package        Responsive
 * @author         Gerard Greenidge
 * @copyright      2015 EDUNOW INC.
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
get_header(); ?>
<div id="content-full" class="grid col-940">
	<?php get_template_part( 'loop-header' ); ?>
	<?php if( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<div class="post-entry regular-page">
                      <?php if ( has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                  <?php endif; ?>
                     <h1 class="artwork-title"><em><?php the_title(); ?></em></h1>
                  <div class="artwork-details">
                     <p><strong>Artist Name:</strong> <?php echo get('artist_first_name'); ?> <?php echo get('artist_last_name'); ?></p>
<?php if( get('artist_website') != '' ) : ?>
<p><a href="<?php echo get('artist_website'); ?>" target="_blank"><?php echo get('artist_first_name'); ?>'s Website</a></p>
<?php endif; // no artist website ?>
<?php if( get('courtesy_of') != '' ) : ?>
                     <p>Courtesy of <?php echo get('courtesy_of'); ?></p>
<?php endif; // no courtesy ?>
                     <p><strong>Medium:</strong>  <?php echo get('item_medium'); ?></p>
                     <p><strong>Dimensions:</strong> <?php echo get('item_dimensions'); ?> (inches)</p>
                     <p><strong>Year:</strong> <?php echo get('item_year'); ?></p>
                     <p><strong>Retail Value:</strong> <?php echo get('item_retail_value'); ?></p>
                     <p><strong>Opening Bid:</strong>  <?php echo get('item_opening_bid'); ?></p>
<?php if( get('item_current_minimum_bid') != '' ) : ?>
                     <p><strong>Current Minimum Bid:</strong>  <?php echo get('item_current_minimum_bid'); ?></p>
<?php endif; // no minimum bid ?>
<?php if( get('item_bid_increment') != '' ) : ?>
                     <p><strong>Bid Increment:</strong>  <?php echo get('item_bid_increment'); ?></p>
<?php endif; // no bid increment ?>
                </div>  

<?php
$auctionitemname = "auction-item=".urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
 echo do_shortcode('[gravityform id="2" title="false" description="false" field_values="'.$auctionitemname.'"]'); ?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->
				<?php get_template_part( 'post-data' ); ?>
				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>
		<?php
		endwhile;
		get_template_part( 'loop-nav' );
	else :
		get_template_part( 'loop-no-posts' );
	endif;
	?>
</div><!-- end of #content -->
<?php get_footer(); ?>