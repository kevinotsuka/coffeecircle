<?php
/**
 * View for the admin notice.
 */
?>

<?php if ( isset( $_POST['cornerstone_options_submitted'] ) ) : ?>
  <?php if ( strip_tags( $_POST['cornerstone_options_submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) : ?>

    <div class="updated">
      <p><?php _e( '<strong>Huzzah!</strong> All settings have been successfully saved.', '__x__' ); ?></p>
    </div>

  <?php endif; ?>
<?php endif; ?>