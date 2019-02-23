<?php
global $wpdb;	
		
	$email_body = get_option( 'ep_fitness_contact_email');
	$contact_email_subject = get_option( 'ep_fitness_contact_email_subject');			
					
		$admin_mail = get_option('admin_email');	
		if( get_option( 'admin_email_ep_fitness' )==FALSE ) {
			$admin_mail = get_option('admin_email');						 
		}else{
			$admin_mail = get_option('admin_email_ep_fitness');								
		}						
	$bcc_message='';
	 if( get_option( '_ep_fitness_bcc_message' ) ) {
		  $bcc_message= get_option('_ep_fitness_bcc_message'); 
	 }	
	$wp_title = get_bloginfo();
	
					
	parse_str($_POST['form_data'], $form_data);
	$dir_id=$form_data['dir_id'];	
	$dir_detail= get_post($dir_id); 
	$dir_title= '<a href="'.get_permalink($dir_id).'">'.$dir_detail->post_title.'</a>';		
	// Email for Client	
	
	$user_id=$dir_detail->post_author;
	$user_info = get_userdata( $user_id);		
		
	$client_email_address =$user_info->user_email;
	
	
	//$visitor_id=get_current_user_id();
	$visitor_email_address='';
	
	$visitor_email_address=$form_data['email_address'];
	
		
				
	
	$email_body = str_replace("[iv_member_sender_email]", $visitor_email_address, $email_body);
	$email_body = str_replace("[iv_member_directory]", $dir_title, $email_body);
	$email_body = str_replace("[iv_member_message]", $form_data['message-content'], $email_body);	
	
	
			
	$auto_subject=  $contact_email_subject; 
	
	$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Reply-To: ".$client_email_address  ,"Content-Type: text/html");
	
		
	$h = implode("\r\n", $headers) . "\r\n";
	wp_mail($client_email_address, $auto_subject, $email_body, $h);
	
	// Contact Email 
	$contact_email= get_post_meta($dir_id,'contact-email',true); 
	if($client_email_address!=$contact_email){
			$h = implode("\r\n", $headers) . "\r\n";
			wp_mail($contact_email, $auto_subject, $email_body, $h);	
			
	}	
	
	if($bcc_message=='yes'){
			$h = implode("\r\n", $headers) . "\r\n";
			wp_mail($admin_mail, $auto_subject, $email_body, $h);	
	}	
	
