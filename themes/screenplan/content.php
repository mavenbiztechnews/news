<?php $format = get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-list group'); ?>>	
	
	<div class="entry-list-inner <?php if ( has_post_thumbnail() ) echo 'entry-thumbnail-enabled'; ?>">
		
		<?php if ( has_post_thumbnail() ): ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('screenplan-small'); ?>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-star"></i></span>'; ?>
			</a>
		</div>
		<?php endif; ?>
		
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2><!--/.entry-title-->
		
		<?php if (get_theme_mod('excerpt-length','16') != '0'): ?>
			<div class="clear"></div>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
		
		<ul class="entry-meta group">
			<li class="entry-category"><?php the_category(' '); ?></li>
			<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) =='on' ) ): ?>
				<li class="entry-comments"><i class="far fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
			<?php endif; ?>
		</ul>
		
	</div>
	
</article><!--/.post-->	