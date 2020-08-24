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
            <option value="admin_users" disabled="true"><?php echo esc_html__( 'Admin users', 'prevent-direct-access' ) ?></option>
            <option value="author" selected><?php echo esc_html__( 'The file\'s author', 'prevent-direct-access' ) ?></option>
            <option value="logged_users" disabled="true"><?php echo esc_html__( 'Logged-in users', 'prevent-direct-access' ) ?></option>
            <option value="anyone" disabled="true"><?php echo esc_html__( 'Anyone', 'prevent-direct-access' ) ?></option>
            <option value="custom_roles" disabled="true"><?php echo esc_html__( 'Choose custom roles', 'prevent-direct-access' ) ?></option>
        </select>
    </td>
</tr>
