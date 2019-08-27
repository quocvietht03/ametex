<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<?php
		if(is_archive()){
			?>
				<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
		}
		
		if (has_post_thumbnail()){
			?>
				<div class="bt-media"><?php the_post_thumbnail() ?></div>
			<?php
		}
		?>
		
		<ul class="bt-meta">
			<li><?php echo '<i class="fa fa-user"></i> '.esc_html__('by ', 'ametex'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
			<li><?php echo '<i class="fa fa-calendar"></i> '.esc_html__('Posted on ', 'ametex'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
			<?php if( comments_open()){ ?>
				<li><i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('No Comments', 'ametex'), esc_html__('One Comment', 'ametex'), esc_html__('% Comments', 'ametex') ); ?></a></li>
			<?php } ?>
			<?php the_terms( get_the_ID(), 'category', '<li class="bt-term"><i class="fa fa-folder"></i> '.esc_html__('in ', 'ametex'), ', ', '</li>' ); ?>
		</ul>
		
		<?php
			if(is_single()){
				?>
					<div class="bt-content">
						<?php
							the_content();
							wp_link_pages(array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'ametex'),
								'after' => '</div>',
							));
						?>
					</div>
				<?php
				
				if(has_tag()){
					?>
						<div class="bt-tags">
							<?php the_tags( '<h4>'.esc_html__('Tags: ', 'ametex').'</h4>', ', ', '' ); ?>
						</div>
					<?php
				}
			}else{
				?>
					<div class="bt-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a class="bt-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'ametex'); ?></a>
				<?php
			}
		?>
	</div>
</article>
