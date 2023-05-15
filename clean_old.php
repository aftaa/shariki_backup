<?php

echo 'Clean old' . PHP_EOL;

$files = glob('backups/shariki*');
if (count($files) > 3) {
   $files = array_slice($files, 0, count($files) - 3);
}
foreach ($files as $file) {
    echo $file . PHP_EOL;
}