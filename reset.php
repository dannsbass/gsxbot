<?php
require 'functions/db.php';
db::set('button_json', file_get_contents('backup.json'));