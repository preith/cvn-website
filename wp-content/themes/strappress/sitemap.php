<?php
/**
 * Sitemap Template
 *
   Template Name: Sitemap
 *
 * @file           sitemap.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div class="row">
        <div class="col-lg-12">

        <div id="content-sitemap">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        

       <?php if( bi_get_data('enable_disable_breadcrumbs','1') == '1') {?>
        <?php echo responsive_breadcrumb_lists(); ?>
        <?php } ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                <h1 class="sitemap-title"><?php the_title(); ?></h1> 
            </header>

        
                
                <section class="post-entry">
                <div id="widgets">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget-title"><?php _e('Categories', 'responsive'); ?></div>
                            <ul><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&title_li='); ?></ul>
                    </div><!-- end of col-lg-4 -->
                    
                    <div class="col-lg-4">
                        <div class="widget-title"><?php _e('Latest Posts', 'responsive'); ?></div>
                            <ul><?php $archive_query = new WP_Query('posts_per_page=-1');
                                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                            </ul>  
                    </div><!-- end of col-lg-4 -->
                     
                    <div class="col-lg-4">
                          <div class="widget-title"><?php _e('Pages', 'responsive'); ?></div>
                            <ul><?php wp_list_pages("title_li=" ); ?></ul>               
                    </div><!-- end of col-lg-4 -->
                
                </div><!-- end of #widgets --> 
            </div>
                   <?php custom_link_pages(array(
                            'before' => '<div class="pagination"><ul>' . __(''),
                            'after' => '</ul></div>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>     
                </section><!-- end of .post-entry --> 

             <footer class="article-footer">
            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>  
          </footer>
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php endwhile; ?> 
        
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <nav class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
            <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
		</nav><!-- end of .navigation -->
        <?php endif; ?> 

	    <?php else : ?>

       <article id="post-not-found" class="hentry clearfix">
        <header>
           <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
       </header>
       <section>
           <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
       </section>
       <footer>
           <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
           <?php get_search_form(); ?>
       </footer>

   </article>

<?php endif; ?>  
      
        </div><!-- end of #content-sitemap -->
    </div>
</div>

<?php get_footer(); ?>