<?php

  // Menu Button
  add_action('admin_menu', 'csb_menu');

  function csb_menu() {
    add_submenu_page( 'tools.php', "Copsub Sandbox button", "Copsub Sandbox button", 'manage_options', 'copsub_sandbox_button', 'csb_render_admin_page');
  }





  // Backend Actions
  add_action( 'wp_ajax_csb_action', 'csb_action_callback' );

  function csb_action_callback() {
    global $wpdb;

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

    <?php
  }

?>