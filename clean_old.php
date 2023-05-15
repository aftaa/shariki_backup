<?php

chdir('/var/www/shariki_backup');
echo 'Clean old' . PHP_EOL;

/**
 * @param array $files
 * @return void
 */
function delete_files(array $files): void
{
    if (count($files) > 3) {
        $files = array_slice($files, 0, count($files) - 3);
    } else {
        return;
    }
    foreach ($files as $file) {
        if (unlink($file)) {
            echo 'Removed: ' . $file . PHP_EOL;
        }
    }
}
$files = glob('backups/shariki*');
delete_files($files);
$files = glob('backups/gelievyeshari24*');
delete_files($files);
