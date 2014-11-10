<?php

$user = $vars['entity'];

if(!$user instanceof ElggUser) return;

echo " <b>".elgg_echo("kms:role:".kms_get_user_role($user))."</b> ";