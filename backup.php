<?php
require 'reqs.php';
$json = db::get('button_json');
file_put_contents('button_json_backup.json', $json);
db::set('button_json_backup', $json);