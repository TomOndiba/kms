<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KmsPlatformsConfig
 *
 * @author serginho
 */
class KmsPlatformsConfig {
	
	public static $platforms = array(
		'observations' => array(
			'modules' => array(
				'blog','thewire','bookmarks','gallery'
			)        
		),
		'ideas' => array(
			'modules' => array(
				'forum','group1s','thewire1','polls'
			)
		),
		'research' => array(
			'modules' => array(
				'bookmarks','file','pages','webinar','etherpad','event_calendar'
			)
		),
		'projects' => array(
			'modules' => array(
				'chili','group2s','webinar1','desktop'
			)
		),
		'training' => array(
			'modules' => array(
				'group3s','dokuwiki','blog1'
			)
		)		
	);
	
	public static $roles = array(
		'guest' => array(
			'rules' => array(
				'observations' => 'r',
				'training' => 'r'
			)
		),
		'member' => array(
			'rules' => array(
				'observations' => 'r',
				'training' => 'r',
				'ideas' => 'rw'
			)			
		),
		'observer' => array(
			'rules' => array(
				'observations' => 'r',
				'training' => 'r',
				'ideas' => 'rw',
				'projects' => 'r',
				'research' => 'r'
			)			
		),
		'expert' => array(
			'rules' => array(
				'observations' => 'rw',
				'training' => 'r',
				'ideas' => 'rw',
				'projects' => 'r',
				'research' => 'rw'
			)			
		),
		'curator' => array(
			'rules' => array(
				'observations' => 'rw',
				'training' => 'rw',
				'ideas' => 'rw',
				'projects' => 'r',
				'research' => 'rw'
			)			
		),
		'manager' => array(
			'rules' => array(
				'observations' => 'rw',
				'training' => 'rw',
				'ideas' => 'rw',
				'projects' => 'rw',
				'research' => 'rw'
			)			
		),
		'moderator' => array(
			'rules' => array(
				'observations' => 'rw',
				'training' => 'rw',
				'ideas' => 'rw',
				'projects' => 'rw',
				'research' => 'rw'
			)			
		),
		'admin' => array(
			'rules' => array(
				'observations' => 'rw',
				'training' => 'rw',
				'ideas' => 'rw',
				'projects' => 'rw',
				'research' => 'rw'
			)			
		)
	);
	
	/**
	 * Количество кастомных модулей
	 * @var int
	 */
	public static $group_modules_count = 3;
	
	public static $group_widgets = array (
		'groups' => 'tool_latest',
		'group1s' => 'tool_latest',
		'group2s' => 'tool_latest',
		'group3s' => 'tool_latest',		
		'blog' => 'group_module',
		'blog1' => 'group_module',
		'bookmarks' => 'group_module',
		'etherpad' => 'group_module',
		'event_calendar' => 'group_module',
		'event_manager' => 'group_module',
		'file' => 'group_module',
		'profile' => 'groups/profile/activity_module',
		'pages' => 'group_module',
		'webinar' => 'group_module',
		'dokuwiki' => 'sidebar',
		'blog1' => 'group_module',
		'webinar' => 'group_module',
		'webinar1' => 'group_module',
		'webinar2' => 'group_module',
                'hypeForum' => 'framework/forum/group_module'
	);
        
        public static $widgets_by_group_modules = array(
            "group1s" => array(
                'hypeForum','blog1','bookmarks'
            ),
            "group2s" => array(
                'hypeForum','blog1','bookmarks','webinar1','pages','file','event_calendar'
            ),
            "group3s" => array(
                'dokuwiki','blog1'
            )            
        );       
	
	public static function get_module_name_from_url($url)
	{
		$url_arr = explode("/", $url);
		if(isset($url_arr[3]))
		{
			return $url_arr[3];
		}
		return null;		
	}
	
}
