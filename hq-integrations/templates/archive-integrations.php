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
	<div class="container" style="margin-top: 70px;">
		<div class="row">

			<div class="col-md-2 left-sidebar">
				<aside class="sidebar">
					<h4>Categories</h4>
					<?php

					$taxonomy = 'integrations-category';
					$terms = get_terms($taxonomy); // Get all terms of a taxonomy

					if ( $terms && !is_wp_error( $terms ) ) :
					?>
					    <ul class="int-sidebar-cat">
					    	<li style="list-style: none;"><a href="/hq/integrations">View all</a></li>
					        <?php foreach ( $terms as $term ) { ?>
					            <li style="list-style: none;"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name . ' (' . $term->count . ')'; ?></a></li>
					        <?php } ?>
					    </ul>
					<?php endif;?>

				</aside>
			</div>
				<?php $obj = get_queried_object();
					 /*  echo '<pre>';
					print_r( $obj );
					echo '</pre>'; */ ?>
			<div class="col-md-10 content-sidebar">
				<?php 
				if ( ! is_tax() ):

					$featured = new WP_Query(
				        array(
				            'post_type' => 'integrations',
				            'showposts' => 3,
				            'tax_query' => array(
				                array(
				                    'taxonomy'  => 'integrations-tag',
				                    'terms'     => array( 'featured' ),
				                    'field'     => 'slug'
				                )
				            )
				        )
				    );

					 while ($featured->have_posts()) : $featured->the_post(); ?>
				    	<div class="col-md-4 col-sm-4 col-xs-12 text-left mb20">
				    		<a href="<?php the_permalink(); ?>" class="int-card">
				    		<div class="entry-image int-featured">
				    			<?php the_post_thumbnail( 'integration-thumb' ); ?>
				    		</div>
				    		<div class="int-info">
				    			<h6 style="margin: 0; line-height: 1.2181291384em;"><?php the_title(); ?></h6>
					    	    <div class="int-cat">
					    	    	<?php $featured_terms = get_the_terms(get_the_ID(), 'integrations-category');
					    	    			foreach ($featured_terms as $term) {
					    	    				echo $term->name;
					    	    			}
					    	    	 ?>
					    	    </div>
				    	    </div>
				    	    </a>
				        </div>
				 <?php endwhile;  ?>

					 <?php
				foreach ( $terms as $term ):

					// set up a new query for each category, pulling in related posts.
					    $integrations = new WP_Query(
					        array(
					            'post_type' => 'integrations',
					            'showposts' => -1,
					            'tax_query' => array(
					                array(
					                    'taxonomy'  => 'integrations-category',
					                    'terms'     => array( $term->slug ),
					                    'field'     => 'slug',
					                )
					            )
					        )
					    );
					?>

					<div class="col-md-12">
						<h4 class="mt20 mb20" style="line-height: 1.2181291384em; border-bottom: 1px solid #cccccc; padding-bottom: 10px;"><?php echo $term->name; ?></h4>
					</div>

					<?php while ($integrations->have_posts()) : $integrations->the_post(); ?>
					    	<div class="col-md-4 col-sm-4 col-xs-12 text-left mb20">
					    		<a href="<?php the_permalink(); ?>" class="int-card">
					    		<div class="entry-image int-featured">
					    			<?php the_post_thumbnail( 'integration-thumb' ); ?>
					    		</div>
					    		<div class="int-info">
					    			<h6 style="margin: 0; line-height: 1.2181291384em;"><?php the_title(); ?></h6>
					    		</div>
					    	    </a>
					        </div>
					<?php endwhile; endforeach; else: ?>

					<div class="col-md-12">
						<h3 class="mt20 mb20" style="line-height: 1.2181291384em;"><?php echo single_cat_title(); ?></h3>
					</div>

					<?php global $query_string;
					query_posts( $query_string . '&posts_per_page=-1' ); ?>

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="col-md-4 col-sm-4 col-xs-12 text-left mb20">
						<a href="<?php the_permalink(); ?>" class="int-card">
						<div class="entry-image  int-featured">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="int-info">
							<h6 style="margin: 0; line-height: 1.2181291384em;"><?php the_title(); ?></h6>
						</div>
					    </a>
				    </div>
			<?php endwhile; endif; endif; ?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">

.int-card {
	display: block;
	border-radius: 6px!important;
    border: 1px solid #e8e8e8;
}
.int-info {
    padding: 15px;
    border-top: 1px solid #e8e8e8;
}
.int-featured {
    min-height: 160px;
    display: flex;
}
.int-thumb {
    min-height: 120px;
    display: flex;
}
.int-featured img, .int-thumb img {
    max-height: 120px;
    width: auto;
}
.int-thumb img {
	padding: 0 20px;
}
.int-sidebar-cat li a {
	color: #333;
	padding: 4px 8px;
}

.int-sidebar-cat li:hover {
	background-color: rgba(249, 191, 59, 0.36);
    border-color: rgba(249, 191, 59, 0.36);
}

.int-card:hover .int-info {
    background: #f9bf3b;
}

.int-card:hover .int-info h6, .int-card:hover .int-cat {
	color: #fff;
}

.int-cat {
	color: #2c2d30; 
	font-size: 13px;
}

.col-xs-5ths,
.col-sm-5ths,
.col-md-5ths,
.col-lg-5ths {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.col-xs-5ths {
    width: 20%;
    float: left;
}

@media (min-width: 768px) {
    .col-sm-5ths {
        width: 20%;
        float: left;
    }
}

@media (min-width: 992px) {
    .col-md-5ths {
        width: 20%;
        float: left;
    }
}

@media (min-width: 1200px) {
    .col-lg-5ths {
        width: 20%;
        float: left;
    }
}
	
</style>

<?php get_footer(); ?>