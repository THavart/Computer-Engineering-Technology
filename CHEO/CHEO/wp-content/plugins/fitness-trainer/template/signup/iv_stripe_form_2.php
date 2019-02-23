<?php
// wp_enqueue_style('wp-ep_fitness-style-13', wp_ep_fitness_URLPATH . 'admin/files/css/require 'lib/Stripe.php';';
$newpost_id='';
$post_name='ep_fitness_stripe_setting';
$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
			if(sizeof($row )>0){
			  $newpost_id= $row->ID;
			}
$stripe_mode=get_post_meta( $newpost_id,'ep_fitness_stripe_mode',true);
if($stripe_mode=='test'){
	$stripe_publishable =get_post_meta($newpost_id, 'ep_fitness_stripe_publishable_test',true);
}else{
	$stripe_publishable =get_post_meta($newpost_id, 'ep_fitness_stripe_live_publishable_key',true);
}

?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<div id="payment-errors"></div>

			<div class="row form-group">
										<label for="text" class="col-md-3 control-label"><?php  _e('Package Name','epfitness');?></label>
										<div class="col-md-9 ">
											<?php
											 if( $package_name==""){

												$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'ep_fitness_pack'  and post_status='draft' ";
												$membership_pack = $wpdb->get_results($sql);
												$total_package=count($membership_pack);
												//echo'$total_package.....'.$total_package;
												if(sizeof($membership_pack)>0){
													$i=0;
													echo'<select name="package_sel" id ="package_sel" class=" form-control">';

													foreach ( $membership_pack as $row )
													{

														echo '<option value="'. $row->ID.'" >'. $row->post_title.'</option>';
														if($i==0){$package_id=$row->ID;}
														$i++;
													}

													echo '</select>';
													$package_id= $membership_pack[0]->ID;
													$recurring= get_post_meta($package_id, 'ep_fitness_package_recurring', true);
													if($recurring == 'on'){
														$package_amount=get_post_meta($package_id, 'ep_fitness_package_recurring_cost_initial', true).' '.$api_currency.'/'.get_post_meta($package_id, 'ep_fitness_package_recurring_cycle_count', true).' '.get_post_meta($package_id, 'ep_fitness_package_recurring_cycle_type', true);
													}else{
														$package_amount=get_post_meta($package_id, 'ep_fitness_package_cost',true);
													}

													?>

													<?php
												}


											 }else{
												echo '<label class="control-label"> '.$package_name.'</label>';
												$recurring= get_post_meta($package_id, 'ep_fitness_package_recurring', true);
												if($recurring == 'on'){
														$package_amount=get_post_meta($package_id, 'ep_fitness_package_recurring_cost_initial', true).' '.$api_currency.'/'.get_post_meta($package_id, 'ep_fitness_package_recurring_cycle_count', true).' '.get_post_meta($package_id, 'ep_fitness_package_recurring_cycle_type', true);
													}else{
														$package_amount=get_post_meta($package_id, 'ep_fitness_package_cost',true);
												}

											}


											 ?>
											</div>

										</div>
							<div class="row form-group">
								<label for="text" class="col-md-3 control-label"><?php  _e('Amount','epfitness');?></label>

								<div class="col-md-9 " id="p_amount"> <label class="control-label"> <?php echo $package_amount ; ?> </label>
								</div>
							</div>
							<?php

							 if( get_option('_ep_fitness_payment_coupon')==""){
							?>
							<div class="row form-group" id="show_hide_div">
								<label for="text" class="col-md-3 control-label"></label>
								<div class="col-md-9 mtb10" >
									<button type="button" onclick="show_coupon();"  class="btn-new btn-default-new center"><?php  _e('Have a coupon?','epfitness');?></button>
								</div>
							</div>
							<?php
								require_once(wp_ep_fitness_template.'signup/coupon_form_2.php');

							}
							?>

			<div class="row form-group">
								<label for="text" class="col-md-3 control-label"><?php  _e('Card Number','epfitness');?></label>
								<div class="col-md-9 " >
									<input type="text" name="card_number" id="card_number"  data-validation="creditcard required"  class="form-control-solid ctrl-textbox" placeholder="Enter card number"  data-validation-error-msg="Card number is not correct" >
			</div>
			</div>
		<div class="row form-group">
								<label for="text" class="col-md-3 control-label"><?php  _e('Card CVV ','epfitness');?></label>
								<div class="col-md-9 " >
									<input type="text" name="card_cvc" id="card_cvc" class="form-control-solid ctrl-textbox"   data-validation="number"
data-validation-length="2-6" data-validation-error-msg="CVV number is not correct"placeholder="Enter card CVC" >
			</div>
		</div>
		<div class="row form-group">
								<label for="text" class="col-md-3 control-label"><?php  _e('Expiration (MM/YYYY)','epfitness');?></label>
								<div class="col-md-4" >

									<select name="card_month" id="card_month"  class="card-expiry-month stripe-sensitive required form-control">
										<option value="01" selected="selected">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12" selected >12</option>
									  </select>
								</div>
							<div class="col-md-5 " >
									 <select name="card_year"  id="card_year"  class="card-expiry-year stripe-sensitive  form-control">
									  </select>
									  <script type="text/javascript">
										var select = jQuery(".card-expiry-year"),
										year = new Date().getFullYear();

										for (var i = 0; i < 12; i++) {
											select.append(jQuery("<option value='"+(i + year)+"' "+(i === 0 ? "selected" : "")+">"+(i + year)+"</option>"))
										}
									</script>
								</div>
		</div>
				<?php
									$ep_fitness_payment_terms=get_option('ep_fitness_payment_terms');
									$term_text='I have read & accept the <a href="#"> Terms & Conditions</a>';
									if( get_option( 'ep_fitness_payment_terms_text' ) ) {
										$term_text= get_option('ep_fitness_payment_terms_text');
									}
									if($ep_fitness_payment_terms=='yes'){
									?>

								<div class="row">
									<div class="col-md-3 ">
									</div>
											<div class="col-md-9 ">
											<label>
											  <input type="checkbox" data-validation="required"
			 data-validation-error-msg="You have to agree to our terms "  name="check_terms" id="check_terms"> <?php echo $term_text; ?>
											</label>
										<div class="text-danger" id="error_message" > </div>
									  </div>
								</div>

								<?php
								}

								?>
			<input type="hidden" name="package_id" id="package_id" value="<?php echo $package_id; ?>">
			<input type="hidden" name="form_reg" id="form_reg" value="">
			<input type="hidden" name="action" value="stripe"/>
			<input type="hidden" name="redirect" value="<?php echo get_permalink(); ?>"/>
			<input type="hidden" name="stripe_nonce" value="<?php echo wp_create_nonce('stripe-nonce'); ?>"/>


			<div class="row form-group">
				<label for="text" class="col-md-3 control-label"></label>
				<div class="col-md-9 margin-top-20" >
				 <div id="loading-3" style="display: none;"><img src='<?php echo wp_ep_fitness_URLPATH. 'admin/files/images/loader.gif'; ?>' /></div>
					<button  id="submit_ep_fitness_payment"  type="submit" class="btn-new btn-custom ctrl-btn"  > <?php  _e('Submit','epfitness');?> </button>
				</div>
		</div>




