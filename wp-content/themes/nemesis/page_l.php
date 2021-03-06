<?php
/**
 * Template Name: Page Left Sidebar
 * The main template file for display page.
 *
 * @package WordPress
*/


/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/
if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}
else
{
	global $query_string;
	query_posts($query_string . "&page_id=".$current_page_id);
}

//Get page description
$page_desc = get_post_meta($current_page_id, 'page_desc', true);

//Get page Sidebar
$page_sidebar = get_post_meta($current_page_id, 'page_sidebar', true);
if(empty($page_sidebar))
{
	$page_sidebar = 'Page Sidebar';
}

if(!isset($hide_header) OR !$hide_header)
{
	get_header(); 
}

if(!isset($hide_header) OR !$hide_header)
{
?>
		
</div>

<!-- Begin content -->
<div id="content_wrapper">

    <div class="page_caption">
    	<div class="caption_inner">
    		<div class="caption_header">
    			<h1 class="cufon"><span><?php the_title(); ?></span></h1>
    			<div class="caption_desc">
    				<?php echo stripcslashes($page_desc); ?>
    			</div>
    		</div>
    		<?php
				//Include social icons
				include (TEMPLATEPATH . "/templates/socials-icons.php");
			?>
    	</div>
    	<br class="clear"/>
    </div>
    <br class="clear"/>
    
    <div class="inner">
    
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    	
    	<div class="standard_wrapper">
<?php
}
?>
			<div class="sidebar_wrapper left_sidebar">
			
			    <div class="sidebar_top left_sidebar"></div>
			
			    <div class="sidebar left_sidebar">
			    
			    	<div class="content">
			    
			    		<ul class="sidebar_widget">
			    		<?php dynamic_sidebar($page_sidebar); ?>
			    		</ul>
			    	
			    	</div>
			
			    </div>
			
			    <div class="sidebar_bottom left_sidebar"></div>
				<br class="clear"/>
			</div>
					
			<div class="sidebar_content left_sidebar">
					
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
					
					<?php do_shortcode(the_content()); break;  ?>

				<?php endwhile; ?>
				<br class="clear"/>
					
			</div>
				
		</div>
	</div>
	<!-- End main content -->
	<br class="clear"/>
				
</div>
			
<?php 
if(!isset($hide_header) OR !$hide_header OR is_null($hide_header))
{
?>			

<?php get_footer(); ?>

<?php
}
?>