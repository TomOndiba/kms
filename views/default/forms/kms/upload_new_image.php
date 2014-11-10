<?php

/* 
 * Form body for access rights setting
 */

$values = array();

foreach(array_keys(KmsPlatformsConfig::$roles) as $role)
{
	$values[$role] = elgg_echo("kms:role:$role");
}

//var_dump($vars);


echo elgg_view('input/securitytoken');
echo "<b>Только PNG!!!</b>:";
echo elgg_view('input/file', array('name' => 'image'));

$form = "<div class='elgg-foot'>";
$form .= elgg_view('input/submit', array(
	'value' => elgg_echo('kms:submit'),
));
$form .= '</div>';

echo $form;