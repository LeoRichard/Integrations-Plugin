<?php 
/*
Template Name: Integrations
Template Post Type: integrations
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $softease_opt;

$sidebar = softease_sidebar_position( 'post_sidebar' );
$blog_class  = ( $sidebar ) ? 'col-md-8 content-sidebar' : 'col-md-8';

//$header = ( isset( $softease_opt['banner_header'] ) ) ? $softease_opt['banner_header'] : false;

get_header(); ?>

<?php while ( have_posts() ): the_post(); ?>
	<div class="se-section padd-90">
		<div class="container" style="margin-top: 70px;">
			<div class="row">
				<div class="col-md-12 int-browse" style="padding-bottom: 20px"><a href="/integrations">< Browse Integrations</a></div>
					<div class="col-md-3 left-sidebar">
						<aside class="sidebar">
							<div class="entry-image mb30">
	                        	<?php the_post_thumbnail(); ?>
	                    	</div>
	                    	<div class="entry-meta">
		                        <a href="<?php echo get_post_meta( get_the_ID(), '_hq_integrations_integration_url', true ); ?>" class="int-button" target="_blank">Website</a>
                          <?php if(get_post_meta( get_the_ID(), '_hq_integrations_integration_client', true )) : ?>
		                        <a href="<?php echo get_post_meta( get_the_ID(), '_hq_integrations_integration_client', true ); ?>" class="int-button" target="_blank">Knowledge Base</a>
                          <?php endif; ?>
		                        <h6>Category</h6>
		                        <div class="int-category"><?php echo get_the_term_list( get_the_ID(), 'integrations-category', '', ', ', '' ); ?></div>
		                    </div>
						</aside>
					</div>

				<div class="<?php echo esc_attr( $blog_class ); ?>">
					<div class="entry-title" style="padding-left: 12px">
	                        <?php the_title('<h3 class="mtn">', '</h3>'); ?>
	                    </div>
					<div class="tab">
					  <button class="tablinks" onclick="openTab(event, 'Info')" id="defaultOpen">Info</button>
					</div>
					<!-- Post content -->
					<div id="Info" class="entry tabcontent">
	                    <?php the_content(); ?>
	                </div>

				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>

<style type="text/css">
	/* Style the tab */
.tab {
  overflow: hidden;
  margin: 0px 12px;
  box-shadow: inset 0 -1px 0 0 #e8e8e8;
  margin-bottom: 15px;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  font-weight: bold;
  background: none;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 6px 12px;
  transition: 0.3s;
  color: #717274;
  margin-bottom: 0;
  margin-right: 10px;
}

.int-category a {
    border: 1px solid #e8e8e8;
    font-size: .85rem;
    color: #333333;
    display: inline-block;
    background-color: #fff;
    padding-top: .25rem;
    padding-bottom: .25rem;
    padding-left: .75rem;
    padding-right: .75rem;
    margin-right: .25rem;
    margin-bottom: .5rem;
    border-radius: 4px;
}

.int-category a:hover {
    background-color: #f9f9f9!important;
    text-decoration: none!important;
}

.int-browse a {
	color: #333333;
}

/* Change background color of buttons on hover */
.tab button:hover {
  color: #2c2d30;
}

/* Create an active/current tablink class */
.tab button.active {
  box-shadow: inset 0 -2px 0 0 #f9bf3b!important;
  color: #2c2d30;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
}

.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
.int-button {
    background: #f9bf3b;
    border-color: #f9bf3b;
    border-radius: 30px;
    color: #fff;
    display: block;
    font: 400 14px Poppins,sans-serif;
    line-height: normal;
    border: 1px solid transparent;
    line-height: 40px;
    white-space: nowrap;
    touch-action: manipulation;
    margin-top: 10px;
    margin-bottom: 0;
    padding-top: 0px;
    padding-bottom: 0px;
    padding-left: 20px;
    padding-right: 20px;
    cursor: pointer;
    text-align: center;
    vertical-align: middle;
    letter-spacing: .1em;
    text-transform: uppercase;
    height: 40px;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}
</style>

<script type="text/javascript">

document.getElementById("defaultOpen").click();

function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>