<?php
	$user = $vars['entity'];
	$role = kms_get_user_role($user);
?>
<div class="elgg-border-plain pam mbm clearfix"><b><?=elgg_echo('kms:role:'.$role)?></b></div>