<div class="swpm-pw-reset-widget-form">
<form id="swpm-pw-reset-form" name="swpm-reset-form" method="post" action="">
    <table width="95%" border="0" cellpadding="3" cellspacing="5" class="forms">
	    <tr>
	    	<td colspan="2"><label for="swpm_reset_email" class="swpm_label swpm-pw-reset-email-label"><?php echo  SwpmUtils::_('Email Address')?></label></td>
	    </tr>
	    <tr>
	        <td colspan="2"><input type="text" class="swpm_text_field swpm-pw-reset-text" id="swpm_reset_email"  value="" size="40" name="swpm_reset_email" /></td>
	    </tr>
	    <tr>
	        <td colspan="2">
	        <input type="submit" name="swpm-reset" value="<?php echo SwpmUtils::_('Reset Password'); ?>" class="swpm-pw-reset-submit" />
	        </td>
	    </tr>
    </table>
</form>
</div>
