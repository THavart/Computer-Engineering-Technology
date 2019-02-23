<?php 
		echo $this->data['nonce']; 
?>
		<div class="pb pb-meta-box">
			
			<ul class="pb-field-list">
				
				<li>					
					
					<div class="pb-clear-fix">
						<table id="<?php echo esc_attr($this->data['tableId']); ?>" class="pb-table">
							<tr>
								<th>
									<div class="pb-clear-fix">
										<?php esc_html_e('Social network',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('Select social network.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
									</div>
								</th>
								<th>
									<div class="pb-clear-fix">
										<?php esc_html_e('URL',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('URL address of the social profile.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
									</div>
								</th>
								<th>
									<div class="pb-clear-fix">
										<?php esc_html_e('Order',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('Integer value.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
									</div>
								</th>
								<th>
									<div class="pb-clear-fix">
										<?php esc_html_e('Remove',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('Click to remove row.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
									</div>
								</th>
							</tr>
							<tr class="pb-hidden">
								<td>
									<div class="pb-clear-fix">
										<select name="<?php PBHelper::getFormName('team_social_name[]'); ?>" id="<?php PBHelper::getFormName('team_social_name'); ?>" class="pb-dropkick-0">
<?php
										foreach($this->data['dictionary']['social'] as $index=>$value)
											echo '<option value="'.esc_attr($index).'">'.esc_html($value[0]).'</option>';
?>
										</select>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_social_url[]'); ?>" value=""/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_social_order[]'); ?>" value=""/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<a href="#" class="pb-table-button-remove"><?php esc_html_e('Remove',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a>
									</div>
								</td>
							</tr>
<?php
							if(is_array($this->data['option']['team_social']))
							{
								foreach($this->data['option']['team_social'] as $index=>$value)
								{
?>
							<tr>
								<td>
									<div class="pb-clear-fix">
										<select name="<?php PBHelper::getFormName('team_social_name[]'); ?>" id="<?php PBHelper::getFormName('team_social_name_'.PBHelper::createId(16)); ?>">
<?php
										foreach($this->data['dictionary']['social'] as $socialIndex=>$socialValue)
											echo '<option value="'.esc_attr($socialIndex).'" '.(PBHelper::returnIf($value['team_social_name'],$socialIndex,'selected',false)).'>'.esc_html($socialValue[0]).'</option>';
?>
										</select>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_social_url[]'); ?>" value="<?php echo esc_attr($value['team_social_url']); ?>"/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_social_order[]'); ?>" value="<?php echo esc_attr($value['team_social_order']); ?>"/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<a href="#" class="pb-table-button-remove"><?php esc_attr_e('Remove',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a>
									</div>
								</td>
							</tr>					
<?php		
								}
							}
?>
						</table>
						<div class="pb-clear-fix"> 
							<a href="#" class="pb-table-button-add"><?php esc_html_e('Add',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a>
						</div>
					</div>
				</li>
				
			</ul>
			
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var object=$().pageBuilder({init:false});
				object.style();
				
				$('#<?php echo $this->data['tableId']; ?>').PBTable();
			});
		</script>