<h4>
	<?php _e('Comments & Feedback','epfitness'); ?> 
</h4>
<hr>
<script>
jQuery('document').ready(function($){
    var commentform=$('#commentform'); // find the comment form
    commentform.prepend('<div id="comment-status" ></div>'); // add info panel before the form to provide feedback or errors
    var statusdiv=$('#comment-status'); // define the infopanel

    commentform.submit(function(){
        //serialize and store form data in a variable
        var formdata=commentform.serialize();
        //Add a status message
        statusdiv.html('<p><?php _e('Processing...','epfitness'); ?></p>');
        //Extract action URL from commentform
        var formurl=commentform.attr('action');
        //Post Form with data
        $.ajax({
            type: 'post',
            url: formurl,
            data: formdata,
            error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    statusdiv.html('<p class="ajax-error" ><?php _e('Posting too quickly.','epfitness'); ?></p>');
                },
            success: function(data, textStatus){
                if(data == "success" || textStatus == "success"){
                    statusdiv.html('<p class="ajax-success" ><?php _e('Thanks for your comment. We appreciate your response.','epfitness'); ?></p>');
                    jQuery('#commentform').reset();
                }else{
                    statusdiv.html('<p class="ajax-error" ><?php _e('Please wait a while before posting your next comment','epfitness'); ?></p>');
                    commentform.find('textarea[name=comment]').val('');
                }
            }
        });
        return false;
    });
});
</script>	
<?php 
		$args = array(
			//'order' => 'DESC',		
			'post_id' => $post_data->ID,	
			'status' => 'all',	
			'user_id' => $current_user->ID,
			'count' => false,
			'date_query' => null, // See WP_Date_Query
		);
	$comments = get_comments($args);
	
	foreach($comments as $comment) :
		
		?>
		<div class="row">
			
			<div class="comment-author vcard col-md-2 ">
			<?php   
				$image_profile=get_user_meta($current_user->ID, 'iv_profile_pic_url',true);					
			 ?>
			 <img class="img-circle" src="<?php echo $image_profile; ?>" >	 
			
			</div>
			<div class="col-md-10">
					<div class="col-md-12">
						<?php echo $comment->comment_author; ?>
					</div>
					<div class="col-md-12">
						<small><?php echo $comment->comment_date; ?></small>
					</div>
					<div class="col-md-12">
						<?php echo $comment->comment_content; ?>
					</div>
					
			</div>
			
		</div>	
		<hr/>
		<?php
			//echo($comment->comment_author . ' 00:' . . '<hr/>' );
				$args2 = array(
					'status' => 'all', 					
					'parent' => $comment->comment_ID,
				);
				$comments2 = get_comments($args2);
				foreach($comments2 as $child_comment) {
					//print_r($child_comment);
					$childuser = get_user_by( 'email', $child_comment->comment_author_email);
					$cuserId = $childuser->ID;
					?>
					<div class="row">	
						<div class="comment-author vcard col-md-2 ">
						<?php   
							$image_profile=get_user_meta($cuserId, 'iv_profile_pic_url',true);			
						 ?>
						 <img class="img-circle" src="<?php echo $image_profile; ?>" >	 
						
						</div>	
						<div class="col-md-10">
								<div class="col-md-12">
									<?php echo $child_comment->comment_author; ?>
								</div>
								<div class="col-md-12">
									<small><?php echo $child_comment->comment_date; ?></small>
								</div>
								<div class="col-md-12">
							<?php echo $child_comment->comment_content; ?>
						</div>
						</div>
						
						
									
						
						
					</div>	
					<hr/>					
					<?php					
				}
		
	endforeach;
		?>
 <?php 
$comments_args = array(
			// Change the title of send button 
			'label_submit' => __( 'Send', 'epfitness' ),
			// Change the title of the reply section
			'title_reply'=>'',
			'logged_in_as'=>'',
			// Redefine your own textarea (the comment body).
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Any comments or feedback (Only you & expert will view)?', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	);
	comment_form( $comments_args, $post_data->ID );
?>
				
