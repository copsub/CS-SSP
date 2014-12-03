<?php

  // Menu Button
  add_action('admin_menu', 'csb_menu');

  function csb_menu() {
    add_submenu_page( 'tools.php', "Copsub Sandbox button", "Copsub Sandbox button", 'manage_options', 'copsub_sandbox_button', 'csb_render_admin_page');
  }





  // Backend Actions
  add_action( 'wp_ajax_csb_action', 'csb_action_callback' );

  function csb_action_callback() {
    // Disable automatic updraft backups
    update_option("updraft_interval", "manual" );
    update_option("updraft_interval_database", "manual" );

    // Set Seamless Donations Paypal environment to Sandbox
    update_option("dgx_donate_paypal_server", "SANDBOX" );

    // Enable password to access the website
    update_option("password_protected_status", "1");

    // Randomise the email address and usernames (except for admin users)
    global $wpdb;
    $wpdb->get_results("
      UPDATE ".$wpdb->prefix."users
      LEFT JOIN ".$wpdb->prefix."usermeta m1 ON ".$wpdb->prefix."users.ID = m1.user_id
      SET user_email = CONCAT(FLOOR(rand() * 10000000),'@mailinator.com'), user_login = FLOOR(rand() * 10000000)
      WHERE m1.meta_key = '".$wpdb->prefix."capabilities' AND m1.meta_value NOT LIKE '%administrator%'
    ");

    echo "Sandbox Mode actions executed successfully";
    die(); // this is required to terminate immediately and return a proper response
  }






  // Admin page with Ajax button
  function csb_render_admin_page() { ?>
    <h1>Copsub Sandbox button</h1>

    <p>This button runs a script meant to be executed after importing a backup in a new Sandbox (Testing) environment. This is what it does:

    <ol>
      <li>Disables automatic backup in Updraft</li>
      <li>Set seamless donations Paypal to sandbox mode</li>
      <li>Locks the website so a password is required to access it</li>
      <li>Randomises email addresses, to avoid errors like sending test notifications. Users with admin role are excluded.</li>
    </ol>

    <?php if (strpos($_SERVER[HTTP_HOST],'sandbox') !== false || isset($_GET["force_sandbox_button"])) { ?>

    <p style="padding:10px; background-color: #FF6767;"><strong>This button will modify permanently the emails of the non-admin users, turning them into something like "9217758@mailinator.com". Please check that you have a backup of the database before going ahead.</strong></p>

    <a class="button button-primary" style="font-size:32px; padding:20px; margin: 40px; height: 70px"
       onclick="executeSandboxActions()">Sandbox Button</a>

    <script type="text/javascript" >
      var data = {
        'action': 'csb_action'
      };

      // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
      function executeSandboxActions(){
        jQuery.post(ajaxurl, data, function(response) {
          alert(response);
        });
        return false;
      };
    </script>

    <?php } else { ?>
      <p style="padding:10px; background-color: #FF6767;"><strong>To avoid losing production data, this button will only work in wordpress installation under a domain containing the word"sandbox".<br/><br/> If you are completely sure of what you are doing you can add the parameter "force_sandbox_button=true" to the current URL.</strong></p>
    <?php
    }
  }

?>