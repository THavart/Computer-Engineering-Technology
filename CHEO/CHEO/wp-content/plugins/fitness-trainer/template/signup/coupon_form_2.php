<div id="coupon-div" style="display: none; margin-bottom: 20px;">


	<div class="row form-group">
		<label for="text" class="col-md-3 control-label"><?php  _e('Discount Coupon','epfitness');?></label>

		<div class="col-md-8 ">  <input type="text" class="form-control-solid" name="coupon_name" id="coupon_name" value="" placeholder="Enter Coupon Code">
		</div>
		<div class="col-md-1 pull-left" id="coupon-result">
		</div>
	</div>
	<div class="row">
		<label for="text" class="col-md-3 control-label"><?php  _e('(-) Discount','epfitness');?></label>

		<div class="col-md-9 " id="discount">
		</div>
	</div>

	<div class="row">
		<label for="text" class="col-md-3 control-label"><?php  _e('Total','epfitness');?></label>

		<div class="col-md-9" id="total"><label class="control-label">  <?php echo $package_amount.''.$api_currency; ?></label>
		</div>
	</div>
</div>


