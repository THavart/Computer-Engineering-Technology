		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Post type',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Select one of the available posts types and enter additional details about it (if needed).',THEME_DOMAIN); ?></span>
					<div class="to-clear-fix">
						<select name="<?php ThemeHelper::getFormName('post_type'); ?>" id="<?php ThemeHelper::getFormName('post_type'); ?>">
<?php
						foreach($this->data['dictionary']['postType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['post_type'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
						</select>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Preambule',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Enter preambule (the top part of the post, e.g: video, audio, image slider etc.) of the post. You can use shortcodes in this field.',THEME_DOMAIN); ?></span>
					<div class="to-clear-fix">
						<textarea name="<?php ThemeHelper::getFormName('post_type_preambule'); ?>" id="<?php ThemeHelper::getFormName('post_type_preambule'); ?>"><?php echo esc_html($this->data['option']['post_type_preambule']); ?></textarea>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Show categories',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Show categories.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('post_category_visible'); ?>" id="<?php ThemeHelper::getFormName('post_category_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_category_visible'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_category_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_category_visible'); ?>" id="<?php ThemeHelper::getFormName('post_category_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_category_visible'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_category_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_category_visible'); ?>" id="<?php ThemeHelper::getFormName('post_category_visible_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['post_category_visible'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_category_visible_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Show author',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Show author.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('post_author_visible'); ?>" id="<?php ThemeHelper::getFormName('post_author_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_author_visible'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_author_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_author_visible'); ?>" id="<?php ThemeHelper::getFormName('post_author_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_author_visible'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_author_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_author_visible'); ?>" id="<?php ThemeHelper::getFormName('post_author_visible_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['post_author_visible'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_author_visible_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Show tags',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Show tags.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('post_tag_visible'); ?>" id="<?php ThemeHelper::getFormName('post_tag_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_tag_visible'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_tag_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_tag_visible'); ?>" id="<?php ThemeHelper::getFormName('post_tag_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_tag_visible'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_tag_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_tag_visible'); ?>" id="<?php ThemeHelper::getFormName('post_tag_visible_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['post_tag_visible'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_tag_visible_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Show comments count',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Show comments count.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('post_comment_count_visible'); ?>" id="<?php ThemeHelper::getFormName('post_comment_count_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_comment_count_visible'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_comment_count_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_comment_count_visible'); ?>" id="<?php ThemeHelper::getFormName('post_comment_count_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_comment_count_visible'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_comment_count_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_comment_count_visible'); ?>" id="<?php ThemeHelper::getFormName('post_comment_count_visible_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['post_comment_count_visible'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_comment_count_visible_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Show post navigation',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Show previous/next post navigation.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('post_navigation_visible'); ?>" id="<?php ThemeHelper::getFormName('post_navigation_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_navigation_visible'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_navigation_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_navigation_visible'); ?>" id="<?php ThemeHelper::getFormName('post_navigation_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_navigation_visible'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_navigation_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('post_navigation_visible'); ?>" id="<?php ThemeHelper::getFormName('post_navigation_visible_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['post_navigation_visible'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('post_navigation_visible_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>				
			</ul>
		</div>