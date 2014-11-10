<?php

/**
 * Action по загрузке главной картинки
 */

if( ! elgg_is_admin_logged_in()) { 
	// не админ, пошел вон.
	system_message("не админ");
	forward("");
}

if( ! isset($_FILES['image'])) {
	// не загрузил картинку, пошел вон.
	system_message("картинка не загружена");
	forward("");
}

$file = $_FILES['image'];

if (!is_array($file) || $file['error'] || getimagesize($file['tmp_name']) === false) {
	// загрузил плохую картинку, пошел вон.
	system_message("картинка не обработана");
	forward("");
}

$mime_type = ElggFile::detectMimeType($file['tmp_name'], $file['type']);
if($mime_type != 'image/png')
{
	// поддерживается только png
	system_message("поддерживается только PNG");
	forward("");	
}

$img_path = $CONFIG->path . "img/";

if(!is_writable($img_path))
{
	// поддерживается только png
	system_message("не могу записать в папку $img_path");
	forward("");		
}

$pathinfo = pathinfo($file['name']);

$file_path = $img_path."main.png";

move_uploaded_file($file['tmp_name'], $file_path);

system_message("Новая картинка успешно загружена");

forward("");
		