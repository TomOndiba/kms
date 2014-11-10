<?php
	/**
	 * language pack
	 */

	$russian = array(
		
		'kms:area:observations' => 'Наблюдения',
		'kms:area:ideas' => 'Идеи',
		'kms:area:research' => 'Исследования',
		'kms:area:projects' => 'Проекты',
		'kms:area:training' => 'Обучение',
		
		'kms:role:guest' => 'Гость',
		'kms:role:member' => 'Участник',
		'kms:role:observer' => 'Исследователь',
		'kms:role:expert' => 'Эксперт',
		'kms:role:curator' => 'Куратор',
		'kms:role:manager' => 'Руководитель проектов',
		'kms:role:moderator' => 'Модератор',
		'kms:role:admin' => 'Администратор',				
		
		'kms:page:about' => 'О сайте',
		'kms:page:terms' => 'Правила',
		'kms:page:privacy' => 'Конфиденциальность',						
		
		'admin:administer_utilities:kms' => 'Установить права доступа', 
        'kms:rights_explore' => 'Установить права доступа', 
        'kms:set_user_rights' => "Установить права доступа для пользователя", 
        'kms:submit' => 'Установить', 
		
		'kms:news' => 'Новости', 
		'kms:last_news' => 'Последние новости', 
		'kms:news_all' => 'Все новости', 
		
		'river:comment:object:news' => "%s комментировал(а) новость %s", 
		'river:create:object:news' => "%s опубликовал(а) новость %s", 
		'item:object:news' => 'Новости',		
		'kms:news_none' => 'Нет новостей',		
		'news:add' => 'Добавить новость',		
		"news" => "Новости сайта",
		
	//todo: еренести в проект languages
	'likes:this' => 'одобрил',
	'likes:deleted' => 'Ваше одобрение удалено',
	'likes:see' => 'Посмотреть, кто одобрил',
	'likes:remove' => 'Не одобряю больше',
	'likes:notdeleted' => 'There was a problem removing your like',
	'likes:likes' => 'Вы одобрили!',
	'likes:failure' => 'There was a problem liking this item',
	'likes:alreadyliked' => 'Вы это уже одобряли!',
	'likes:notfound' => 'The item you are trying to like cannot be found',
	'likes:likethis' => 'Одобряю',
	'likes:userlikedthis' => '%s одобрение получено',
	'likes:userslikedthis' => '%s одобрений',
	'likes:river:annotate' => 'одобрения',

	'river:likes' => 'одобрил %s %s',

	// notifications. yikes.
	'likes:notifications:subject' => '%s одобрил ваш пост "%s"',
	'likes:notifications:body' =>
'Привет %1$s,

%2$s одобрил ваш пост "%3$s" %4$s!

Ваш пост тут:

%5$s

или посмотреть профиль %2$s\'s тут:

%6$s

Чмоки!,
%4$s
',		
	);

	add_translation("ru",$russian);
?>
