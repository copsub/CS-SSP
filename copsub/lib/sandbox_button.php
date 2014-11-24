<?php

  add_action('admin_menu', 'csb_menu');

  function csb_menu() {
    add_submenu_page( 'tools.php', "Copsub Sandbox button", "Copsub Sandbox button", 'manage_options', 'copsub_sandbox_button', 'csb_render_admin_page');
  }

  function csb_render_admin_page() { ?>
    <h1>Copsub Sandbox button</h1>

    <p>This button runs a script meant to be executed after importing a backup in a new Sandbox (Testing) environment. This is what it does:

    <ol>
      <li>Disables automatic backup in Updraft</li>
      <li>Set seamless donations Paypal to sandbox mode</li>
      <li>Locks the website so a password is required to access it</li>
      <li>Randomises email addresses, to avoid errors like sending test notifications. Users with admin role are excluded.</li>
    </ol>

    <script type="text/javascript" >
      jQuery(document).ready(function($) {

        var data = {
          'action': 'my_action',
          'whatever': 1234
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
          alert('Got this from the server: ' + response);
        });
      });
    </script>

    <?php
  }


  add_action( 'wp_ajax_my_action', 'my_action_callback' );

  function my_action_callback() {
    global $wpdb; // this is how you get access to the database

    $whatever = intval( $_POST['whatever'] );

    $whatever += 10;

          echo $whatever;

    die(); // this is required to terminate immediately and return a proper response
  }

?>