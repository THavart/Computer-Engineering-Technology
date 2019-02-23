		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Blog category page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for category page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_category_post_id'); ?>" id="<?php ThemeHelper::getFormName('blog_category_post_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $value)
							echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_category_post_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Blog archive page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for archive page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_archive_post_id'); ?>" id="<?php ThemeHelper::getFormName('blog_archive_post_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $value)
							echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_archive_post_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Blog search page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for search page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_search_post_id'); ?>" id="<?php ThemeHelper::getFormName('blog_search_post_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $value)
							echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_search_post_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Blog author page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for author page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_author_post_id'); ?>" id="<?php ThemeHelper::getFormName('blog_author_post_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $value)
							echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_author_post_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Post sorting',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Set post sorting in blog pages.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_sort_field'); ?>" id="<?php ThemeHelper::getFormName('blog_sort_field'); ?>">
<?php
						foreach($this->data['dictionary']['sortPostBlogField'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_sort_field'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('blog_sort_direction'); ?>" id="<?php ThemeHelper::getFormName('blog_sort_direction'); ?>">
<?php
						foreach($this->data['dictionary']['sortDirection'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['blog_sort_direction'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Automatic excerpt length',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Number of words in automatic excerpt.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('blog_automatic_excerpt_length'); ?>" id="<?php ThemeHelper::getFormName('blog_automatic_excerpt_length'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['blog_automatic_excerpt_length']); ?>" maxlength="3"/>
				</div>
			</li>
		</ul>