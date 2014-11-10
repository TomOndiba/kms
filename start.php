<?php

$lib = dirname(__FILE__)."/lib/";

//Инициализация
require_once($lib."init.php");

//Работа с меню
require_once($lib."menu.php");

//Письма
require_once($lib."email.php");
require_once($lib."email_hook.php");

//Управление доступом к площадкам
require_once($lib."access.php");

//Конфиг
require_once($lib."KmsPlatformsConfig.php");

//Страницы (главная, о компании, ...)
require_once($lib."pages.php");

//Новости сайта
require_once($lib."news.php");

unset($lib);

//Подписываемся на событие инициализации
elgg_register_event_handler("init", "system", "kms_init");