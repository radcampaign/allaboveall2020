<?php
	
echo'
    <div class="mo_wpns_divided_layout">
        <div class="mo_wpns_setting_layout" >
            <div>
                <h4>Thank You for registering with miniOrange.
                    <div style="float: right;">';
                   
                    echo '</div>
                </h4>
                <h3>Your Profile</h3>
                <table border="1" style="background-color:#FFFFFF; border:1px solid #CCCCCC; border-collapse: collapse; padding:0px 0px 0px 10px; margin:2px; width:85%">
                    <tr>
                        <td style="width:45%; padding: 10px;">Username/Email</td>
                        <td style="width:55%; padding: 10px;">'.$email.'</td>
                    </tr>
                    <tr>
                        <td style="width:45%; padding: 10px;">Customer ID</td>
                        <td style="width:55%; padding: 10px;">'.$key.'</td>
                    </tr>
                    <tr>
                        <td style="width:45%; padding: 10px;">API Key</td>
                        <td style="width:55%; padding: 10px;">'.$api.'</td>
                    </tr>
                    <tr>
                        <td style="width:45%; padding: 10px;">Token Key</td>
                        <td style="width:55%; padding: 10px;">'.$token.'</td>
                    </tr>

                    <tr>
                        <td style="width:45%; padding: 10px;">Remaining Email transactions</td>
                        <td style="width:55%; padding: 10px;">'.$EmailTransactions.'</td>
                    </tr>
                    <tr>
                        <td style="width:45%; padding: 10px;">Remaining SMS transactions</td>
                        <td style="width:55%; padding: 10px;">'.$SMSTransactions.'</td>
                    </tr>

                </table>
                <br/>
                <center>';
                if (isset( $two_fa )) {

                        echo '<a class="mo_wpns_button mo_wpns_button1" href="'.$two_fa.'">Back</a> ';
                    }
                echo '
                <a id="mo_logout" class="mo_wpns_button mo_wpns_button1" >Remove Account and Reset Settings</a>
                </center>
                <p><a href="#mo_wpns_forgot_password_link">Click here</a> if you forgot your password to your miniOrange account.</p>
            </div>
        </div>
    </div>
	<form id="forgot_password_form" method="post" action="">
		<input type="hidden" name="option" value="mo_wpns_reset_password" />
	</form>
	
	<script>
		jQuery(document).ready(function(){
			$(\'a[href="#mo_wpns_forgot_password_link"]\').click(function(){
				$("#forgot_password_form").submit();
			});
		});
	</script>';

    ?>
    <script type="text/javascript">
        jQuery(document).ready(function()
        {

            jQuery("#mo_logout").click(function()
            {
                var data =  
                {
                    'action'                  : 'wpns_login_security',
                    'wpns_loginsecurity_ajax' : 'wpns_logout_form',  
                };
                jQuery.post(ajaxurl, data, function(response) {
                    window.location.reload(true);
                });
            });
        });
    </script>