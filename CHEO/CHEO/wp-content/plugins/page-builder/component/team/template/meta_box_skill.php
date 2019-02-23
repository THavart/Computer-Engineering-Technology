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
										<?php esc_html_e('Skill name',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('Name of the skill, e.g: Web Design.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
									</div>
								</th>
								<th>
									<div class="pb-clear-fix">
										<?php esc_html_e('Skill level',PLUGIN_PAGE_BUILDER_DOMAIN); ?>
										<span class="pb-field-legend"><?php esc_html_e('Integer value from range 1-100.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
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
										<input type="text" name="<?php PBHelper::getFormName('team_skill_name[]'); ?>" value=""/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_skill_level[]'); ?>" value=""/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_skill_order[]'); ?>" value=""/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<a href="#" class="pb-table-button-remove"><?php esc_html_e('Remove',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a>
									</div>
								</td>
							</tr>
<?php
							if(is_array($this->data['option']['team_skill']))
							{
								foreach($this->data['option']['team_skill'] as $value)
								{
?>
							<tr>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_skill_name[]'); ?>" value="<?php echo esc_attr($value['team_skill_name']); ?>"/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_skill_level[]'); ?>" value="<?php echo esc_attr($value['team_skill_level']); ?>"/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<input type="text" name="<?php PBHelper::getFormName('team_skill_order[]'); ?>" value="<?php echo esc_attr($value['team_skill_order']); ?>"/>
									</div>
								</td>
								<td>
									<div class="pb-clear-fix">
										<a href="#" class="pb-table-button-remove"><?php esc_html_e('Remove',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a>
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