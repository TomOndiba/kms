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
echo elgg_view('input/hidden', array('name' => 'username', 'value' => $vars['username']));

$form = "<div>";
$form .= elgg_view('input/dropdown', array(
	'options_values' => $values, 
    'name' => 'kms_role', 
    'align' => 'horizontal',
	'value' => $vars['kms_role']
));
$form .= "</div><div class='elgg-foot'>";
$form .= elgg_view('input/submit', array(
	'value' => elgg_echo('kms:submit'),
));
$form .= '</div>';

echo $form;