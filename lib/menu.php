 <?php

/* 
 * Функции для управления меню
 */


function kms_site_menu_register($hook, $type, $return, $params){    
    
	$result = array();
	
	if( ! elgg_is_logged_in()) { return array(); }

	$items_by_modules = array();
	foreach($return as $menu_item)
	{
		$arr = explode("/", str_replace(elgg_get_site_url(),"", $menu_item->getHref()));
		$module_name = $arr[0];

		$items_by_modules[$module_name] = $menu_item;
	}     
	
	$kms_platforms_config = KmsPlatformsConfig::$platforms;
	
	$priority = 0;
	
	$user = elgg_get_logged_in_user_entity();
	
	foreach(array_keys($kms_platforms_config) as $platform_alias)
	{
		if( !kms_user_access($user, $platform_alias, 'r')) continue;
		
		$href = "#";
		
		if($platform_alias == "projects")
		{
			$href = "/chili";
		}
		
		$menu_options = array(
					"name" => "platform_".$platform_alias,
					"text" => elgg_echo("kms:area:".$platform_alias),
					"href" => $href,
					"priority" => $priority++,
					"id" => "platform_".$platform_alias
		);	
		
		$result[] = ElggMenuItem::factory($menu_options);
	}
	
	$menu_options = array(
				"name" => "platform_more",
				"text" => elgg_echo("more"),
				"href" => "#",
				"priority" => $priority++,
				"id" => "platform_more"
	);	

	$result[] = ElggMenuItem::factory($menu_options);	
	
	foreach($items_by_modules as $module_name => $menu_item)
	{		
		if($module_name == '#hj-dropdown-user-panel') continue;
		if($module_name == 'groups') continue;
		
		$platform = "more";
		foreach($kms_platforms_config as $platform_name => $platform_config)
		{
			if(array_search($module_name, $platform_config['modules']) !== false)
			{
				$platform = $platform_name;
				break;
			}
		}
		
		$menu_options = array(
			"name" => $menu_item->getName(),
			"text" => strip_tags($menu_item->getText()),
			"href" => $menu_item->getHref(),
			"priority" => $menu_item->getPriority()
		);

		$menu_options["parent_name"] = "platform_$platform";

		$result[] = ElggMenuItem::factory($menu_options);		
	}
	
	$menu_options = array(
		"name" => "news",
		"text" => "Новости",
		"href" => "/news",
		"priority" => 100,
		"parent_name" => "platform_more"
	);

	$result[] = ElggMenuItem::factory($menu_options);
	

	return $result;
    
    
}

function kms_site_menu_prepare($hook, $type, $return, $params) {
        // select parent menu items
	$item = elgg_extract('selected_item', $params);
	
	while ($item && ($item = $item->getParent())) {
		$item->setSelected(true);
	}
	// update order
	$ordered = array();

	if(isset($return["default"])){
		foreach($return["default"] as $menu_item){
			$priority = $menu_item->getPriority();
			while(array_key_exists($priority, $ordered)){
				$priority++;
			}
			$ordered[$priority] = $menu_item;
				
			if($children = $menu_item->getChildren()){
				// sort children
				$ordered_children = array();
	
				foreach($children as $child){
					$child_priority = $child->getPriority();
					while(array_key_exists($child_priority, $ordered_children)){
						$child_priority++;
					}
					$ordered_children[$child_priority] = $child;
				}
				ksort($ordered_children);
	
				$menu_item->setChildren($ordered_children);
			}
		}
	}
	
	ksort($ordered);

	$return["default"] = $ordered;

	return $return;    
}

function kms_prepare_owner_block($hook, $type, $items, $params)
{
	$returnValue = $items;
	global $CONFIG;
	
	
	for($i = 1; $i <= KmsPlatformsConfig::$group_modules_count; $i++)
	{
		if (elgg_instanceof($params['entity'], 'group','group'.$i)) {
			
			$returnValue = array('default' => array());
						
			$platform = null;
			$platform_config = null;
			foreach(KmsPlatformsConfig::$platforms as $platform_name => $config)
			{
				if(array_search("group{$i}s", $config['modules']) !== false)
				{
					$platform = $platform_name;
					$platform_config = $config;					
				}
			}
			
			if($platform !== null)
			{
				foreach($items['default'] as $item)
				{
					/* @var $item  ElggMenuItem */
					$item_module_name = KmsPlatformsConfig::get_module_name_from_url($item->getHref());

					if(array_search($item_module_name, $platform_config['modules']) !== false
						|| $item_module_name == 'discussion'.$i)
					{
						$returnValue['default'][] = $item;
					}
				}	
			}
			
			break;
		}			
	}
	
	
	
	return $returnValue;
}


function kms_templage_handler($view, $vars)
{	
	for($i = 1; $i <= KmsPlatformsConfig::$group_modules_count; $i++)
	{
		if ($view == "group{$i}s/tool_latest") {	
			
			$return_value = "";
						
			$platform = null;
			$platform_config = null;
			foreach(KmsPlatformsConfig::$platforms as $platform_name => $config)
			{
				if(array_search("group{$i}s", $config['modules']) !== false)
				{
					$platform = $platform_name;
					$platform_config = $config;					
				}
			}
			
			
			if($platform !== null)
			{
				
				foreach(KmsPlatformsConfig::$group_widgets as $widget_module_name => $view_name)
				{
					//echo $widget_module_name."<br/>";
					if(strpos($view_name, "/") === false)
					{
						$view_name = $widget_module_name."/".$view_name;
					}
					if(array_search($widget_module_name, KmsPlatformsConfig::$widgets_by_group_modules["group{$i}s"]) !== false)
					{
						//echo "y $view_name<br/>";
						$return_value .= elgg_view($view_name, $vars, true);
					}					
				}								
			}
			
			return $return_value;
		}			
	}	
	
	
	return elgg_view($view, $vars, true);
	
	//$CONFIG->template_handler;
}