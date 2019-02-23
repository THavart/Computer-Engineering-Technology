		<p>
			<label for="<?php echo esc_attr($this->data['option']['title']['id']); ?>"><?php esc_html_e('Title',THEME_DOMAIN); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['title']['id']); ?>" name="<?php echo esc_attr($this->data['option']['title']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['title']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['post_count']['id']); ?>"><?php esc_html_e('Total number of posts to show',THEME_DOMAIN); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['post_count']['id']); ?>" name="<?php echo esc_attr($this->data['option']['post_count']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['post_count']['value']); ?>" />
		</p>