<?php

function kms_get_user_role(ElggUser $user = null)
{
	if($user == null)
	{
		return 'guest';
	}
	
	if(array_search($user->kms_role, array_keys(KmsPlatformsConfig::$roles)) === false)
	{	
		$user->kms_role = 'guest';
		$user->save();
	}
	if($user->isAdmin())
	{
		return 'admin';
	}	
	return $user->kms_role;
}

/**
 * 
 * @param ElggUser $user
 * @param string $area площадка
 * @param string $access r|w
 * @return bool Есть ли доступ
 */
function kms_user_access(ElggUser $user = null, $area = null, $access = null)
{
	$role = ($user == null) ? "none" : kms_get_user_role($user);	
	
	if(!isset(KmsPlatformsConfig::$roles[$role]['rules'][$area]))
	{		
		return false;
	}
	
	return strpos(KmsPlatformsConfig::$roles[$role]['rules'][$area], $access) !== false;
}

/**
 * Add to the user hover menu
 */
function kms_rights_user_hover_menu($hook, $type, $return, $params){

	$user = $params['entity'];

	$url = "admin/administer_utilities/kms?username={$user->username}";
	$item = new ElggMenuItem('kms', elgg_echo('kms:rights_explore'), $url);
	$item->setSection('admin');
	$return[] = $item;

	return $return;
}

function kms_container_permissions_check($hook, $type, $return, $params)
{
	$container = $params['container'];
	$user = $params['user'];
	$subtype = $params['subtype'];
	
	$container_class = get_class($container);
	
	if(strpos($container_class, "ElggGroup") !== false && $container->isMember($user))
	{
		$return = true;
	}
	
	return $return;
	
	
	/*
	echo "<pre>";
	var_dump($params);
	die();
	 * 
	 */
}

