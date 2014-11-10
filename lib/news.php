<?php
/**
 * Blog helper functions
 *
 * @package Blog
 */
function kms_news_page_handler($page) {

	
	// push all blogs breadcrumb
	elgg_push_breadcrumb(elgg_echo('kms:news'), "news/all");

	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	$page_type = $page[0];
	switch ($page_type) {		
		case 'view':
			$params = kms_news_get_page_content_read($page[1]);
			break;		
		case 'add':
			gatekeeper();
			$params = kms_news_get_page_content_edit($page_type, $page[1]);
			break;
		case 'edit':
			gatekeeper();
			$params = kms_news_get_page_content_edit($page_type, $page[1], $page[2]);
			break;	
		case 'all':			
			$params = kms_news_get_page_content_list();
			
			break;
		default:
			return false;
	}

	if (isset($params['sidebar'])) {
		$params['sidebar'] .= elgg_view('blog/sidebar', array('page' => $page_type));
	} else {
		$params['sidebar'] = elgg_view('blog/sidebar', array('page' => $page_type));
	}
		
	$params['filter'] = "";

	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($params['title'], $body);
	return true;
}



/**
 * Get page components to view a blog post.
 *
 * @param int $guid GUID of a blog entity.
 * @return array
 */
function kms_news_get_page_content_read($guid = NULL) {

	$return = array();

	$new = get_entity($guid);

	// no header or tabs for viewing an individual blog
	$return['filter'] = '';

	if (!elgg_instanceof($new, 'object', 'news')) {
		register_error(elgg_echo('noaccess'));
		$_SESSION['last_forward_from'] = current_page_url();
		forward('');
	}

	$return['title'] = $new->title;

	elgg_push_breadcrumb($new->title);
	$return['content'] = elgg_view_entity($new, array('full_view' => true));
	// check to see if we should allow comments
	if ($new->comments_on != 'Off' && $new->status == 'published') {
		$return['content'] .= elgg_view_comments($new);
	}

	return $return;
}

/**
 * Все новости
 *
 * @param int $container_guid The GUID of the page owner or NULL for all blogs
 * @return array
 */
function kms_news_get_page_content_list() {

	$return = array();

	$options = array(
		'type' => 'object',
		'subtype' => 'news',
		'full_view' => false,
	);

	elgg_push_breadcrumb(elgg_echo('kms:news_all'));	

	$is_admin = elgg_is_admin_logged_in();
	
    if($is_admin)
	{		
		elgg_register_title_button();
		$options['metadata_name_value_pairs'] = array(
			array('name' => 'status', 'value' => 'published'),
		);		
	}

	$list = elgg_list_entities_from_metadata($options);
	if (!$list) {
		$return['content'] = elgg_echo('kms:news_none');
	} else {
		$return['content'] = $list;
	}
	

	return $return;
}

/**
 * Get page components to list of the user's friends' posts.
 *
 * @param int $user_guid
 * @return array
 */
function kms_news_get_page_content_friends($user_guid) {

	$user = get_user($user_guid);
	if (!$user) {
		forward('news/all');
	}

	$return = array();

	$return['filter_context'] = 'friends';
	$return['title'] = elgg_echo('blog:title:friends');

	$crumbs_title = $user->name;
	elgg_push_breadcrumb($crumbs_title, "news/owner/{$user->username}");
	elgg_push_breadcrumb(elgg_echo('friends'));

	elgg_register_title_button();

	if (!$friends = get_user_friends($user_guid, ELGG_ENTITIES_ANY_VALUE, 0)) {
		$return['content'] .= elgg_echo('friends:none:you');
		return $return;
	} else {
		$options = array(
			'type' => 'object',
			'subtype' => 'blog',
			'full_view' => FALSE,
		);

		foreach ($friends as $friend) {
			$options['container_guids'][] = $friend->getGUID();
		}

		// admin / owners can see any posts
		// everyone else can only see published posts
		$show_only_published = true;
		$current_user = elgg_get_logged_in_user_entity();
		if ($current_user) {
			if (($user_guid == $current_user->guid) || $current_user->isAdmin()) {
				$show_only_published = false;
			}
		}
		if ($show_only_published) {
			$options['metadata_name_value_pairs'][] = array(
				array('name' => 'status', 'value' => 'published')
			);
		}

		$list = elgg_list_entities_from_metadata($options);
		if (!$list) {
			$return['content'] = elgg_echo('blog:none');
		} else {
			$return['content'] = $list;
		}
	}

	return $return;
}

/**
 * Get page components to show blogs with publish dates between $lower and $upper
 *
 * @param int $owner_guid The GUID of the owner of this page
 * @param int $lower      Unix timestamp
 * @param int $upper      Unix timestamp
 * @return array
 */
function kms_news_get_page_content_archive($owner_guid, $lower = 0, $upper = 0) {

	$now = time();

	$owner = get_entity($owner_guid);
	elgg_set_page_owner_guid($owner_guid);

	$crumbs_title = $owner->name;
	if (elgg_instanceof($owner, 'user')) {
		$url = "news/owner/{$owner->username}";
	} else {
		$url = "news/group/$owner->guid/all";
	}
	elgg_push_breadcrumb($crumbs_title, $url);
	elgg_push_breadcrumb(elgg_echo('blog:archives'));

	if ($lower) {
		$lower = (int)$lower;
	}

	if ($upper) {
		$upper = (int)$upper;
	}

	$options = array(
		'type' => 'object',
		'subtype' => 'blog',
		'full_view' => FALSE,
	);

	if ($owner_guid) {
		$options['container_guid'] = $owner_guid;
	}

	// admin / owners can see any posts
	// everyone else can only see published posts
	if (!(elgg_is_admin_logged_in() || (elgg_is_logged_in() && $owner_guid == elgg_get_logged_in_user_guid()))) {
		if ($upper > $now) {
			$upper = $now;
		}

		$options['metadata_name_value_pairs'] = array(
			array('name' => 'status', 'value' => 'published')
		);
	}

	if ($lower) {
		$options['created_time_lower'] = $lower;
	}

	if ($upper) {
		$options['created_time_upper'] = $upper;
	}

	$list = elgg_list_entities_from_metadata($options);
	if (!$list) {
		$content = elgg_echo('blog:none');
	} else {
		$content = $list;
	}

	$title = elgg_echo('date:month:' . date('m', $lower), array(date('Y', $lower)));

	return array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
	);
}

/**
 * Get page components to edit/create a blog post.
 *
 * @param string  $page     'edit' or 'new'
 * @param int     $guid     GUID of blog post or container
 * @param int     $revision Annotation id for revision to edit (optional)
 * @return array
 */
function kms_news_get_page_content_edit($page, $guid = 0, $revision = NULL) {

	
	elgg_load_js('elgg.news');

	$return = array(
		'filter' => '',
	);

	$vars = array();
	$vars['id'] = 'blog-post-edit';
	$vars['class'] = 'elgg-form-alt';

	$sidebar = '';
	if ($page == 'edit') {
		$new = get_entity((int)$guid);

		$title = elgg_echo('blog:edit');

		if (elgg_instanceof($new, 'object', 'news') && $new->canEdit()) {
			$vars['entity'] = $new;

			$title .= ": \"$new->title\"";

			if ($revision) {
				$revision = elgg_get_annotation_from_id((int)$revision);
				$vars['revision'] = $revision;
				$title .= ' ' . elgg_echo('blog:edit_revision_notice');

				if (!$revision || !($revision->entity_guid == $guid)) {
					$content = elgg_echo('blog:error:revision_not_found');
					$return['content'] = $content;
					$return['title'] = $title;
					return $return;
				}
			}

			$body_vars = kms_news_prepare_form_vars($new, $revision);

			elgg_push_breadcrumb($new->title, $new->getURL());
			elgg_push_breadcrumb(elgg_echo('edit'));
			
			elgg_load_js('elgg.blog');

			$content = elgg_view_form('news/save', $vars, $body_vars);
			$sidebar = elgg_view('news/sidebar/revisions', $vars);
		} else {
			$content = elgg_echo('blog:error:cannot_edit_post');
		}
	} else {
		elgg_push_breadcrumb(elgg_echo('blog:add'));
		$body_vars = kms_news_prepare_form_vars(null);

		$title = elgg_echo('blog:add');
		$content = elgg_view_form('news/save', $vars, $body_vars);
	}

	$return['title'] = $title;
	$return['content'] = $content;
	$return['sidebar'] = $sidebar;
	return $return;	
}

/**
 * Pull together blog variables for the save form
 *
 * @param ElggBlog       $post
 * @param ElggAnnotation $revision
 * @return array
 */
function kms_news_prepare_form_vars($post = NULL, $revision = NULL) {

	// input names => defaults
	$values = array(
		'title' => NULL,
		'description' => NULL,
		'status' => 'published',
		'access_id' => ACCESS_DEFAULT,
		'comments_on' => 'On',
		'excerpt' => NULL,
		'tags' => NULL,
		'container_guid' => NULL,
		'guid' => NULL,
		'draft_warning' => '',
	);

	if ($post) {
		foreach (array_keys($values) as $field) {
			if (isset($post->$field)) {
				$values[$field] = $post->$field;
			}
		}

		if ($post->status == 'draft') {
			$values['access_id'] = $post->future_access;
		}
	}

	if (elgg_is_sticky_form('blog')) {
		$sticky_values = elgg_get_sticky_values('blog');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}
	
	elgg_clear_sticky_form('blog');

	if (!$post) {
		return $values;
	}

	// load the revision annotation if requested
	if ($revision instanceof ElggAnnotation && $revision->entity_guid == $post->getGUID()) {
		$values['revision'] = $revision;
		$values['description'] = $revision->value;
	}

	// display a notice if there's an autosaved annotation
	// and we're not editing it.
	if ($auto_save_annotations = $post->getAnnotations('kms_news_auto_save', 1)) {
		$auto_save = $auto_save_annotations[0];
	} else {
		$auto_save = false;
	}

	if ($auto_save && $auto_save->id != $revision->id) {
		$values['draft_warning'] = elgg_echo('blog:messages:warning:draft');
	}

	return $values;
}

/**
 * Forward to the new style of URLs
 * 
 * Pre-1.7.5
 * Group blogs page: /news/group:<container_guid>/
 * Group blog view:  /news/group:<container_guid>/read/<guid>/<title>
 * 1.7.5-1.8
 * Group blogs page: /news/owner/group:<container_guid>/
 * Group blog view:  /news/read/<guid>
 * 
 *
 * @param string $page
 */
function kms_news_url_forwarder($page) {

	$viewtype = elgg_get_viewtype();
	$qs = ($viewtype === 'default') ? "" : "?view=$viewtype";

	$url = "news/all";

	// easier to work with & no notices
	$page = array_pad($page, 4, "");

	// group usernames
	if (preg_match('~/group\:([0-9]+)/~', "/{$page[0]}/{$page[1]}/", $matches)) {
		$guid = $matches[1];
		$entity = get_entity($guid);
		if (elgg_instanceof($entity, 'group')) {
			if (!empty($page[2])) {
				$url = "news/view/$page[2]/";
			} else {
				$url = "news/group/$guid/all";
			}
			register_error(elgg_echo("changebookmark"));
			forward($url . $qs);
		}
	}

	if (empty($page[0])) {
		return;
	}

	// user usernames
	$user = get_user_by_username($page[0]);
	if (!$user) {
		return;
	}

	if (empty($page[1])) {
		$page[1] = 'owner';
	}

	switch ($page[1]) {
		case "read":
			$url = "news/view/{$page[2]}/{$page[3]}";
			break;
		case "archive":
			$url = "news/archive/{$page[0]}/{$page[2]}/{$page[3]}";
			break;
		case "friends":
			$url = "news/friends/{$page[0]}";
			break;
		case "new":
			$url = "news/add/$user->guid";
			break;
		case "owner":
			$url = "news/owner/{$page[0]}";
			break;
	}

	register_error(elgg_echo("changebookmark"));
	forward($url . $qs);
}

function kms_news_url_handler($entity) {
	
	if (!$entity->getOwnerEntity()) {
		// default to a standard view if no owner.
		return FALSE;
	}

	$friendly_title = elgg_get_friendly_title($entity->title);

	return "news/view/{$entity->guid}/$friendly_title";
	
}
