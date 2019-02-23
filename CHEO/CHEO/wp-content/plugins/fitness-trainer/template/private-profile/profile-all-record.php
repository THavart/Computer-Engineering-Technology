<?php
	$profile_url=get_permalink(); 
	global $current_user;
	 $current_user = wp_get_current_user();
	$user = $current_user->ID;
	$message='';
if(isset($_GET['delete_id']))  {
	$post_id=$_GET['delete_id'];
	$post_edit = get_post($post_id); 
	
	if($post_edit->post_author==$current_user->ID){
		wp_delete_post($post_id);
		delete_post_meta($post_id,true);
		$message="Deleted Successfully";
	}
}
wp_enqueue_style('all-post-style', wp_ep_fitness_URLPATH. 'admin/files/css/all-post.css', array(), $ver = false, $media = 'all');
?>    
				
     <div class="profile-content">            
              <div class="portlet light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
							  <span class="caption-subject"> 
								  <?php
											$iv_post = 'physical-record'; //get_option( '_ep_fitness_profile_post');
											_e('My Physical Records','epfitness');	
							?></span>
							
							
					</div>						
                  </div>     
                  
                               
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="" id="tab_1_1">  <?php
						
						if($message!=''){
						 echo  '<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'.$message.'.</div>';
						}
						
						?>
					<div class="listing-table">
					 <table class="table table-striped ">							
							<?php
								//if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
								global $wpdb;
									$per_page=20;$row_strat=0;$row_end=$per_page;
									$current_page=0 ;
									if(isset($_REQUEST['cpage']) and $_REQUEST['cpage']!=1 ){   
										$current_page=$_REQUEST['cpage']; $row_strat =($current_page-1)*$per_page; 
										$row_end=$per_page;
									}
									$sql="SELECT * FROM $wpdb->posts WHERE post_type IN ('physical-record' )  and post_author='".$current_user->ID."' and post_status IN ('publish','pending','draft' )  ORDER BY `ID` DESC limit ".$row_strat.", ".$row_end;									
									$authpr_post = $wpdb->get_results($sql);
									$total_post=count($authpr_post);									
									if($total_post>0){
										$i=0; 
										foreach ( $authpr_post as $row )								
										{								
											
										?>
										
												<tr>
													<td width="20%"  style="vertical-align: top;"> 												
													<?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $row->ID), 'medium' ); 
													
													if($feature_image[0]!=""){ ?>																							
																<img title="profile image" style="width:100%;"  src="<?php  echo $feature_image[0]; ?>">
													<?php												
													}else{
														echo'	 <img src="'. wp_ep_fitness_URLPATH.'assets/images/Blank-Profile.jpg">';
													}		
													?>
													&nbsp; 
												</td>
												
												 <td width="22%" style="font-size:14px;vertical-align: top;">
													 <p> <?php esc_html_e('Date','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'date',true); ?></p>
													 <p> <?php esc_html_e('Week','epfitness'); ?> #: <?php echo  get_post_meta($row->ID,'week',true); ?> </p>
													 <p> <?php esc_html_e('Height','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'height',true); ?> </p>
													 <p> <?php esc_html_e('weight','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'weight',true); ?> </p>
													 <p> <?php esc_html_e('Chest','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'chest',true); ?> </p>  
													 <p> <?php esc_html_e('Left Arm','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'l-arm',true); ?> </p>
													 <p> <?php esc_html_e('Right Arm','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'r-arm',true); ?> </p>
													
													
													   
													 
												</td>
												 <td width="22%" style="font-size:14px;vertical-align: top;">
													  <p> <?php esc_html_e('Waist','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'waist',true); ?> </p>
													 <p> <?php esc_html_e('Abdomen','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'abdomen',true); ?></p>
													 <p> <?php esc_html_e('Hips','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'hips',true); ?> </p>
													 <p> <?php esc_html_e('Left Thigh','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'l-thigh',true); ?> </p>
													 <p> <?php esc_html_e('Right Thigh','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'r-thigh',true); ?> </p>
													 <p> <?php esc_html_e('Left Calf','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'l-calf',true); ?> </p>  
													 <p> <?php esc_html_e('Right Calf','epfitness'); ?>: <?php echo  get_post_meta($row->ID,'r-calf',true); ?> </p>
													 													 
												</td>
											
												 <td width="24%" style="font-size:14px;vertical-align: top;">
												 
												 <p> <b>Expert Review: </b> </p>
												 
												 <p>
													<?php
														$content = $row->post_content; //apply_filters( 'the_content', get_the_content() );
														$content = str_replace( ']]>', ']]&gt;', $content );
														echo  $content;
													?> 
													 
												 
												 </p>										
												 
												 </td>
												<td width="12%" style="font-size:14px;vertical-align: top;" >
													<?php	
														
														$edit_url='record';																						
														$edit_post= $profile_url.'?&profile='.$edit_url.'-edit&post-id='.$row->ID;										
														?>											
														
														<a href="<?php echo $profile_url.'?&profile='.$edit_url.'-edit&post-id='.$row->ID ;?>"  class="btn btn-xs"><?php esc_html_e('Edit','epfitness'); ?> 									
														</a>
													
																						
													<a href="<?php echo $profile_url.'?&profile=all-records&delete_id='.$row->ID ;?>"  onclick="return confirm('Are you sure to delete this post?');"  class="btn btn-xs btn-danger">X										
													</a>
													
													</td>
											</tr>
								 
								<?php 
										}
									}else{ 										
										 ?>
										<tr>
											<td colspan="100%">
											<?php esc_html_e('Currently you have no data added. Please manage your account from the sidebar on the left.','epfitness'); ?>
											</td>
										</tr>
									<?php
									}	
								
								 ?>	
	
					</table>
					
					
					</div>
							<div class="center">
								<?php
								$sql2="SELECT * FROM $wpdb->posts WHERE post_type IN ('physical-record' )  and post_author='".$current_user->ID."' and post_status IN ('publish' ) ";
								$authpr_post2 = $wpdb->get_results($sql2);
								$total_post=count($authpr_post2);
								$total_page= $total_post/$per_page;
								$total_page=ceil( $total_page);
								$current_page =($current_page==''? '1': $current_page );
								echo ' <ul class="iv-pagination">';										
								for($i=1;$i<= $total_page;$i++){
										echo '<li class="list-pagi '.($i==$current_page  ? 'active-li': '').'"><a href="'.get_permalink().'?&profile=all-records&cpage='.$i.'"> '.$i.'</a></li>';		
										
										 
											
											
							
							
								}
								echo'</ul>';
							
							?>
							 </div> 
					 </div>
                     
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->
        
