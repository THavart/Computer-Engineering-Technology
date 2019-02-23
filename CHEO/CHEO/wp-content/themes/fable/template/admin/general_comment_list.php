		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Automatic excerpt length',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Number of words in automatic excerpt.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" id="<?php ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['comment_automatic_excerpt_length']); ?>" maxlength="3"/>
				</div>
			</li>
		</ul>