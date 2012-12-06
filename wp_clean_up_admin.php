<?php
function wp_clean_up_admin() {
	add_options_page('WP Clean Up Options', 'WP Clean Up','manage_options', __FILE__, 'wp_clean_up_page');
}
function wp_clean_up_page(){
?>
<div class="wrap">
	
<?php screen_icon(); ?>
<h2>WP Clean Up</h2>

<?php
	$wcu_message = '';

	if(isset($_POST['wp_clean_up_revision'])){
		wp_clean_up('revision');
		$wcu_message = __("All revisions deleted!","WP-Clean-Up");
	}

	if(isset($_POST['wp_clean_up_draft'])){
		wp_clean_up('draft');
		$wcu_message = __("All drafts deleted!","WP-Clean-Up");
	}

	if(isset($_POST['wp_clean_up_autodraft'])){
		wp_clean_up('autodraft');
		$wcu_message = __("All autodrafts deleted!","WP-Clean-Up");
	}
	
	if(isset($_POST['wp_clean_up_moderated'])){
		wp_clean_up('moderated');
		$wcu_message = __("All moderated comments deleted!","WP-Clean-Up");
	}

	if(isset($_POST['wp_clean_up_spam'])){
		wp_clean_up('spam');
		$wcu_message = __("All spam comments deleted!","WP-Clean-Up");
	}

	if(isset($_POST['wp_clean_up_trash'])){
		wp_clean_up('trash');
		$wcu_message = __("All trash comments deleted!","WP-Clean-Up");
	}

	if(isset($_POST['wp_clean_up_all'])){
		wp_clean_up('revision');
		wp_clean_up('draft');
		wp_clean_up('autodraft');
		wp_clean_up('moderated');
		wp_clean_up('spam');
		wp_clean_up('trash');
		$wcu_message = __("All redundant data deleted!","WP-Clean-Up");
	}

	if($wcu_message != ''){
		echo '<div id="message" class="updated fade"><p><strong>' . $wcu_message . '</strong></p></div>';
	}
?>

<p>
<table class="widefat" style="width:36%;">
	<thead>
		<tr>
			<th scope="col"><?php _e('Type','WP-Clean-Up'); ?></th>
			<th scope="col"><?php _e('Count','WP-Clean-Up'); ?></th>
			<th scope="col"><?php _e('Operate','WP-Clean-Up'); ?></th>
		</tr>
	</thead>
	<tbody id="the-list">
		<tr class="alternate">
			<td class="column-name">
				<?php _e('Revision','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('revision'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_revision" value="revision" />
					<input type="submit" class="<?php if(wp_clean_up_count('revision')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
		<tr>
			<td class="column-name">
				<?php _e('Draft','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('draft'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_draft" value="draft" />
					<input type="submit" class="<?php if(wp_clean_up_count('draft')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
		<tr class="alternate">
			<td class="column-name">
				<?php _e('Auto Draft','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('autodraft'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_autodraft" value="autodraft" />
					<input type="submit" class="<?php if(wp_clean_up_count('autodraft')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
		<tr>
			<td class="column-name">
				<?php _e('Moderated Comments','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('moderated'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_moderated" value="moderated" />
					<input type="submit" class="<?php if(wp_clean_up_count('moderated')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
		<tr class="alternate">
			<td class="column-name">
				<?php _e('Spam Comments','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('spam'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_spam" value="spam" />
					<input type="submit" class="<?php if(wp_clean_up_count('spam')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
		<tr>
			<td class="column-name">
				<?php _e('Trash Comments','WP-Clean-Up'); ?>
			</td>
			<td class="column-name">
				<?php echo wp_clean_up_count('trash'); ?>
			</td>
			<td class="column-name">
				<form action="" method="post">
					<input type="hidden" name="wp_clean_up_trash" value="trash" />
					<input type="submit" class="<?php if(wp_clean_up_count('trash')>0){echo 'button-primary';}else{echo 'button';} ?>" value="<?php _e('Delete','WP-Clean-Up'); ?>" />
				</form>
			</td>
		</tr>
	</tbody>
</table>
</p>

<p>
<form action="" method="post">
	<input type="hidden" name="wp_clean_up_all" value="all" />
	<input type="submit" class="button-primary" value="<?php _e('Delete All','WP-Clean-Up'); ?>" />
</form>
</p>
<br />


<h3>Related Links</h3>
1. <a href="http://boliquan.com/wp-clean-up/" target="_blank">WP Clean Up (FAQ)</a> | <a href="http://wordpress.org/extend/plugins/wp-clean-up/" target="_blank">Download</a><br />
2. <a href="http://boliquan.com/wp-smtp/" target="_blank">WP SMTP</a> | <a href="http://wordpress.org/extend/plugins/wp-smtp/" target="_blank">Download</a><br />
3. <a href="http://boliquan.com/wp-code-highlight/" target="_blank">WP Code Highlight</a> | <a href="http://wordpress.org/extend/plugins/wp-code-highlight/" target="_blank">Download</a><br />
4. <a href="http://boliquan.com/wp-slug-translate/" target="_blank">WP Slug Translate</a> | <a href="http://wordpress.org/extend/plugins/wp-slug-translate/" target="_blank">Download</a><br />
5. <a href="http://boliquan.com/wp-anti-spam/" target="_blank">WP Anti Spam</a> | <a href="http://wordpress.org/extend/plugins/wp-anti-spam/" target="_blank">Download</a><br />
6. <a href="http://boliquan.com/yg-share/" target="_blank">YG Share</a> | <a href="http://wordpress.org/extend/plugins/yg-share/" target="_blank">Download</a>

<br /><br />
<?php $donate_url = plugins_url('/img/paypal_32_32.jpg', __FILE__);?>
<?php $paypal_donate_url = plugins_url('/img/btn_donateCC_LG.gif', __FILE__);?>
<?php $ali_donate_url = plugins_url('/img/alipay_donate.png', __FILE__);?>
<div class="icon32"><img src="<?php echo $donate_url; ?>" alt="Donate" /></div>
<h2>Donate</h2>
<p>
If you find my work useful and you want to encourage the development of more free resources, you can do it by donating.
</p>
<p>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=SKA6TPPWSATKG&item_name=BoLiQuan&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=CA&bn=PP%2dDonationsBF&charset=UTF%2d8" target="_blank"><img src="<?php echo $paypal_donate_url; ?>" alt="Paypal Donate" title="Paypal" /></a>
&nbsp;
<a href="https://me.alipay.com/boliquan" target="_blank"><img src="<?php echo $ali_donate_url; ?>" alt="Alipay Donate" title="Alipay" /></a>
</p>
<br />

<div style="text-align:center; margin:60px 0 10px 0;">&copy; <?php echo date("Y"); ?> BoLiQuan</div>

</div>
<?php 
}
add_action('admin_menu', 'wp_clean_up_admin');
?>