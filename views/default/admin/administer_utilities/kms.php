<?php

/* 
 * Elgg kms set rights page.
 */

$user = new ElggUser($_GET['username']);

$role = kms_get_user_role($user);

$form_vars = array(
	'method' => 'POST',
	'disable_security' => true,
	'class' => 'elgg-form-settings'
);

$data = array(
	'kms_role' => $role,
	'username' => $_GET['username']
);

$form = elgg_view_form('kms/setrights', $form_vars, $data);

$form_class = 'elgg-module elgg-module-inline';
/*if (!isset($vars['user_guid'])) {
	$form_class .= ' hidden';
}*/
?>

<div class="<?php echo $form_class; ?>">
	<div class="elgg-head">
		<h3><?php echo elgg_echo('kms:set_user_rights'); ?> <?=$user->name?></h3>
	</div>
	<div class="elgg-body">
		<?php echo $form; ?>
	</div>	
</div>
<a href="/profile/<?=$_GET['username']?>">&larr; Назад</a>