<?php
/**
 * Вывод главной страницы
 */
function kms_index_hook($hook, $type, $returnValue, $params)
{

	$list_params = array(
		'type' => 'object',
		'limit' => 5,
		'full_view' => false,
		'view_type_toggle' => false,
		'pagination' => false,
	);

	//grab the latest 5 blog posts
	$list_params['subtype'] = 'blog';
	$blogs = elgg_list_entities($list_params);
	
	$list_params['subtype'] = 'news';
	$news = elgg_list_entities($list_params);	

	//grab the latest bookmarks
	$list_params['subtype'] = 'bookmarks';
	$bookmarks = elgg_list_entities($list_params);

	//grab the latest files
	$list_params['subtype'] = 'file';
	$files = elgg_list_entities($list_params);

	//get the newest members who have an avatar
	$newest_members = elgg_list_entities_from_metadata(array(
		'metadata_names' => 'icontime',
		'type' => 'user',
		'limit' => 10,
		'full_view' => false,
		'pagination' => false,
		'list_type' => 'gallery',
		'gallery_class' => 'elgg-gallery-users',
		'size' => 'small',
	));

	//newest groups
	$list_params['type'] = 'group';
	unset($list_params['subtype']);
	$groups = elgg_list_entities($list_params);

	//grab the login form
	$login = elgg_view("core/account/login_box");

	elgg_pop_context();

	// lay out the content
	$params = array(
		'blogs' => $blogs,
		'bookmarks' => $bookmarks,
		'files' => $files,
		'groups' => $groups,
		'login' => $login,
		'news' => $news,
		'members' => $newest_members,
	);
	$body = elgg_view_layout('kms_index', $params);

	// no RSS feed with a "widget" front page
	global $autofeed;
	$autofeed = FALSE;

	echo elgg_view_page('', $body);	
	
	return true;
}


function kms_page_handler($page, $handler, $return_value, $parameters)
{
	$plugin = elgg_get_plugin_from_id('kms');
	$intro_text = $plugin->getSetting('kms_' . $handler .'_text');	
	
    //echo "Главная страница";
	$content = $intro_text;

	$sidebar = "";
	
	if(elgg_is_logged_in())
	{
		
	} 
	else 
	{		
		$sidebar .= elgg_view('core/account/login_box');
	}

	$params = array(
			'content' => $content,
			'sidebar' => $sidebar,
			'title' => elgg_echo("kms:page:".$handler)
	);
	$body = elgg_view_layout('one_sidebar', $params);
	echo elgg_view_page(null, $body);	
}

function kms_main_image_handler()
{
	$plugin = elgg_get_plugin_from_id('kms');
	$main_image_guid = $plugin->getSetting('kms_main_image');

	$main_image = new ElggFile($main_image_guid);


	if(elgg_is_logged_in())
	{
		//var_dump($main_image->getFilenameOnFilestore());die();
		//header("Content-type: ".$main_image->mimetype);
		header('Expires: ' . date('r', time() + 864000));
		header("Pragma: public");
		header("Cache-Control: public");
		//header("Content-Length: " . strlen($contents));
		readfile($main_image->getFilenameOnFilestore());
		echo $contents;
		//var_dump(strlen($contents));				
		
	}	
}