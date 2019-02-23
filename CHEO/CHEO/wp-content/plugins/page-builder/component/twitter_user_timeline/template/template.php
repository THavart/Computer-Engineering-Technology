
		<div <?php echo PBHelper::createClassAttribute(array('pb-twitter-user-timeline',$this->data['attribute']['css_class'])) ?> id="<?php echo esc_attr($this->data['id']); ?>" >
			
			<ul class="pb-twitter-user-timeline-list">
<?php
			foreach($this->data['tweet'] as $value)
			{
?>
				<li class="pb-twitter-user-timeline-line">
					<div class="pb-twitter-user-timeline-text">
						<div class="pb-twitter-user-timeline-text-part-1"></div>
						<p class="pb-twitter-user-timeline-text-part-2"><?php echo PBHelper::linkify($value->text); ?></p>
						<div class="pb-twitter-user-timeline-text-part-3"></div>
					</div>
					<div class="pb-twitter-user-timeline-author">
						<?php echo esc_html($value->user->screen_name); ?>
					</div>
					<div class="pb-twitter-user-timeline-date">
						<?php echo esc_html($value->created_at); ?>
					</div>
				</li>
<?php			
			}
?>
			</ul>
			
			<div class="pb-slider-pagination"></div>
				
		</div>

		<div class="pb-script-tag">
			<script type="text/javascript">
				jQuery(document).ready(function($) 
				{
					$('#<?php echo $this->data['id']; ?>').PBTwitterUserTimeline(<?php echo json_encode($this->data['option']); ?>);
				});
			</script>
		</div>