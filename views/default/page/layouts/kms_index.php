<?php

$logged_in = elgg_is_logged_in();
$plugin = elgg_get_plugin_from_id('kms');
$mod_params = array('class' => 'elgg-module-highlight');
$main_image_guid = $plugin->getSetting('kms_main_image');

//$main_image = new ElggFile($main_image_guid);

//if($main_image) { 
	//echo "<img src=''";
	
//}

echo "<img src='/img/main.png'/>";


if(elgg_is_admin_logged_in()) { 
	
	echo "<a href='javascript:void(0);' onclick='$(this).hide(); $(\"#upload_new_main_image_form\").show();'>Изменить картинку</a>";

	$form_vars = array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'disable_security' => true,
		'class' => 'elgg-form-settings',
		'body' => elgg_view('forms/kms/upload_new_image')
	);

	$data = array();

	$form = elgg_view_form('kms/upload_new_image', $form_vars, $data);

	$form_class = 'elgg-module elgg-module-inline';
	/*if (!isset($vars['user_guid'])) {
		$form_class .= ' hidden';
	}*/
	?>

	<div class="<?php echo $form_class; ?>" id="upload_new_main_image_form" style="display:none;">
		<div class="elgg-head">
			<h3>Загрузка новой картинки на главную</h3>
		</div>
		<div class="elgg-body">
			<?php echo $form; ?>
		</div>	
	</div>
	<?	
	
}


?>
<div class="custom-index elgg-main elgg-grid clearfix">	
	<div class="elgg-col elgg-col-1of2">
		<div class="elgg-inner pvm prl">
<?php
// left column

echo elgg_view_module('featured',  $plugin->getSetting('kms_intro_title'), $plugin->getSetting('kms_intro_text') . "<p><a href='/about'>Подробнее</a></p><br/>", $mod_params);

echo elgg_view_module('featured',  elgg_echo("kms:last_news"), $vars['news']."<p style='text-align:right'><a href='/news'>Все новости</a></p>", $mod_params);

// a view for plugins to extend
echo elgg_view("index/lefthandside");
if($logged_in)
{
	// files
	if (elgg_is_active_plugin('file')) {
		echo elgg_view_module('featured',  elgg_echo("custom:files"), $vars['files'], $mod_params);
	}

	// groups
	if (elgg_is_active_plugin('groups')) {
		echo elgg_view_module('featured',  elgg_echo("custom:groups"), $vars['groups'], $mod_params);
	}
}
?>
		</div>
	</div>
	<div class="elgg-col elgg-col-1of2">
		<div class="elgg-inner pvm">
<?php
// right column

// Top box for login or welcome message
if ($logged_in) {
	$top_box = "<h2>" . elgg_echo("welcome") . " ";
	$top_box .= elgg_get_logged_in_user_entity()->name;
	$top_box .= "</h2>";
} else {
	$top_box = $vars['login'];
}
echo elgg_view_module('featured',  elgg_echo("kms:page:terms"), $plugin->getSetting('kms_terms_text_short') . "<p><a href='/terms'>Подробнее</a></p><br/>", $mod_params);

echo elgg_view_module('featured',  '', $top_box, $mod_params);





if($logged_in)
{
	
	
	// a view for plugins to extend
	echo elgg_view("index/righthandside");
	
	
	// files
	echo elgg_view_module('featured',  elgg_echo("custom:members"), $vars['members'], $mod_params);		

	// groups
	if (elgg_is_active_plugin('blog')) {
		echo elgg_view_module('featured',  elgg_echo("custom:blogs"), $vars['blogs'], $mod_params);
	}

	// files
	if (elgg_is_active_plugin('bookmarks')) {
		echo elgg_view_module('featured',  elgg_echo("custom:bookmarks"), $vars['bookmarks'], $mod_params);
	}
}
?>
		</div>
	</div>
</div>
