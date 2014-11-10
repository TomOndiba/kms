<?

/**
 * Инициализация модуля
 */
function kms_init(){  
	
	global $CONFIG;

    // Получаем поолный контроль над меню.
    elgg_unregister_plugin_hook_handler('prepare', 'menu:site', 'elgg_site_menu_setup');
    elgg_register_plugin_hook_handler('prepare', 'menu:site', 'kms_site_menu_prepare');
    elgg_register_plugin_hook_handler('register', 'menu:site', 'kms_site_menu_register'); 
    
	//Если hypeStyler включен, для него отдельный css
    if(elgg_is_active_plugin('hypeStyler'))
    {
        elgg_extend_view("css/elgg", "kms/css/hypeStylerFix");
    }
       
	//Дополнительные стили
    elgg_extend_view("css/elgg", "kms/css/site");
	
	//Свой логотип
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	elgg_register_menu_item('topbar', array(
	   'name' => 'elgg_logo',
	   'href' => elgg_get_site_url(),
	   'text' => "СУЗ-РТК",
	   'priority' => 1,
	   'link_class' => 'elgg-topbar-logo',
	));	

	//Отменяем обработчики страниц из модуля pages и вставляем свои
	foreach(array('about','terms','privacy') as $page_name)
	{
		elgg_unregister_page_handler($page_name);
		elgg_register_page_handler($page_name,'kms_page_handler');
	}	
	
	//Хэндлер для вывода главной страницы
	elgg_register_page_handler("get_main_image",'kms_main_image_handler');
  
	$action_base = dirname(dirname(__FILE__)) . '/actions/kms';
	
	//Добавление ссылки "изменить права доступа" в профиле пользователя
    elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'kms_rights_user_hover_menu');
	
	//По всей видимости это не нужно. на всяк пока оставлю.
    //elgg_register_admin_menu_item('administer', 'kms', 'administer_utilities');	
	
	//Action по установке прав доступа
	elgg_register_action("kms/setrights", "$action_base/setrights.php");	  
	
	//Action по загрузке картинки на главную
	elgg_register_action("kms/upload_new_image", "$action_base/upload_new_image.php");	
	
	//Вывод роли пользователя на странице пользователя
	elgg_extend_view('profile/status', 'kms/profile_status', 100);
	
	//Вывод статуса пользователя возле его имени
	elgg_extend_view('object/summary/extend', 'kms/user_summary_extend', 100);
	
	//Хук для отправки почты через smtp
	register_plugin_hook('email', 'system', 'kms_email_hook');
	
	//Обработчик для управления боковыми меню
	elgg_register_plugin_hook_handler('prepare', 'menu:owner_block', 'kms_prepare_owner_block');
	
	/**
	 * Виджеты групп
	 */	
	
	//хендлер для обработки шаблонов групп с виджетами
	$CONFIG->template_handler = 'kms_templage_handler';	
	
	
	//echo "<pre>";
	for($i = 1; $i <= KmsPlatformsConfig::$group_modules_count; $i++)
	{		
		$new_tool_options = array();	


        $was_names = array();

        foreach($CONFIG->group_tool_options as $group_tool_option)
        {
                if(array_search($group_tool_option->name, $was_names) !== false) continue;
                $was_names[] = $group_tool_option->name;				

                if(array_search($group_tool_option->name, KmsPlatformsConfig::$widgets_by_group_modules["group{$i}s"]) !== false)
                {										
                        $new_tool_options[] = $group_tool_option;
                }
        }
		
		//echo "<pre>";
		//var_dump($new_tool_options);die();
		
        $new_key = "group{$i}_tool_options";

        $CONFIG->$new_key = $new_tool_options;		
	}
	
	//die();
	
	
	
	//Убиваем все другие обработчики главных страниц
	foreach($CONFIG->hooks['index']['system'] as $callback)
	{
		elgg_unregister_plugin_hook_handler('index','system', $callback);
	}
	
	//Главная страница
	elgg_register_plugin_hook_handler('index', 'system', 'kms_index_hook'); 		
	
	//Проверка прав доступа для группы
	elgg_register_plugin_hook_handler('container_permissions_check','all','kms_container_permissions_check');
	
	//($hook, $type, $returnvalue, $params)
	////($hook, $type, $callback, $priority = 500)
	//container_permissions_check
	
	
	/**
	 * Инициализация новостей
	 */	
	
	//Хэндлер для страницы новостей
	elgg_register_page_handler('news','kms_news_page_handler');
	
	//Яваскрипт для страницы редактирования новости
	$blog_js = elgg_get_simplecache_url('js', 'news/save_draft');
	elgg_register_simplecache_view('js/news/save_draft');
	elgg_register_js('elgg.news', $blog_js);	
	
	//Actions для новостей. Сохранение, автосохранение, удаление.
	$action_path = $action_base . '/news';
	elgg_register_action('news/save', "$action_path/save.php");
	elgg_register_action('news/auto_save_revision', "$action_path/auto_save_revision.php");
	elgg_register_action('news/delete', "$action_path/delete.php");
	
	//Переопределяем адрес ссылки на страницу новостей
	elgg_register_entity_url_handler('object', 'news', 'kms_news_url_handler');		
	
	//Это небольшой хак для очистки потока вывода. С помощью него заработала hypeGallry
	ob_clean();
}