<?php
		
		$form_id='';
		$form_name='ep_fitness_account_form';
		$form_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $form_name . "' ORDER BY `ID` DESC");

		?>
	
		
		
		<div class="form-group">
				<label  class="col-md-2   control-label"> Denial Email Subject : </label>
				<div class="col-md-4 ">
					
						<?php
						$ep_fitness_denial_email_subject = get_option( 'ep_fitness_denial_email_subject');
						
						?>
						
						<input type="text" class="form-control" id="ep_fitness_denial_email_subject" name="ep_fitness_denial_email_subject" value="<?php echo $ep_fitness_denial_email_subject; ?>" placeholder="Enter denial email subject">
				
			</div>
		</div>
		<div class="form-group">
				<label  class="col-md-2   control-label">Denial Email Tempalte : </label>
				<div class="col-md-10 ">
															<?php
							$settings_a = array(															
								'textarea_rows' =>20,															 
								);
							$content_denial = get_option( 'ep_fitness_denial_email');
							$editor_id = 'denial_email_template';
							//wp_editor( $content_reminder, $editor_id,$settings_a );										
							?>
							<textarea id="denial_email_template" name="denial_email_template" rows="20" class="col-md-12 "><?php echo $content_denial; ?></textarea>

			</div>
		</div>
		
		

		


