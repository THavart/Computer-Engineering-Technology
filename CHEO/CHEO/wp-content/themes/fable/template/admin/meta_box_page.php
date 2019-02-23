		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Restrict displaying posts only from selected categories',THEME_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('Select blog categories from which posts have to be displayed.',THEME_DOMAIN); ?><br/>
						<?php esc_html_e('This option is available only for blog pages.',THEME_DOMAIN); ?>
					</span>
					<div class="to-checkbox-button">
<?php
		$i=0;
		foreach($this->data['dictionary']['postCategory'] as $index=>$value)
		{
			$i++;
?>
						<input type="checkbox" name="<?php ThemeHelper::getFormName('post_category[]'); ?>" id="<?php ThemeHelper::getFormName('post_category_'.$i); ?>" value="<?php echo ThemeHelper::esc_attr($index); ?>" <?php ThemeHelper::checkedIf($this->data['option']['post_category'],$index); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_category_'.$i); ?>"><?php echo ThemeHelper::esc_html($value); ?></label>
<?php
		}
?>
					</div>
				</li>				
			</ul>
		</div>