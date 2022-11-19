<?php get_header(); ?>

<div class="content">
	
	<?php while ( have_posts() ): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
			
			<header class="entry-header group">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<ul class="entry-meta group">
					<li class="entry-category"><?php the_category(' '); ?></li>
					<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) =='on' ) ): ?>
						<li class="entry-comments"><i class="far fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
					<?php endif; ?>
					<li class="entry-date"><i class="far fa-calendar"></i><?php the_time( get_option('date_format') ); ?></li>
				</ul>
			</header>
			<div class="entry-media">
				<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
			</div>
			<div class="entry-content">
				<div class="entry themeform">	
					<?php the_content(); ?>
					<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','screenplan'),'after'=>'</div>')); ?>
					<div class="clear"></div>				
				</div><!--/.entry-->
			</div>
			<div class="entry-footer group">
				
				<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','screenplan').'</span> ','','</p>'); ?>
				
				<div class="clear"></div>
				
				<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
					<div class="author-bio">
						<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
						<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
						<p class="bio-desc"><?php the_author_meta('description'); ?></p>
						<div class="clear"></div>
					</div>
				<?php endif; ?>
				
				<?php do_action( 'alx_ext_sharrre' ); ?>
				
				<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>
				
				<?php if ( get_theme_mod( 'post-nav', 'content' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>

				<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
				
			</div>

		</article><!--/.post-->

	<?php endwhile; ?>
	
</div><!--/.content-->

<div id="move-sidebar-content"></div>

<?php get_footer(); ?>