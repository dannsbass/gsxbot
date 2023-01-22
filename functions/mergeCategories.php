<?php
#mergeCategories.php
function mergeCategories($source_category, $destination_category){
	$buttons = json_decode(db::get('button_json'), true);
	foreach($buttons as $category => $services){
		if($category == $destination_category){
			$buttons[$category] = array_merge($buttons[$category], $buttons[$source_category]);
		}
	}
	unset($buttons[$source_category]);
  
  //debug
  //file_put_contents( fromid().'result.txt',  json_encode($buttons, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) );
	//Bot::sendDocument(fromid().'result.txt');
  //unlink(fromid().'result.txt');
  
	db::set('button_json', json_encode($buttons));
}
