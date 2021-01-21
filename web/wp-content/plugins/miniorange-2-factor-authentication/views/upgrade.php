<?php
	global $Mo2fdbQueries;
	$user = wp_get_current_user();
	$is_NC = MoWpnsUtility::get_mo2f_db_option('mo2f_is_NC', 'get_option');
	$network_security_enabled = get_option('mo_wpns_2fa_with_network_security');
	$is_customer_registered = $Mo2fdbQueries->get_user_detail( 'user_registration_with_miniorange', $user->ID ) == 'SUCCESS' ? true : false;

	$mo2f_2fa_method_list = array(
		"Google Authenticator",
		"Security Questions",
		"TOTP Based Authenticator",
		"Email Verification",
		"OTP Over Email",
		"OTP Over SMS",
		"OTP Over Whatsapp (Add-on)",
		"OTP Over Telegram",
		"miniOrange QR Code Authentication",
		"miniOrange Soft Token",
		"miniOrange Push Notification",		
		"OTP Over SMS and Email",
		"Hardware Token"
	);

	$mo2f_2fa_method_list_with_plans = array(

		"Google Authenticator"                                         	=> array( true, true,  true, true ),
		"Security Questions"                                  			=> array( true, true,  true, true ),
		"TOTP Based Authenticator"                                      => array( true, true,  true, true ),
		"Email Verification"                                          	=> array( true, true,  true, true ),
		"OTP Over Email"                                          		=> array( true, true,  true, true ),
		"OTP Over SMS"                                          		=> array( true, true,  true, true ),
		"OTP Over Whatsapp (Add-on)"                                    => array( false, false,  false, true ),
		"OTP Over Telegram"                                          	=> array( false, false,  false, true  ),
		"miniOrange QR Code Authentication"                             => array( true, true,  false, false ),
		"miniOrange Soft Token"                                         => array( true, true,  false, false ),
		"miniOrange Push Notification"                                  => array( true, true,  false, false ),
		"OTP Over SMS and Email"                                        => array( true, true,  false, false ),
		"Hardware Token"                                         		=> array( false, true, false, false ),
	);

		$mo2f_2fa_method_description_set = array(
		"Enter the soft token from the account in your Google Authenticator App to login.",
		"Answer the three security questions you had set, to login.",
		"Enter the soft token from the account in your Authy Authenticator / Microsoft Authenticator / TOTP Authenticator App to login.",
		"Accept the verification link sent to your email to login.",
		"You will receive a one time passcode via Email.",
		"You will receive a One Time Passcode via SMS on your Phone",
		"You will receive a One Time Passcode on your Whatsapp account - Supported with twillio",
		"You will receive a One Time Passcode on your Telegram account",
		"Scan the QR code from the account in your miniOrange Authenticator App to login.",
		"Enter the soft token from the account in your miniOrange Authenticator App to login.",
		"Accept a push notification in your miniOrange Authenticator App to login.",		
		"In this method, you receive an sms and an email containing a numeric key which you need to enter.",
		"In this method, you need to connect a usb like token into your computer which generates an alphabetic key.",
	);

	$mo2f_feature_set = array(
		
		"Roles Based and User Based 2fa",
		"Role based Authentication Methods",
		"Force Two Factor",
		"Verification during 2FA Registration",
		"Language Translation Support",
		"Password Less Login",
		"Backup Methods",
		"Role based redirection",
		"Custom SMS Gateway",
		"App Specific Password from mobile Apps",
		"Brute Force Protection",
		"IP Blocking",
		"Monitoring",
		"Strong Password",
		"File Protection"
	);


	$mo2f_feature_set_with_plans = array(

		"Roles Based and User Based 2fa" 										=> array( true, true,  false, true ),
		"Role based Authentication Methods"										=> array( true, true,  true, true ),
		"Force Two Factor"														=> array( true, true,  true, true ),
		"Verification during 2FA Registration"									=> array( true, true,  false, true ),
		"Language Translation Support"                                          => array( true, true,  true, true ),
		"Password Less Login"                            						=> array( true, true,  true, true ),
		"Backup Methods"                                          				=> array( true, true,  false, true),
		"Role based redirection"			                                	=> array( true, true,  true, true ),
		"Custom SMS Gateway"                    								=> array( true, true,  false, true ),
		"App Specific Password from mobile Apps"                       			=> array( true, true,  false, true ),
		"Brute Force Protection"												=> array( false, true, false, false ),
		"IP Blocking"															=> array( false, true,  false, false ),
		"Monitoring"															=> array( false, true,  false, false ),
		"Strong Password"														=> array( false, true,  false, false ),
		"File Protection"														=> array( false, true,  false, false ),

	);

	$mo2f_2fa_feature_description_set = array(

		"Enable and disable 2fa for users based on roles(Like Administrator, Editor and others). It works for custom roles too.",
		"You can choose specific authentication methods for specific user roles",
		"",
		"One time Email Verification for Users during 2FA Registration",
		"You can translate the plugin in a language of your choice",
		"After a valid username is entered, the 2FA prompt will be directly displayed",
		"By using backup you can restore the plugin settings",
		"According to user's role the particular user will be redirected to specific location",
		"Have your own gateway? You can use it, no need to purchase SMS then",
		"For access wordpress on different moblie apps, app specific passwords can be set",
		"This protects your site from attacks which tries to gain access / login to a site with random usernames and passwords.",
		"Allows you to manually/automatically block any IP address that seems malicious from accessing your website. ",
		"Monitor activity of your users. For ex:- login activity, error report",
		"Enforce users to set a strong password.",
		"Allows you to protect sensitive files through the malware scanner and other security features.",
	);

	$mo2f_custom_sms_gateways = array(

		"Solution Infi",			
		"Clickatell",													
		"ClickSend",	
		"Custom SMS Gateway",		
		"Twilio SMS",													
		"SendGrid",
		"Many Other Gateways"

	);

	$mo2f_custom_sms_gateways_feature_set = array(

		"Solution Infi"												=> array( true, true, false, true ),
		"Clickatell"												=> array( true, true, false, true ),
		"ClickSend"													=> array( true, true, false, true ),
		"Custom SMS Gateway"										=> array( true, true, false, true ),		
		"Twilio SMS"												=> array( true, true, false, true ),
		"SendGrid"													=> array( true, true, false, true ),
		"Many Other Gateways"										=> array( true, true, false, true ),

	);

	$mo2f_custom_sms_gateways_description_set = array(

		"Configure and test to add Solution Infi as custom gateway",
		"Configure and test to add Clickatell as custom gateway",
		"Configure and test to add ClickSend as custom gateway",
		"Custom SMS Gateway",
		"Configure and test to add Twilio SMS as custom gateway",
		"Configure and test to add SendGrid as custom gateway",
		"Not Listed? Configure and test to add it as custom gateway",

	);
	$mo2f_addons_set		=	array(
		"RBA & Trusted Devices Management",
		"Personalization",		                 
		"Short Codes"  
	);
	$mo2f_addons           	= array(
		"RBA & Trusted Devices Management" 	=> array( true, true,  false, true ),
		"Personalization"					=> array( true, true,  false, true ),
		"Short Codes"						=> array( true, true,  false, true )
	);
	$mo2f_addons_description_set	=array(
		"Remember Device, Set Device Limit for the users to login, IP Restriction: Limit users to login from specific IPs.",
		"Custom UI of 2FA popups Custom Email and SMS Templates, Customize 'powered by' Logo, Customize Plugin Icon, Customize Plugin Name",
		"Option to turn on/off 2-factor by user, Option to configure the Google Authenticator and Security Questions by user, Option to 'Enable Remember Device' from a custom login form, On-Demand ShortCodes for specific fuctionalities ( like for enabling 2FA for specific pages)",
	);
if ($_GET['page'] == 'mo_2fa_upgrade') {
	?><br><br><?php
}
echo '
<a class="mo2f_back_button" style="font-size: 16px; color: #000;" href="'.$two_fa.'"><span class="dashicons dashicons-arrow-left-alt" style="vertical-align: bottom;"></span> Back To Plugin Configuration</a>';
?>
<br><br>


	<div class="mo_upgrade_toggle">

                    <p class="mo_upgrade_toggle_2fa">

                        <input type="radio" name="sitetype" value="regular_plans" id="regular_plans" onclick="mo_2fa_cloud_show_plans();" style="display: none;" >
                        <label for="regular_plans" id="mo_2fa_cloud_licensing_plans_title" class="mo_upgrade_toggle_2fa_lable" style="display: none;">Unlimited Sites</label>
    					<label for="regular_plans" id="mo_2fa_cloud_licensing_plans_title1" class="mo_upgrade_toggle_2fa_lable mo2f_active_plan">Unlimited Sites</label>

                        <input type="radio" name="sitetype" value="Recharge" id="mo2f_onpremise_plan" onclick="mo_2fa_onpremise_show_plans();" style="display: none;">

                        <label for="mo2f_onpremise_plan" class="mo_upgrade_toggle_2fa_lable" id="mo_2fa_lite_licensing_plans_title">Unlimited Users</label>
    					<label for="mo2f_onpremise_plan" class="mo_upgrade_toggle_2fa_lable mo2f_active_plan" id="mo_2fa_lite_licensing_plans_title1" style="display: none;">Unlimited Users</label>

    					<?php if( get_option("mo_wpns_2fa_with_network_security"))
    						{
    					?>

		    					<input type="radio" name="sitetype" value="Recharge" id="Recharge" onclick="mo_ns_show_plans();" style="display: none;">

		                        <label for="Recharge" class="mo_upgrade_toggle_2fa_lable" id="mo_ns_licensing_plans_title">Website Security</label>
		    					<label for="Recharge" class="mo_upgrade_toggle_2fa_lable mo2f_active_plan" id="mo_ns_licensing_plans_title1" style="display: none;">Website Security</label>
		    			<?php
		    				}
		    			?>
		                        <span class="cd-switch"></span>
		                  
                    </p>
    </div>
<br><br>











<div style="margin-left: 19%;" id="mo2f_unlimited_sites">

    	<div class="mo2f_upgrade_main_div">

    		<div class="mo2f_upgrade_plan_name">
    			<h1 class="mo2f_upgrade_plan_name_title">Premium</h1>
    		</div>
    		<div class="mo2f_upgrade_center_align">
    			<p style="margin-bottom: -16px;">Starting at</p>
    			<h1 class="mo2f_upgrade_plan_amount">$30<span class="mo2f_upgrade_yearly">/year</span></h1>
    		</div>
    		   <hr class="mo2f_upgrade_hr">
    			<div class="mo2f_upgrade_site_details" style="margin-left: 24%;">
    				<div class="mo2f_upgrade_site_details_left">
    					<span class="dashicons dashicons-thumbs-up mo2f_upgrade_thumb_icon"></span>
    				</div>
    				<div class="mo2f_upgrade_site_details_right">
    					<p class="mo2f_upgrade_site_details_name">complete <b>2FA</b></p>
    			
    				</div>
    			</div>
    		<hr class="mo2f_upgrade_hr">
    		<div style="text-align: center;margin-top: 7%;margin-bottom: 7%;">

			<?php
			 if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                        <button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_upgradeform('wp_2fa_premium_plan','2fa_plan')" >Upgrade</button>
		                <?php 
		            }else{ ?>
						<button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_register_and_upgradeform('wp_2fa_premium_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
						
		
		    </div>
		   
    		<p style="margin-top: 20px;text-align: center;">
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Force Two Factor </b>for users</span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details">Enable 2FA for <b>specific User Roles</b></span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Additional </b>2FA methods</span>
    		</p>
    		<br>
    		<hr class="mo2f_upgrade_hr">
					<?php echo mo2f_yearly_premium_pricing_plan(); ?>

			<hr class="mo2f_upgrade_hr">
			<br>
			<h3 style="text-align: center;">Authentication Methods</h3>
		  		<?php 
		  		for ( $i = 0; $i < 13; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_2fa_method_list[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_2fa_method_list_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php
						if ( gettype( $f_feature_set_with_plan[0] ) == "boolean") 
							{
								echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[0] );
							}
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_method_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>
				<h3 style="text-align: center;">Other Features</h3>
				<?php
				for ( $i = 0; $i < 15; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_feature_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_feature_set_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[0] );
							echo $feature_set;
							if ($feature_set == "Force Two Factor") {
								echo " for all users";
								echo mo2f_feature_on_hover_2fa_upgrade("Enforce administrators to setup 2nd factor during registration");

							}
							else
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_feature_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>

				<h3 style="text-align: center;">Custom SMS Gateway 
					<a  style="text-decoration:none;" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/admin/customer/smsconfig" target="_blank">Test Now</a>
				</h3>

				<?php
				for ( $i = 0; $i < 6; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_custom_sms_gateways[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_custom_sms_gateways_feature_set[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[0] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_custom_sms_gateways_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
				<h3 style="text-align: center;">Addons</h3>

				<?php
				for ( $i = 0; $i < 3; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_addons_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_addons[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[0] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_addons_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
    	</div>

    	<div class="mo2f_upgrade_main_div" style="box-shadow: 0 1px 34px 0px #c0c0c0;min-height: 633px;">
    		<div class="mo2f_upgrade_plan_name box">
    			<h1 class="mo2f_upgrade_plan_name_title">Enterprise</h1>
    			<div>
    				 <div class="ribbon ribbon-top-right"><span>Popular</span></div>
    		</div>
    		</div>
    		
    		<div class="mo2f_upgrade_center_align">
    			<p style="margin-bottom: -16px;">Starting at</p>
    			<h1 class="mo2f_upgrade_plan_amount">$59<span class="mo2f_upgrade_yearly">/year</span></h1>
    		</div>
    		  <hr class="mo2f_upgrade_hr">
    			<div class="mo2f_upgrade_site_details"  style="margin-left: 11%;">
    				<div class="mo2f_upgrade_site_details_left">
    					<span class="dashicons dashicons-thumbs-up mo2f_upgrade_thumb_icon"></span>
    				</div>
    				<div class="mo2f_upgrade_site_details_right">
    					<p class="mo2f_upgrade_site_details_name">Complete<b> Login Security</b></p>
    				</div>
    			</div>
    			
    		<hr class="mo2f_upgrade_hr">
    		<div style="text-align: center;margin-top: 7%;margin-bottom: 7%;">

			<?php
			 if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                        <button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_upgradeform('wp_2fa_enterprise_plan','2fa_plan')" >Upgrade</button>
		                <?php 
		            }else{ ?>
						<button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_register_and_upgradeform('wp_2fa_enterprise_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
						
		
		    </div>

		    
    		 <p style="margin-top: 20px;text-align: center;">
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>All</b> Premium Features</span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Force Two Factor </b>for <b>Users</b></span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details">Basic <b>Security </b>Features</span>
    			</p>
    			<br>
	    		<hr class="mo2f_upgrade_hr">
						<?php echo mo2f_yearly_all_inclusive_pricing_plan(); ?>

				<hr class="mo2f_upgrade_hr">
				<br>
				<h3 style="text-align: center;">Authentication Methods</h3>
		  		<?php 
		  		for ( $i = 0; $i < 13; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_2fa_method_list[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_2fa_method_list_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php
						if ( gettype( $f_feature_set_with_plan[1] ) == "boolean" && ($feature_set != "Other Features" )&& ($feature_set != "Custom SMS Gateway" )) 
							{
								echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[1] );
							}
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_method_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>

				<h3 style="text-align: center;">Other Features</h3>
				<?php
				for ( $i = 0; $i < 15; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_feature_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_feature_set_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[1] );
							echo $feature_set;
							if ($feature_set == "Force Two Factor") {
								echo " for all users";
								echo mo2f_feature_on_hover_2fa_upgrade("Enforce users to setup 2nd factor during registration");

							}
							else
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_feature_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>

				<h3 style="text-align: center;">Custom SMS Gateway 
					<a  style="text-decoration:none;" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/admin/customer/smsconfig" target="_blank">Test Now</a>
				</h3>

				<?php
				for ( $i = 0; $i < 6; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_custom_sms_gateways[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_custom_sms_gateways_feature_set[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[0] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_custom_sms_gateways_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>
				<h3 style="text-align: center;">Addons</h3>

				<?php
				for ( $i = 0; $i < 3; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_addons_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_addons[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[1] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_addons_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
    	</div>


    
    	    
    </div>






    <div style="margin-left: 19%; display: none;" id="mo2f_unlimited_users">
    	<div class="mo2f_upgrade_main_div">

    		<div class="mo2f_upgrade_plan_name">
    			<h1 class="mo2f_upgrade_plan_name_title">Standard Lite</h1>
    		</div>
    		<div class="mo2f_upgrade_center_align">
    			<p style="margin-bottom: -16px;">Starting at</p>
    			<h1 class="mo2f_upgrade_plan_amount">$49<span class="mo2f_upgrade_yearly">/year</span></h1>
    		</div>
    		   <hr class="mo2f_upgrade_hr">
    			<div class="mo2f_upgrade_site_details" style="margin-left: 11%;">
    				<div class="mo2f_upgrade_site_details_left">
    					<span class="dashicons dashicons-thumbs-up mo2f_upgrade_thumb_icon"></span>
    				</div>
    				<div class="mo2f_upgrade_site_details_right">
    					<p class="mo2f_upgrade_site_details_name"><b>basic</b> two-factor security</p>
    			
    				</div>
    			</div>
    		<hr class="mo2f_upgrade_hr">
    		<div style="text-align: center;margin-top: 7%;margin-bottom: 7%;">

			<?php
			 if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                        <button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_upgradeform('wp_security_two_factor_standard_lite_plan','2fa_plan')" >Upgrade</button>
		                <?php 
		            }else{ ?>
						<button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_register_and_upgradeform('wp_security_two_factor_standard_lite_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
						
		
		    </div>
		   
    		 <p style="margin-top: 20px;text-align: center;">
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Force Two Factor </b>for admins</span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details">Enable 2FA for <b>specific User Roles</b></span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Additional </b>2FA methods</span>
    			</p>
		  <br>
    		<hr class="mo2f_upgrade_hr">
					<?php echo mo2f_sms_cost(); ?>

			<hr class="mo2f_upgrade_hr">
			<br>
			<h3 style="text-align: center;">Authentication Methods</h3>
		  		<?php 
		  		for ( $i = 0; $i < 13; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_2fa_method_list[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_2fa_method_list_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php
								echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[2] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_method_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>
				<h3 style="text-align: center;">Other Features</h3>
				<?php
				for ( $i = 0; $i < 15; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_feature_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_feature_set_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[2] );
							echo $feature_set;
							if ($feature_set == "Force Two Factor") {
								echo " for Administrators";
								echo mo2f_feature_on_hover_2fa_upgrade("Enforce administrators to setup 2nd factor during registration");

							}
							else
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_feature_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>

				<h3 style="text-align: center;">Custom SMS Gateway 
					<a  style="text-decoration:none;" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/admin/customer/smsconfig" target="_blank">Test Now</a>
				</h3>

				<?php
				for ( $i = 0; $i < 6; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_custom_sms_gateways[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_custom_sms_gateways_feature_set[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[2] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_custom_sms_gateways_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
				<h3 style="text-align: center;">Addons</h3>

				<?php
				for ( $i = 0; $i < 3; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_addons_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_addons[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[2] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_addons_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
    	</div>


    	<div class="mo2f_upgrade_main_div" style="box-shadow: 0 1px 34px 0px #c0c0c0;min-height: 633px;">
    		<div class="mo2f_upgrade_plan_name box">
    			<h1 class="mo2f_upgrade_plan_name_title">Premium Lite</h1>
    			<div>
    				 <div class="ribbon ribbon-top-right"><span>Popular</span></div>
    		</div>
    		</div>
    		
    		<div class="mo2f_upgrade_center_align">
    			<p style="margin-bottom: -16px;">Starting at</p>
    			<h1 class="mo2f_upgrade_plan_amount">$99<span class="mo2f_upgrade_yearly">/year</span></h1>
    		</div>
    		  <hr class="mo2f_upgrade_hr">
    			<div class="mo2f_upgrade_site_details"  style="margin-left: 6%;">
    				<div class="mo2f_upgrade_site_details_left">
    					<span class="dashicons dashicons-thumbs-up mo2f_upgrade_thumb_icon"></span>
    				</div>
    				<div class="mo2f_upgrade_site_details_right">
    					<p class="mo2f_upgrade_site_details_name"><b>Complete</b> two-factor security</p>
    				</div>
    			</div>
    			
    		<hr class="mo2f_upgrade_hr">
    		<div style="text-align: center;margin-top: 7%;margin-bottom: 7%;">

			<?php
			 if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                        <button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_upgradeform('wp_security_two_factor_premium_lite_plan','2fa_plan')" >Upgrade</button>
		                <?php 
		            }else{ ?>
						<button class=" mo_wpns_upgrade_page_button mo2f_upgrade_button_style"  onclick="mo2f_register_and_upgradeform('wp_security_two_factor_premium_lite_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
						
		
		    </div>

		    
    		<p style="margin-top: 20px;text-align: center;">
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>All</b> Standard Features</span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details"><b>Force Two Factor </b>for <b>Users</b></span><br>
    				<span class=" dashicons dashicons-saved mo2f_upgrade_tick_icon"></span><span class="mo2f_upgrade_feature_details">Basic <b>Security </b>Features</span>
    		</p>
		 
    		<br>
    		<hr class="mo2f_upgrade_hr">
					<?php echo mo2f_sms_cost(); ?>

			<hr class="mo2f_upgrade_hr">
			<br>
			<h3 style="text-align: center;">Authentication Methods</h3>
		  		<?php 
		  		for ( $i = 0; $i < 13; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_2fa_method_list[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_2fa_method_list_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php
								echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[3] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_method_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>
				<h3 style="text-align: center;">Other Features</h3>
				<?php
				for ( $i = 0; $i < 15; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_feature_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_feature_set_with_plans[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[3] );
							echo $feature_set;
							if ($feature_set == "Force Two Factor") {
								echo " for all users";
								echo mo2f_feature_on_hover_2fa_upgrade("Enforce users to setup 2nd factor during registration");

							}
							else
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_2fa_feature_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}
				?>

				<h3 style="text-align: center;">Custom SMS Gateway 
					<a  style="text-decoration:none;" href="https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/admin/customer/smsconfig" target="_blank">Test Now</a>
				</h3>

				<?php
				for ( $i = 0; $i < 6; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_custom_sms_gateways[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_custom_sms_gateways_feature_set[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[3] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_custom_sms_gateways_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>
				<h3 style="text-align: center;">Addons</h3>

				<?php
				for ( $i = 0; $i < 3; $i ++ ) 
		  		{ 
						$feature_set = $mo2f_addons_set[ $i ];
                   	
						$f_feature_set_with_plan = $mo2f_addons[ $feature_set ];
						?>
							<div style="margin-bottom: -3%;margin-left: 2%;margin-right: 2%;">
						<?php

							echo mo2f_get_binary_equivalent_2fa_lite( $f_feature_set_with_plan[3] );
							echo $feature_set;
							echo mo2f_feature_on_hover_2fa_upgrade($mo2f_addons_description_set[$i]);

							?>
						</div>
							<br>
							<?php	
				}

				?>

    	</div>


    
    </div>









 <div id="mo_ns_features_only" style="display: none;">

	<div class="mo_wpns_upgrade_security_title"  >
		<div class="mo_wpns_upgrade_page_title_name">
			<h1 style="margin-top: 0%;padding: 10% 0% 0% 0%; color: white;font-size: 200%;">
		WAF</h1><hr class="mo_wpns_upgrade_page_hr"></div>
		
	<div class="mo_wpns_upgrade_page_ns_background">
			<center>
			<h4 class="mo_wpns_upgrade_page_starting_price">Starting From</h4>
			<h1 class="mo_wpns_upgrade_pade_pricing">$50</h1>
			
				<?php echo mo2f_waf_yearly_standard_pricing(); ?>
				
				
			</center>
	
	<div style="text-align: center;">
	<?php	
	if(isset($is_customer_registered) && $is_customer_registered) {
			?>
                            <button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_upgradeform('wp_security_waf_plan','2fa_plan')" >Upgrade</button>
		                <?php }
		
						
		                else{ ?>
							<button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_register_and_upgradeform('wp_security_waf_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
	</div>
			<div><center><b>
		<ul>
			<li>Realtime IP Blocking</li>
			<li>Live Traffic and Audit</li>
			<li>IP Blocking and Whitelisting</li>
			<li>OWASP TOP 10 Firewall Rules</li>
			<li>Standard Rate Limiting/ DOS Protection</li>
			<li><a onclick="wpns_pricing()">Know more</a></li>
		</ul>
		</b></center></div>
	</div>
	</div>
	<div class="mo_wpns_upgrade_page_space_in_div"></div>
	<div class="mo_wpns_upgrade_security_title"  >
		<div class="mo_wpns_upgrade_page_title_name">
			<h1 style="margin-top: 0%;padding: 10% 0% 0% 0%; color: white;font-size: 200%;">
		Login and Spam</h1><hr class="mo_wpns_upgrade_page_hr"></div>
		
		<div class="mo_wpns_upgrade_page_ns_background">
			<center>
			<h4 class="mo_wpns_upgrade_page_starting_price">Starting From</h4>
			<h1 class="mo_wpns_upgrade_pade_pricing">$15</h1>
			
				<?php echo mo2f_login_yearly_standard_pricing(); ?>
				
				
			</center>
			
		<div style="text-align: center;">
		<?php if( isset($is_customer_registered)&& $is_customer_registered ) {
						?>
                            <button class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button" 
                                        onclick="mo2f_upgradeform('wp_security_login_and_spam_plan','2fa_plan')" >Upgrade</button>
                        <?php }else{ ?>

                           <button class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                    onclick="mo2f_register_and_upgradeform('wp_security_login_and_spam_plan','2fa_plan')" >Upgrade</button>
                        <?php } 
                        ?>
		</div>
			<div><center><b>
				<ul>
					<li>Limit login Attempts</li>
					<li>CAPTCHA on login</li>
					<li>Blocking time period</li>
					<li>Enforce Strong Password</li>
					<li>SPAM Content and Comment Protection</li>
					<li><a onclick="wpns_pricing()">Know more</a></li>
				</ul>
			</b></center></div>
		</div>
		
		
	</div>
	<div class="mo_wpns_upgrade_page_space_in_div"></div>
	<div class="mo_wpns_upgrade_security_title"  >
		<div class="mo_wpns_upgrade_page_title_name">
			<h1 style="margin-top: 0%;padding: 10% 0% 0% 0%; color: white;font-size: 200%;">
		Malware Scanner</h1><hr class="mo_wpns_upgrade_page_hr"></div>
		
			<div class="mo_wpns_upgrade_page_ns_background">
			<center>
			<h4 class="mo_wpns_upgrade_page_starting_price">Starting From</h4>
			<h1 class="mo_wpns_upgrade_pade_pricing">$15</h1>
			
				<?php echo mo2f_scanner_yearly_standard_pricing(); ?>
				
				
			</center>
			<div style="text-align: center;">
			<?php if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                            <button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_upgradeform('wp_security_malware_plan','2fa_plan')" >Upgrade</button>
		                <?php }else{ ?>

                           <button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_register_and_upgradeform('wp_security_malware_plan','2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
		</div>
			<div><center><b>
				<ul>
					<li>Malware Detection</li>
					<li>Blacklisted Domains</li>
					<li>Action On Malicious Files</li>
					<li>Repository Version Comparison</li>
					<li>Detect any changes in the files</li>
					<li><a onclick="wpns_pricing()">Know more</a></li>
				</ul>
			</b></center></div>
	</div>
	</div>
	<div class="mo_wpns_upgrade_page_space_in_div"></div>
	<div class="mo_wpns_upgrade_security_title"  >
		<div class="mo_wpns_upgrade_page_title_name">
			<h1 style="margin-top: 0%;padding: 10% 0% 0% 0%; color: white;font-size: 200%;">
		Encrypted Backup</h1><hr class="mo_wpns_upgrade_page_hr"></div>
		
	<div class="mo_wpns_upgrade_page_ns_background">

		<center>
			<h4 class="mo_wpns_upgrade_page_starting_price">Starting From</h4>
			<h1 class="mo_wpns_upgrade_pade_pricing">$30</h1>
			
				<?php echo mo2f_backup_yearly_standard_pricing(); ?>
				
				
			</center>
			<div style="text-align: center;">
	<?php	if( isset($is_customer_registered) && $is_customer_registered) {
						?>
                            <button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_upgradeform('wp_security_backup_plan','2fa_plan')" >Upgrade</button>
		                <?php }else{ ?>
							<button
                                        class="mo_wpns_button mo_wpns_button1 mo_wpns_upgrade_page_button"
                                        onclick="mo2f_register_and_upgradeform('wp_security_backup_plan' ,'2fa_plan')" >Upgrade</button>
		                <?php } 
		                ?>
		
		</div>
			<div><center><b>
				<ul>
					<li>Schedule Backup</li>
					<li>Encrypted Backup</li>
					<li>Files/Database Backup</li>
					<li>Restore and Migration</li>
					<li>Password Protected Zip files</li>
					<li><a onclick="wpns_pricing()">Know more</a></li>
				</ul>
			</b></center></div>
	</div></div>
</div>

	<div class="mo_wpns_setting_layout" style="width: 93.5%;margin-left: 0%;">
		<div>
                <h2>Steps to upgrade to the Premium Plan</h2>
                <ol class="mo2f_licensing_plans_ol">
                    <li><?php echo mo2f_lt( 'Click on \'Upgrade\' button of your preferred plan above.' ); ?></li>
                    <li><?php echo mo2f_lt( ' You will be redirected to the miniOrange Console. Enter your miniOrange username and password, after which you will be redirected to the payment page.' ); ?></li>

                    <li><?php echo mo2f_lt( 'Select the number of users you wish to upgrade for, and any add-ons if you wish to purchase, and make the payment.' ); ?></li>
                    <li><?php echo mo2f_lt( 'After making the payment, you can find the Standard/Premium plugin to download from the \'License\' tab in the left navigation bar of the miniOrange Console.' ); ?></li>
                    <li><?php echo mo2f_lt( 'Download the premium plugin from the miniOrange Console.' ); ?></li>
                    <li><?php echo mo2f_lt( 'In the Wordpress dashboard, uninstall the free plugin and install the premium plugin downloaded.' ); ?></li>
                    <li><?php echo mo2f_lt( 'Login to the premium plugin with the miniOrange account you used to make the payment, after this your users will be able to set up 2FA.' ); ?></li>
                </ol>
            </div>
           

            <br>
            <hr>
            <h2>Multisite</h2>
            <p><?php echo mo2f_lt( 'For your first license 3 subsites will be activated automatically on the same domain. And if you wish to use it for more please contact support ' ); ?></p>
            <hr>
            <br>
            <h2>SMS Charges</h2>
            <p><?php echo mo2f_lt( 'If you wish to choose OTP Over SMS / OTP Over SMS and Email as your authentication method,
                    SMS transaction prices & SMS delivery charges apply and they depend on country. SMS validity is for lifetime.' ); ?></p>
            <hr>
            <br>
            <div>
                <h2>Note</h2>
                <ol class="mo2f_licensing_plans_ol">
                    <li><?php echo mo2f_lt( 'The plugin works with many of the default custom login forms (like Woocommerce / Theme My Login), however if you face any issues with your custom login form, contact us and we will help you with it.' ); ?></li>
                    <li style="color: red"><?php echo mo2f_lt( 'There is license key required to activate the Standard/Premium Lite Plugins. You will have to login with the miniOrange Account you used to make the purchase then enter license key to activate plugin.' ); ?>
                    	
                    </li>
                </ol>
            </div>
            <br>
            <div>
                <h2>Refund Policy</h2>
                <p class="mo2f_licensing_plans_ol"><?php echo mo2f_lt( 'At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you purchased is not working as advertised and you\'ve attempted to resolve any issues with our support team, which couldn\'t get resolved then we will refund the whole amount within 10 days of the purchase.' ); ?>
                </p>
            </div>
            <br>
            <hr>
            <br>
            <div>
                <h2>Privacy Policy</h2>
                <p class="mo2f_licensing_plans_ol"><a
                            href="https://www.miniorange.com/2-factor-authentication-for-wordpress-gdpr">Click Here</a>
                    to read our Privacy Policy.
                </p>
            </div>
            <br>
            <hr>
            <br>
            <div>
                <h2>Contact Us</h2>
                <p class="mo2f_licensing_plans_ol"><?php echo mo2f_lt( 'If you have any doubts regarding the licensing plans, you can mail us at' ); ?>
                    <a href="mailto:info@xecurify.com"><i>info@xecurify.com</i></a> <?php echo mo2f_lt( 'or submit a query using the support form.' ); ?>
                </p>
            </div>
	</div>

		<div id="mo2f_payment_option" class="mo_wpns_setting_layout" style="margin-top: 1%;width: 93.5%;margin-left: 0%;">
       <div>
           <h3>Supported Payment Methods</h3><hr>
           <div class="mo_2fa_container">
           <div class="mo_2fa_card-deck">
           <div class="mo_2fa_card mo_2fa_animation">
                <div class="mo_2fa_Card-header">
                 <?php 
                echo'<img src="'.dirname(plugin_dir_url(__FILE__)).'/includes/images/card.png" style="size: landscape;width: 100px;height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">';?>
                </div>
                <hr style="border-top: 2px solid #143af4;">
                <div class="mo_2fa_card-body">
                <p style="font-size: 110%;">If payment is done through Credit Card/Intenational debit card, the license would be made automatically once payment is completed. </p>
                <p style="font-size: 110%;"><i><b>For guide 
                	<?php echo'<a href='.MoWpnsConstants::FAQ_PAYMENT_URL.' target="blank">Click Here.</a>';?></b></i></p>
                
                </div>
            </div>
          <div class="mo_2fa_card mo_2fa_animation">
                <div class="mo_2fa_Card-header">
                 <?php 
                echo'<img src="'.dirname(plugin_dir_url(__FILE__)).'/includes/images/paypal.png" style="size: landscape;width: 100px;height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">';?>
                </div>
                <hr style="border-top: 2px solid #143af4;">
                <div class="mo_2fa_card-body">
                <?php echo'<p style="font-size: 110%;">Use the following PayPal id for payment via PayPal.</p><p><i><b style="color:#1261d8">'.MoWpnsConstants::SUPPORT_EMAIL.'</b></i></p>';?>
                 <p style="font-size: 110%;"><i><b>Note:</b> There is an additional 18% GST applicable via PayPal.</i></p>

                </div>
            </div>
          <div class="mo_2fa_card mo_2fa_animation">
                <div class="mo_2fa_Card-header">
                <?php 
                echo'<img src="'.dirname(plugin_dir_url(__FILE__)).'/includes/images/netbanking.png" style="size: landscape;width: 100px;height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">';?>

                </div>
                <hr style="border-top: 2px solid #143af4;">
                <div class="mo_2fa_card-body">
                <?php echo'<p style="font-size: 110%;">If you want to use net banking for payment then contact us at <i><b style="color:#1261d8">'.MoWpnsConstants::SUPPORT_EMAIL.'</b></i> so that we can provide you bank details. </i></p>';?>
                <p style="font-size: 110%;"><i><b>Note:</b> There is an additional 18% GST applicable via Bank Transfer.</i></p>
                </div>
                </div>
              </div>
          </div>
             <div class="mo_2fa_mo-supportnote">
                <p style="font-size: 110%;"><b>Note :</b> Once you have paid through PayPal/Net Banking, please inform us so that we can confirm and update your License.</p> 
                </div>
     </div>
 </div>

   
<?php
function mo2f_sms_cost() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price" style="text-align: center;" id="mo2f_sms_cost"
       title="<?php echo mo2f_lt( '(Only applicable if OTP over SMS is your preferred authentication method.)' ); ?>"><?php echo mo2f_lt( 'SMS + OTP Cost' ); ?>
        <b style="color: black;">[optional]</b><br/>
        <select id="mo2f_sms" class="form-control" style="border-radius:5px;width:70%;">
            <option><?php echo mo2f_lt( '$1 per 100 OTP + SMS delivery charges' ); ?></option>
            <option><?php echo mo2f_lt( '$5 per 500 OTP + SMS delivery charges' ); ?></option>
            <option><?php echo mo2f_lt( '$7 per 1k OTP + SMS delivery charges' ); ?></option>
            <option><?php echo mo2f_lt( '$24 per 5k OTP + SMS delivery charges' ); ?></option>
            <option><?php echo mo2f_lt( '$43 per 10k OTP + SMS delivery charges' ); ?></option>
            <option><?php echo mo2f_lt( '$160 per 50k OTP + SMS delivery charges' ); ?></option>
        </select>
    </p>
    
	<?php
}
function mo2f_yearly_premium_pricing_plan() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price" style="text-align: center;" 
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
           <option> <?php echo mo2f_lt( 'Upto 5 users - $30 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 50 users - $99 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 100 users - $199 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 500 users - $349 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 1000 users - $499 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5000 users - $799 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10000 users - $999 per year ' ); ?></option>
            <option> <?php echo mo2f_lt( 'Upto 20000 users - $1449 per year' ); ?> </option>
            
        </select>
    </p>
	<?php
}
function mo2f_yearly_all_inclusive_pricing_plan() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price" style="text-align: center;"
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
           <option> <?php echo mo2f_lt( 'Upto 5 users - $59 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 50 users - $128 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 100 users - $228 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 500 users - $378 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 1000 users - $528 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5000 users - $828 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10000 users - $1028 per year ' ); ?></option>
            <option> <?php echo mo2f_lt( 'Upto 20000 users - $1478 per year' ); ?> </option>
            
        </select>
    </p>
	<?php
}
function mo2f_waf_yearly_standard_pricing() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price"
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
            <option> <?php echo mo2f_lt( '1 site - $50 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5 sites - $100 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10 sites - $150 per year' ); ?> </option>
            
        </select>
    </p>

	<?php
}
function mo2f_login_yearly_standard_pricing() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price"
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
            <option> <?php echo mo2f_lt( '1 site - $15 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5 sites - $35 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10 sites - $60 per year' ); ?> </option>
            
        </select>
    </p>

	<?php
}
function mo2f_backup_yearly_standard_pricing() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price"
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
            <option> <?php echo mo2f_lt( '1 site - $30 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5 sites - $50 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10 sites - $70 per year' ); ?> </option>
            
        </select>
    </p>

	<?php
}
function mo2f_scanner_yearly_standard_pricing() {
	?>
    <p class="mo2f_pricing_text mo_wpns_upgrade_page_starting_price" 
       id="mo2f_yearly_sub"><?php echo __( 'Yearly Subscription Fees', 'miniorange-2-factor-authentication' ); ?><br>

        <select id="mo2f_yearly" class="form-control" style="border-radius:5px;width:70%;">
            <option> <?php echo mo2f_lt( '1 site - $15 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 5 sites - $35 per year' ); ?> </option>
            <option> <?php echo mo2f_lt( 'Upto 10 sites - $60 per year' ); ?> </option>
            
        </select>
    </p>

	<?php
}

function mo2f_get_binary_equivalent_2fa_lite( $mo2f_var ) {
	switch ( $mo2f_var ) {
		case 1:
			return "<div style='color: #20b2aa;font-size: x-large;float:left;margin:0px 5px;'>🗸</div>";
		case 0:
			return "<div style='color: red;font-size: x-large;float:left;margin:0px 5px;'>×</div>";
		default:
			return $mo2f_var;
	}
}

function mo2f_feature_on_hover_2fa_upgrade( $mo2f_var ) {

	return '<div class="mo2f_tooltip" style="float: right;width: 6%;"><span class="dashicons dashicons-info mo2f_info_tab"></span><span class="mo2f_tooltiptext" style="margin-left:-232px;margin-top: 9px;">'. $mo2f_var .'</span></div>';
}

?>
<form class="mo2f_display_none_forms" id="mo2fa_loginform"
                  action="<?php echo MO_HOST_NAME . '/moas/login'; ?>"
                  target="_blank" method="post">
                <input type="email" name="username" value="<?php echo get_option( 'mo2f_email' ); ?>"/>
                <input type="text" name="redirectUrl"
                       value="<?php echo MO_HOST_NAME . '/moas/initializepayment'; ?>"/>
                <input type="text" name="requestOrigin" id="requestOrigin"/>
            </form>

            <form class="mo2f_display_none_forms" id="mo2fa_register_to_upgrade_form"
                   method="post">
                <input type="hidden" name="requestOrigin" />
                <input type="hidden" name="mo2fa_register_to_upgrade_nonce"
                       value="<?php echo wp_create_nonce( 'miniorange-2-factor-user-reg-to-upgrade-nonce' ); ?>"/>
            </form>
    <script type="text/javascript">

		function mo2f_upgradeform(planType,planname) 
		{
            jQuery('#requestOrigin').val(planType);
            jQuery('#mo2fa_loginform').submit();
            var data =  {
								'action'				  : 'wpns_login_security',
								'wpns_loginsecurity_ajax' : 'update_plan', 
								'planname'				  : planname,
								'planType'				  : planType,
					}
					jQuery.post(ajaxurl, data, function(response) {
					});
        }
        function mo2f_register_and_upgradeform(planType, planname) 
        {
                    jQuery('#requestOrigin').val(planType);
                    jQuery('input[name="requestOrigin"]').val(planType);
                    jQuery('#mo2fa_register_to_upgrade_form').submit();

                    var data =  {
								'action'				  : 'wpns_login_security',
								'wpns_loginsecurity_ajax' : 'wpns_all_plans', 
								'planname'				  : planname,
						'planType'				  : planType,
					}
					jQuery.post(ajaxurl, data, function(response) {
					});
        }
    	function mo_2fa_cloud_show_plans()
    	{
    		document.getElementById('mo2f_unlimited_users').style.display = "none";

    		document.getElementById('mo_2fa_cloud_licensing_plans_title').style.display = "none";
    		document.getElementById('mo_2fa_cloud_licensing_plans_title1').style.display = "block";
			var tab = '<?php echo get_option("mo_wpns_2fa_with_network_security");?>'; 
			if(tab == "1")
			{
    			document.getElementById('mo_ns_features_only').style.display = "none";
    			document.getElementById('mo_ns_licensing_plans_title').style.display = "block"; 
    			document.getElementById('mo_ns_licensing_plans_title1').style.display = "none";
			}
   
    		document.getElementById('mo_2fa_lite_licensing_plans_title').style.display = "block";
    		document.getElementById('mo_2fa_lite_licensing_plans_title1').style.display = "none"; 
    	}
    	
    	function mo_2fa_onpremise_show_plans()
    	{
    		document.getElementById('mo2f_unlimited_sites').style.display = "none";
    		var tab = '<?php echo get_option("mo_wpns_2fa_with_network_security");?>'; 
			if(tab == "1")
			{
	    		document.getElementById('mo_ns_features_only').style.display = "none";
	    		document.getElementById('mo_ns_licensing_plans_title1').style.display = "none";
	    		document.getElementById('mo_ns_licensing_plans_title').style.display = "block";
	    	}
    		document.getElementById('mo_2fa_cloud_licensing_plans_title').style.display = "block";
    		document.getElementById('mo_2fa_cloud_licensing_plans_title1').style.display = "none"; 
    		document.getElementById('mo_2fa_lite_licensing_plans_title').style.display = "none";
    		document.getElementById('mo_2fa_lite_licensing_plans_title1').style.display = "block"; 

    	}

    	function mo_ns_show_plans()
    	{
    		document.getElementById('mo_ns_features_only').style.display = "block";
    		document.getElementById('mo2f_unlimited_sites').style.display = "none";
    		document.getElementById('mo2f_unlimited_users').style.display = "none";

    		document.getElementById('mo_ns_licensing_plans_title1').style.display = "block";
    		document.getElementById('mo_ns_licensing_plans_title').style.display = "none";
    		document.getElementById('mo_2fa_cloud_licensing_plans_title').style.display = "block";
    		document.getElementById('mo_2fa_cloud_licensing_plans_title1').style.display = "none"; 
    		document.getElementById('mo_2fa_lite_licensing_plans_title').style.display = "block";
    		document.getElementById('mo_2fa_lite_licensing_plans_title1').style.display = "none"; 
    	}

    	function wpns_pricing()
		{
			window.open("https://security.miniorange.com/pricing/");
		}

    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

  $("#regular_plans").click(function(){
    $("#mo2f_unlimited_sites").fadeIn(2000);
  });

    $("#mo2f_onpremise_plan").click(function(){
    $("#mo2f_unlimited_users").fadeIn(2000);
  });

});
</script>