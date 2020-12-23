<?php
$file_access = Pda_Helper::get_fap_setting( $pda_settings );
?>
<tr>
    <td class="feature-input"><span class="feature-input"></span></td>
    <td>
	    <p>
		    <label><?php echo esc_html__( 'Set File Access Permission', 'prevent-direct-access' ) ?>
                <span class="pda_upgrade_advice">
					<a rel="noopener" target="_blank" href="https://preventdirectaccess.com/pricing/">
						<span class="pda_dashicons dashicons dashicons-lock">
							<span class="pda_upgrade_tooltip"><?php echo esc_html__( 'Available in Gold version', 'prevent-direct-access' ) ?></span>
						</span>
					</a>
				</span>
		    </label>
		    <?php echo esc_html__( 'Select user roles who can access protected files through their file URLs', 'prevent-direct-access' ) ?>
	    </p>
        <select id="file_access_permission">
	        <option value="admin_users" <?php if ( $file_access == "admin_users" ) { echo "selected";	} ?> ><?php echo esc_html__( 'Admin users', 'prevent-direct-access-gold' ) ?></option>
	        <option value="author" <?php if ( $file_access == "author" ) { echo "selected"; } ?> ><?php echo esc_html__( 'The file\'s author', 'prevent-direct-access-gold' ) ?></option>
	        <option value="logged_users" disabled <?php if ( $file_access == "logged_users" ) { echo "selected"; } ?> ><?php echo esc_html__( 'Logged-in users', 'prevent-direct-access-gold' ) ?></option>
	        <option value="blank" disabled <?php if ( $file_access == "blank" ) { echo "selected";	} ?> ><?php echo esc_html__( 'No user roles', 'prevent-direct-access-gold' ) ?></option>
	        <option value="anyone" disabled <?php if ( $file_access == "anyone" ) { echo "selected"; } ?> ><?php echo esc_html__( 'Anyone', 'prevent-direct-access-gold' ) ?></option>
	        <option value="custom_roles" disabled <?php if ( $file_access == "custom_roles" ) { echo "selected"; } ?> ><?php echo esc_html__( 'Choose custom roles', 'prevent-direct-access-gold' ) ?></option>
        </select>
    </td>
</tr>
