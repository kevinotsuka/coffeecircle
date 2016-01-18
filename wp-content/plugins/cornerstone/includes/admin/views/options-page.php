<?php
/**
 * View for the main Options Page.
 */
?>

<div class="wrap cs-admin">
  <h2><?php echo $title; ?></h2>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <form name="cornerstone_options" method="post" action="">
        <input name="cornerstone_options_submitted" type="hidden" value="submitted">
        <div id="post-body-content">
          <div class="meta-box-sortables ui-sortable">

            <?php include CS()->path() . 'includes/admin/views/options-main.php'; ?>
            
          </div>
        </div>

        <?php include CS()->path() . 'includes/admin/views/options-sidebar.php'; ?>

      </form>
    </div>
    <br class="clear">
  </div>
</div>