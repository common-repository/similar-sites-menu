<?php 
	if($_POST['similar_sites_hidden'] == 'Y') {
		//Form data sent
		$stripeBg = $_POST['similar_sites_stripeBg']; // Stripe background color
		update_option('similar_sites_stripeBg', $stripeBg);
		
		$stripeWidth = $_POST['similar_sites_stripeWidth']; // Stripe Width
		update_option('similar_sites_stripeWidth', $stripeWidth);

		$linkBg = $_POST['similar_sites_linkBg']; // Link background color
		update_option('similar_sites_linkBg', $linkBg);
		
		$linkColor = $_POST['similar_sites_linkColor'];  // Link color
		update_option('similar_sites_linkColor', $linkColor);

		$linkHoverBg = $_POST['similar_sites_linkHoverBg'];  // Link hover background color
		update_option('similar_sites_linkHoverBg', $linkHoverBg);

		$linkHoverColor = $_POST['similar_sites_linkHoverColor'];  // Link hover color
		update_option('similar_sites_linkHoverColor', $linkHoverColor);

		$newTab = $_POST['similar_sites_new_tab'];
		update_option('similar_sites_new_tab', $newTab);
		?>

		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$stripeBg = get_option('similar_sites_stripeBg');
			if($stripeBg == ""){ $stripeBg = "333333";}

		$stripeWidth = get_option('similar_sites_stripeWidth');
			if($stripeWidth == ""){ $stripeWidth = "960px";}

		$linkBg = get_option('similar_sites_linkBg');
			if($linkBg == ""){ $linkBg = "333333";}

		$linkColor = get_option('similar_sites_linkColor');
			if($linkColor == ""){ $linkColor = "ffffff";}

		$linkHoverBg = get_option('similar_sites_linkHoverBg');
			if($linkHoverBg == ""){ $linkHoverBg = "9B1C26";}

		$linkHoverColor = get_option('similar_sites_linkHoverColor');
			if($linkHoverColor == ""){ $linkHoverColor = "ffffff";}

		$newTab = get_option('similar_sites_new_tab');
	}
?>

<div class="wrap">
<?php echo "<h2>" . __( 'Similar sites menu settings', 'similar_sites_trdom' ) . "</h2>"; ?>

<form name="similar_sites_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="similar_sites_hidden" value="Y">
	<hr>
	<table>
		<tr><td><?php _e("Stripe background color: "); ?></td><td><input class="color" type="text" name="similar_sites_stripeBg" value="<?php echo $stripeBg; ?>" size="20"></td><td><?php _e(" default: 333333"); ?></td></tr>
		<tr><td><?php _e("Link background color: " ); ?></td><td><input class="color" type="text" name="similar_sites_linkBg" value="<?php echo $linkBg; ?>" size="20"></td><td><?php _e(" default: 333333"); ?></td></tr>
		<tr><td><?php _e("Link color: "); ?></td><td><input class="color" type="text" name="similar_sites_linkColor" value="<?php echo $linkColor; ?>" size="20"></td><td><?php _e(" default: ffffff"); ?></td></tr>
		<tr><td><?php _e("Link hover background color: "); ?></td><td><input class="color" type="text" name="similar_sites_linkHoverBg" value="<?php echo $linkHoverBg; ?>" size="20"></td><td><?php _e(" default: 9B1C26"); ?></td></tr>
		<tr><td><?php _e("Link hover color: "); ?></td><td><input class="color" type="text" name="similar_sites_linkHoverColor" value="<?php echo $linkHoverColor; ?>" size="20"></td><td><?php _e(" default: ffffff"); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><?php _e("Stripe width: "); ?></td><td><input type="text" name="similar_sites_stripeWidth" value="<?php echo $stripeWidth; ?>" size="20"></td><td><?php _e(" default: 960px"); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><strong>Open link in new tab </strong></td><td><input type="checkbox" name="similar_sites_new_tab" value="checked" <?php echo $newTab; ?>></td></tr>
	</table>
	<hr>
	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options', 'similar_sites_trdom' ) ?>" />
	</p>
</form>
</div>