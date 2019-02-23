<?php 
		echo $this->data['nonce']; 
?>
		<div class="pb pb-meta-box">
			
			<ul class="pb-field-list">
				
				<li>
					<h5 class="pb-group-header"><?php esc_html_e('First name',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
					<span class="pb-group-subheader"><?php esc_html_e('Enter first name of team member.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php PBHelper::getFormName('team_first_name'); ?>" id="<?php PBHelper::getFormName('team_first_name'); ?>" value="<?php echo esc_attr($this->data['option']['team_first_name']); ?>" maxlength="255"/>
					</div>
				</li>
				
				<li>
					<h5 class="pb-group-header"><?php esc_html_e('Second name',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
					<span class="pb-group-subheader"><?php esc_html_e('Enter second name of team member.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php PBHelper::getFormName('team_second_name'); ?>" id="<?php PBHelper::getFormName('team_second_name'); ?>" value="<?php echo esc_attr($this->data['option']['team_second_name']); ?>" maxlength="255"/>
					</div>
				</li>
				
				<li>
					<h5 class="pb-group-header"><?php esc_html_e('Position',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
					<span class="pb-group-subheader"><?php esc_html_e('Enter company position of team member.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
					<div>
						<input type="text" name="<?php PBHelper::getFormName('team_position'); ?>" id="<?php PBHelper::getFormName('team_position'); ?>" value="<?php echo esc_attr($this->data['option']['team_position']); ?>" maxlength="255"/>
					</div>
				</li>
				
				<li>
					<h5 class="pb-group-header"><?php esc_html_e('URL',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
					<span class="pb-group-subheader">
						<?php esc_html_e('URL of page, which has to be open after clicking on team member image/name.',PLUGIN_PAGE_BUILDER_DOMAIN); ?><br/>
						<?php esc_html_e('An image is opening by default (when URL isn\'t specified).',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
					</span>
					<div>
						<input type="text" name="<?php PBHelper::getFormName('team_url'); ?>" id="<?php PBHelper::getFormName('team_url'); ?>" value="<?php echo esc_attr($this->data['option']['team_url']); ?>"/>
					</div>
				</li>

			</ul>
			
		</div>

		<script type="text/javascript">

			jQuery(document).ready(function($) 
			{
				var object=$().pageBuilder({init:false});
				object.style();
			});

		</script>