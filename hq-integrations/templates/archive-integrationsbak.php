<?php
/*
Template Name: Integrations Archive
Template Post Type: integrations
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $softease_opt;

$paginate_links = paginate_links();

$sidebar = softease_sidebar_position( 'blog_sidebar' );

$blog_class  = ( $sidebar ) ? 'col-md-9' : 'col-md-12';
$blog_class .= ( ! isset( $softease_opt['blog_style'] ) ) ? ' vertical' : ' ' . $softease_opt['blog_style'];

//$header = ( isset( $softease_opt['banner_header'] ) ) ? $softease_opt['banner_header'] : false;

get_header(); ?>

<div class="se-section padd-90">
	<div class="container">
		<div class="row">

			<div class="col-md-3 left-sidebar">
				<aside class="sidebar">
					<h4>Categories</h4>
					<?php

					$taxonomy = 'integrations-category';
					$terms = get_terms($taxonomy); // Get all terms of a taxonomy

					if ( $terms && !is_wp_error( $terms ) ) :
					?>
					    <ul>
					        <?php foreach ( $terms as $term ) { ?>
					            <li style="list-style: none;"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
					        <?php } ?>
					    </ul>
					<?php endif;?>

				</aside>
			</div>

			<div class="col-md-8 content-sidebar">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-md-4 text-left">
					<a href="<?php the_permalink(); ?>">
					<div class="entry-image mb20">
						<?php the_post_thumbnail(); ?>
					</div>
					<div>
						<h5 style="margin: 0; line-height: 1.2181291384em;"><?php the_title(); ?></h5>
					</div>
				    <div>
				    	<?php echo get_the_term_list( get_the_ID(), 'integrations-category', '', ', ', '' ); ?>
				    </div>
				    </a>
			    </div>
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>
