		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('404 error page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for 404 page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('page_404_page_id'); ?>" id="<?php ThemeHelper::getFormName('page_404_page_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $value)
							echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['page_404_page_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>