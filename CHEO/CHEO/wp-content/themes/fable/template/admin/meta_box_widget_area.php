		<?php echo $this->data['nonce']; ?>
		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Footer layout',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Select layout of widgets in footer. This option works only if this widget area is selected as sidebar in footer.',THEME_DOMAIN); ?></span>
					<div class="to-clear-fix">
						<select name="<?php ThemeHelper::getFormName('widget_area_footer_layout'); ?>" id="<?php ThemeHelper::getFormName('widget_area_footer_layout'); ?>">
<?php
							foreach($this->data['dictionary']['layout'] as $index=>$value)
								echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_footer_layout'],$index,false)).'>'.ThemeHelper::esc_html($index).'</option>';
?>
						</select>
					</div>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
			});
		</script>