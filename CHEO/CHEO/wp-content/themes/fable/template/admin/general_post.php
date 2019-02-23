		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Show post categories',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Show post categories.',THEME_DOMAIN); ?><br/></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('post_category_visible'); ?>" id="<?php ThemeHelper::getFormName('post_category_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_category_visible'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_category_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('post_category_visible'); ?>" id="<?php ThemeHelper::getFormName('post_category_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_category_visible'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_category_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Show post author',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Show post author.',THEME_DOMAIN); ?><br/></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('post_author_visible'); ?>" id="<?php ThemeHelper::getFormName('post_author_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_author_visible'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_author_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('post_author_visible'); ?>" id="<?php ThemeHelper::getFormName('post_author_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_author_visible'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_author_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Show post tags',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Show post tags.',THEME_DOMAIN); ?><br/></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('post_tag_visible'); ?>" id="<?php ThemeHelper::getFormName('post_tag_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_tag_visible'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_tag_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('post_tag_visible'); ?>" id="<?php ThemeHelper::getFormName('post_tag_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_tag_visible'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_tag_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Show post comment count',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Show post comment count.',THEME_DOMAIN); ?><br/></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('post_comment_count_visible'); ?>" id="<?php ThemeHelper::getFormName('post_comment_count_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_comment_count_visible'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_comment_count_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('post_comment_count_visible'); ?>" id="<?php ThemeHelper::getFormName('post_comment_count_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_comment_count_visible'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_comment_count_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Show post navigation',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Show previous/next post navigation.',THEME_DOMAIN); ?><br/></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('post_navigation_visible'); ?>" id="<?php ThemeHelper::getFormName('post_navigation_visible_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['post_navigation_visible'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_navigation_visible_1'); ?>"><?php esc_html_e('Yes',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('post_navigation_visible'); ?>" id="<?php ThemeHelper::getFormName('post_navigation_visible_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['post_navigation_visible'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('post_navigation_visible_0'); ?>"><?php esc_html_e('No',THEME_DOMAIN); ?></label>
				</div>
			</li>			
		</ul>