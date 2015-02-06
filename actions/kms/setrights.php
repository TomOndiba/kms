<?php

$user = new ElggUser(get_input('username'));
$kms_role = get_input('kms_role');
$user->kms_role = $kms_role;

if($kms_role == 'admin')
{
	make_user_admin($user->guid);	
}
else
{
	remove_user_admin($user->guid);
}

$user->save();
elgg_trigger_event('kmsroleupdate', 'user', $user);