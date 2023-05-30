<?php

chdir('/var/www/shariki_backup');
echo 'Clean old' . PHP_EOL;

/**
 * @param array $files
 * @param int $maxCount
 * @return void
 */
function delete_files(array $files, int $maxCount): void
{
    if (count($files) > $maxCount) {
        $files = array_slice($files, 0, count($files) - $maxCount);
    } else {
        return;
    }
    foreach ($files as $file) {
        if (unlink($file)) {
            echo 'Removed: ' . $file . PHP_EOL;
        }
    }
}
$files = glob('backups/weekly/shariki*');
delete_files($files, 3);
$files = glob('backups/weekly/gelievyeshari24*');
delete_files($files, 3);

$files = glob('backups/daily/shariki*');
delete_files($files, 7);
$files = glob('backups/daily/gelievyeshari24*');
delete_files($files, 7);
