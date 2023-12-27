<?php 

//create a form to save the credentials
?>
<form>
    <label for="upexi_ns_wc_refund_options">Options</label>
    <input type="text" name="upexi_ns_wc_refund_options" id="upexi_ns_wc_refund_options" value="<?php echo get_option('upexi_ns_wc_refund_options'); ?>">
    <input type="submit" value="Save">
</form>