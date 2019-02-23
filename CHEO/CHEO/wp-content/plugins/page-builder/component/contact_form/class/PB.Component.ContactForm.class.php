<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentContactForm extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Layout=new PBLayout();
		
		$this->style=array
		(
			'contact-form'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'contact-form'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.ContactForm.js'
			)
		);	
		
		if(PBComponentData::get($this->getComponentId(),'infieldlabel_enable')==1)
		{			
			$this->script['jquery-infieldlabel']=array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.infieldlabel.min.js'
			);
		}
		
		$this->SMTPSecureConnectionType=array
		(
			'SSL'																=>	__('SSL',PLUGIN_PAGE_BUILDER_DOMAIN),
			'TLS'																=>	__('TLS',PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->fieldType=array
		(
			'email'																=>	__('E-mail',PLUGIN_PAGE_BUILDER_DOMAIN),
			'text'																=>	__('Text',PLUGIN_PAGE_BUILDER_DOMAIN),
			'textarea'															=>	__('Textarea',PLUGIN_PAGE_BUILDER_DOMAIN),
			'select'															=>	__('Drop-down list',PLUGIN_PAGE_BUILDER_DOMAIN),
			'submit'															=>	__('Submit button',PLUGIN_PAGE_BUILDER_DOMAIN),
		);	
		
		$this->layout=array();
		foreach($Layout->layout as $index=>$value)
			$this->layout[$index]=$value['name'];
		
		$this->component=array
		(
			'name'																=>	__('Contact Form',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Contact Form',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Contact Form',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'ui'															=>	array
				(
					'panel'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('General',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Account details',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('E-mail message',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Notices',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Fields',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						6														=>	array
						(
							'header'											=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Recipient',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Recipient name and e-mail address',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Sender',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Sender name and e-mail address',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						3														=>	array
						(
							'header'											=>	__('Sender SMTP',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Specify SMTP settings (if it is needed)',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						4														=>	array
						(
							'header'											=>	__('Columns content',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Enter name (or names, separated by comma) of the fields which have to put in one of the columns in this line',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						5														=>	array
						(
							'header'											=>	__('Columns CSS classes',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Enter name (or names, separated by spaces) CSS class for each single column',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Field',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Line',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),	
				'element'														=>	array
				(
					array
					(
						'id'													=>	'css_class',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('CSS class',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'debug',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Debug contact form',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Enable this option if you have problems with working of contact form',PLUGIN_PAGE_BUILDER_DOMAIN),__('Then, you can check the result of processing request via Fire- or Chromebug console',PLUGIN_PAGE_BUILDER_DOMAIN))
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'reset',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Reset contact form',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable this option if you would like to reset all fields in contact form after sending message',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),
					array
					(
						'id'													=>	'redirect_success_url',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Redirect',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Redirect user to URL when contact form will be sent without errors.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'recipient_name',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Name',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						)
					),
					array
					(
						'id'													=>	'recipient_email',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('E-mail address',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						)
					),
					array
					(
						'id'													=>	'recipient_additional',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('List of additional recipients in format: <i>recipient_name_1:recipient_email_1;recipient_name_2:recipient_email_2</i>',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'sender_name',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Name',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						)
					),					
					array
					(
						'id'													=>	'sender_email',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('E-mail address',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						)
					),					
					array
					(
						'id'													=>	'sender_smtp_username',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Username',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),	
					array
					(
						'id'													=>	'sender_smtp_password',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Password',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),	
					array
					(
						'id'													=>	'sender_smtp_host',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Host',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),						
					array
					(
						'id'													=>	'sender_smtp_port',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Port',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'sender_smtp_secure_connection_type',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Secure connection type',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->SMTPSecureConnectionType),
								)
							)
						)
					),
					array
					(
						'id'													=>	'subject',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Subject',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter subject of the message',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'message/message_subject/@content'
						)
					),
					array
					(
						'id'													=>	'message',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Message',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter text of the message',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'editor',
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'message/message_content/@content'
						)
					),
					array
					(
						'id'													=>	'notice_success',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Success notice',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Notice displayed when e-mail has been sent',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	__('Thank you for contacting us.',PLUGIN_PAGE_BUILDER_DOMAIN)	
						)
					),					
					array
					(
						'id'													=>	'notice_error',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Error notice',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Notice displayed when email has not been sent (an error occurs)',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	__('Sorry, we cannot send this message.',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),						
					array
					(
						'id'													=>	'field_type',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Field type',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->fieldType),
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@type',
							'default'											=>	'text'
						)
					),	
					array
					(
						'id'													=>	'field_mandatory',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Mandatory',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determine, if filling this field is mandatory',PLUGIN_PAGE_BUILDER_DOMAIN),

							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	array(1=>__('Yes',PLUGIN_PAGE_BUILDER_DOMAIN),0=>__('No',PLUGIN_PAGE_BUILDER_DOMAIN))
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@mandatory',
							'default'											=>	'1'
						)
					),
					array
					(
						'id'													=>	'field_value',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Values',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of possible values separated by semicolon for drop-down list',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@value'
						)
					),
					array
					(
						'id'													=>	'field_name',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Name',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Name of the field. This field cannot be empty. This field can contain only characters from range a-z.',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@name'
						)
					),
					array
					(
						'id'													=>	'field_label',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Label',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Label of the field. This field cannot be empty.',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@label'
						)
					),
					array
					(
						'id'													=>	'field_notice',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Error notice',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Error notice displayed when field contains incorrect value (e.g is empty)',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*field/@notice',
							'default'											=>	__('This field cannot be empty.',PLUGIN_PAGE_BUILDER_DOMAIN),
						)
					),
					array
					(
						'id'													=>	'layout_layout',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout for this line',PLUGIN_PAGE_BUILDER_DOMAIN),

							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->layout)
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@layout',
							'default'											=>	'100'
						)
					),
					array
					(
						'id'													=>	'layout_column_1_name',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('First column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_1_name'
						)
					),
					array
					(
						'id'													=>	'layout_column_2_name',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Second column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_2_name'
						)
					),
					array
					(
						'id'													=>	'layout_column_3_name',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Third column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_3_name'
						)
					),
					array
					(
						'id'													=>	'layout_column_4_name',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Fourth column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_4_name'
						)
					),
					array
					(
						'id'													=>	'layout_column_1_css_class',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('First column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_1_css_class'
						)
					),
					array
					(
						'id'													=>	'layout_column_2_css_class',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Second column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_2_css_class'
						)
					),
					array
					(
						'id'													=>	'layout_column_3_css_class',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Third column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_3_css_class'
						)
					),
					array
					(
						'id'													=>	'layout_column_4_css_class',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'multi'												=>	2,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Fourth column',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'layout/*layout_line/@column_4_css_class'
						)
					)
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function initPublic()
	{
		add_action('wp_ajax_page_builder_contact_form_submit',array($this,'createResponse'));
		add_action('wp_ajax_nopriv_page_builder_contact_form_submit',array($this,'createResponse'));
	}
	
	/**************************************************************************/
	
	function createResponse()
	{
		if(ob_get_contents()) ob_clean();
	
		$response=array();
		
		$response['error']=0;
		$response['field']=array();
			
		$Validation=new PBValidation();
		
		$Session=new PBSession();
		$Session->create();
		
		$id=$_POST['id'];
		
		$formMetaData=$Session->getValue($this->getComponentId(),$id);
		if($formMetaData===false) exit;

		$response['debug']=$formMetaData['debug'];
		$response['reset']=$formMetaData['reset'];
		
		$response['redirect_success_url']=$formMetaData['redirect_url']['success'];
		
		if(!array_key_exists('field',$formMetaData)) exit;
		if(!is_array($formMetaData['field'])) exit;
		if(!count($formMetaData['field'])) exit;
		
		$response['notice']['error']=$formMetaData['notice']['error'];
		$response['notice']['success']=$formMetaData['notice']['success'];
		
		$replace=array();
		
		foreach($formMetaData['field'] as $fieldIndex=>$fieldData)
		{
			if($fieldData['type']=='submit') continue;
			
			if(!array_key_exists($fieldIndex,$_POST))
			{
				$response['error']=1;
				continue;
			}
			
			$value=$_POST[$fieldIndex];
			
			if($Validation->isNotEmpty($fieldData['name']))
			{
				if(!array_key_exists($fieldData['name'],$replace))
					$replace[$fieldData['name']]=$value;
			}
			
			if($fieldData['type']=='email')
			{
				if(($Validation->isNotEmpty($value)) || ($fieldData['mandatory']==1))
				{
					if(!$Validation->isEmailAddress($value))
					{
						$response['error']=1;
						$response['field'][$fieldIndex]['notice']=$fieldData['notice'];
					}
				}
			}
			else
			{
				if($fieldData['mandatory']==1)
				{
					if($Validation->isEmpty($value))
					{
						$response['error']=1;
						$response['field'][$fieldIndex]['notice']=$fieldData['notice'];
					}
				}				
			}
		}
		
		if($response['error']==1)
			PBHelper::ajaxResponse($response);
		
		global $pb_phpmailer;
		
		$pb_phpmailer=array();
		
		foreach($replace as $index=>$value)
		{	
			$formMetaData['sender']['name']=preg_replace('/\('.$index.'\)/',$value,$formMetaData['sender']['name']);
			$formMetaData['sender']['email']=preg_replace('/\('.$index.'\)/',$value,$formMetaData['sender']['email']);
		}	
	
		if(($Validation->isEmailAddress($formMetaData['sender']['email'])) && ($Validation->isNotEmpty($formMetaData['sender']['name'])))
			$pb_phpmailer['sender']=array('name'=>$formMetaData['sender']['name'],'email'=>$formMetaData['sender']['email']);
		
		$pb_phpmailer['recipient'][0]=$formMetaData['recipient']['name'].' <'.$formMetaData['recipient']['email'].'>';
		
		$recipientAdditionalData=explode(';',$formMetaData['recipient']['additional']);
		foreach($recipientAdditionalData as $value)
		{
			$recipientAdditional=explode(':',$value);
			
			PBHelper::removeUIndex($recipientAdditional,0,1);

			if(($Validation->isEmailAddress($recipientAdditional[1])) && ($Validation->isNotEmpty($recipientAdditional[0])))
				$pb_phpmailer['recipient'][]=$recipientAdditional[0].' <'.$recipientAdditional[1].'>';
		}
		
		$pb_phpmailer['smtp']['debug']=$formMetaData['debug'];
		
		$pb_phpmailer['smtp']['port']=$formMetaData['sender']['smtp_port'];
		$pb_phpmailer['smtp']['host']=$formMetaData['sender']['smtp_host'];
		$pb_phpmailer['smtp']['username']=$formMetaData['sender']['smtp_username'];
		$pb_phpmailer['smtp']['password']=$formMetaData['sender']['smtp_password'];
		$pb_phpmailer['smtp']['secure_connection_type']=strtolower($formMetaData['sender']['smtp_secure_connection_type']);	
		
		$value=array_map('htmlspecialchars',$replace);
		
		$body=$formMetaData['message_content'];
		foreach($replace as $index=>$value)
			$body=preg_replace('/\['.$index.'\]/',$value,$body);

		$header=array();
        $header[]='Content-type: text/html';	
		
		add_action('phpmailer_init',array($this,'phpMailerInit'));
		
		if(!wp_mail($pb_phpmailer['recipient'],$formMetaData['message_subject'],apply_filters('the_content',$body),$header))
		{
			$response['error']=1;	
			PBHelper::ajaxResponse($response);		
		}

		PBHelper::ajaxResponse($response);
	}
	
	/**************************************************************************/
	
	function phpMailerInit($mail)
	{
		global $pb_phpmailer;
		
		$Validation=new PBValidation();
		
		$mail->CharSet='UTF-8';
		$mail->SetFrom($pb_phpmailer['sender']['email'],$pb_phpmailer['sender']['name']);

		if($Validation->isNotEmpty($pb_phpmailer['smtp']['host']))
		{
			$mail->IsSMTP();
			$mail->SMTPAuth=true; 
			
			if($pb_phpmailer['smtp']['debug']==1) $mail->SMTPDebug=1;
			
			$mail->Username=$pb_phpmailer['smtp']['username'];
			$mail->Password=$pb_phpmailer['smtp']['password'];
			
			$mail->Host=$pb_phpmailer['smtp']['host'];
			$mail->Port=$pb_phpmailer['smtp']['port'];
			
			$mail->SMTPSecure=$pb_phpmailer['smtp']['secure_connection_type'];
		}		
	}

	/**************************************************************************/
	
	function processShortcodeContactForm($attribute,$content,$tag)
	{				
		$attribute=$this->processAttribute($tag,$attribute);

		$this->id=PBHelper::createId('pb_contact_form');
		
		$class=array('pb-contact-form',$attribute['css_class']);
		
		$option=array();
		
		$option['url']=admin_url('admin-ajax.php');
		$option['infieldlabel_enable']=PBComponentData::get($this->getComponentId(),'infieldlabel_enable');

		$sessionData=array
		(
			'debug'										=>	$attribute['debug'],
			'reset'										=>	$attribute['reset'],
			'redirect_url'								=>	array
			(
				'success'								=>	$attribute['redirect_success_url']
			),
			'recipient'									=>	array
			(
				'name'									=>	$attribute['recipient_name'],
				'email'									=>	$attribute['recipient_email'],
				'additional'							=>	$attribute['recipient_additional']
			),
			'sender'									=>	array
			(
				'name'									=>	$attribute['sender_name'],
				'email'									=>	$attribute['sender_email'],
				'smtp_username'							=>	$attribute['sender_smtp_username'],
				'smtp_password'							=>	$attribute['sender_smtp_password'],
				'smtp_host'								=>	$attribute['sender_smtp_host'],
				'smtp_port'								=>	$attribute['sender_smtp_port'],
				'smtp_secure_connection_type'			=>	$attribute['sender_smtp_secure_connection_type']
			),
			'notice'									=>	array
			(
				'error'									=>	$attribute['notice_error'],
				'success'								=>	$attribute['notice_success']
			)
		);
		
		$PBSession=new PBSession();
		$PBSession->setValue($this->getComponentId(),$this->id,$sessionData);
		
		$this->fieldCounter=0;
		
		$content=do_shortcode($content);
		
		if($this->fieldCounter==0)
			$content=do_shortcode($this->createDefaultFieldShortcode());

		$html=
		'
			<form'.PBHelper::createClassAttribute($class).' name="'.esc_attr($this->id).'" id="'.esc_attr($this->id).'" action="#" method="post">
				<div>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</div>
			</form>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$(\'#'.$this->id.'\').PBContactForm('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function createDefaultFieldShortcode()
	{
		$content=null;
		$formField=$this->getFieldData(true);
		
		if($formField!==false)
		{
			foreach($formField as $formFieldData)
				$content.='['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'contact_form_layout_line layout="100" column_1_name="'.$formFieldData['name'].'"][/'.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'contact_form_layout_line]';
			
			$content='['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'contact_form_layout]'.$content.'[/'.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'contact_form_layout]';
		}
		
		return($content);
	}

	/**************************************************************************/
	
	function processShortcodeContactFormMessage($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=do_shortcode($content);	
		
		return($html);
	}
	
	/**************************************************************************/
	
	function processShortcodeContactFormMessageSubject($attribute,$content,$tag)
	{
		$sessionData=array
		(
			'message_subject'		=> $content
		);
		
		$PBSession=new PBSession();
		$PBSession->setValue($this->getComponentId(),$this->id,$sessionData);
	}

	/**************************************************************************/
	
	function processShortcodeContactFormMessageContent($attribute,$content,$tag)
	{
		$sessionData=array
		(
			'message_content'		=> $content
		);
		
		$PBSession=new PBSession();
		$PBSession->setValue($this->getComponentId(),$this->id,$sessionData);
	}
	
	/**************************************************************************/
	
	function processShortcodeContactFormField($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$id=PBHelper::createId('pb_contact_form_field');
		
		$sessionData=array
		(
			'id'			=>	$id,
			'type'			=>	$attribute['type'],
			'name'			=>	$attribute['name'],
			'value'			=>	$attribute['value'],
			'label'			=>	$attribute['label'],
			'notice'		=>	$attribute['notice'],
			'mandatory'		=>	$attribute['mandatory']
		);

		$PBSession=new PBSession();
		$PBSession->setValue($this->getComponentId(),array($this->id,'field',$id),$sessionData);
	
		return($html);
	}
	
	/**************************************************************************/
	
	function processShortcodeContactFormLayout($attribute,$content,$tag)
	{
		$this->fieldCounter=0;
		
		return(do_shortcode($content));
	}
	
	/**************************************************************************/
	
	function processShortcodeContactFormLayoutLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		
		if(!$Layout->isLayout($attribute['layout'])) return($html);
		
		$columnCount=$Layout->getLayoutColumnCount($attribute['layout']);
		
		for($i=1;$i<=$columnCount;$i++)
		{
			$fieldHTML=null;
			
			if(!$Validation->isEmpty($attribute['column_'.$i.'_name']))
			{
				$field=explode(',',$attribute['column_'.$i.'_name']);
				
				foreach($field as $fieldValue)
				{
					$this->fieldCounter++;

					$class=array('pb-clear-fix','pb-contact-form-field');

					$fieldHTML.=
					'
						<div'.PBHelper::createClassAttribute($class).'>'.$this->createField($fieldValue).'</div>
					';
				}
			}
			
			$class=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($attribute['layout'],$i-1),$attribute['column_'.$i.'_css_class']);
			
			$html.=
			'
				<li'.PBHelper::createClassAttribute($class).'>'.$fieldHTML.'</li>
			';
		}
		
		$class=array('pb-reset-list','pb-clear-fix',$Layout->getLayoutCSSClass($attribute['layout']));
		
		$html=
		'
			<ul'.PBHelper::createClassAttribute($class).'>
				'.$html.'
			</ul>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function getFieldData($name)
	{
		$Session=new PBSession();
		
		$formData=$Session->getValue($this->getComponentId(),$this->id);
		if($formData===false) return(false);

		if(!array_key_exists('field',$formData)) return(false);
		if(!is_array($formData['field'])) return(false);
		if(!count($formData['field'])) return(false);	
		
		if($name===true) return($formData['field']);
		
		foreach($formData['field'] as $field)
		{
			if($field['name']===$name) return($field);
		}
	}
	
	/**************************************************************************/
	
	function createField($name)
	{
		$html=null;
		$Validation=new PBValidation();
		
		$data=$this->getFieldData($name);
		if($data===false) return($html);
		
		$argument=array();
		$argumentString=null;
		
		$argument['id']=$data['id'];
		$argument['name']=$data['id'];
		
		foreach($argument as $index=>$value)
			$argumentString.=' '.$index.'="'.esc_attr($value).'"';
		
		switch($data['type'])
		{
			case 'text':
				
				$html='<input type="text"'.$argumentString.'/>';
			
			break;
			
			case 'email':
				
				$html='<input type="text"'.$argumentString.'/>';
				
			break;
		
			case 'submit':
				
				$html='<input type="submit" value="'.esc_attr($data['label']).'"'.$argumentString.'/>';
				
			break;
		
			case 'select':
				
				$option=preg_split('/;/',$data['value']);
				
				foreach($option as $value)
				{
					if($Validation->isNotEmpty($value))
						$html.='<option value="'.esc_attr($value).'">'.esc_html($value).'</option>';
				}
				
				$html='<select'.$argumentString.'>'.$html.'</select>';
				
			break;
		
			case 'textarea':
				
				$html='<textarea rows="1" cols="1"'.$argumentString.'></textarea>';
				
			break;		
		}
		
		if(in_array($data['type'],array('text','textarea','email')))
			$html='<label for="'.$argument['id'].'" class="pb-infield-label">'.esc_html($data['label']).'</label>'.$html;
		
		return(PBHelper::formatHTML($html));		
	}
		
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/