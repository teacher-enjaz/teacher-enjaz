<?php
$targetFolder = 'http://127.0.0.1:8000/storage/app/public';
$linkFolder = 'http://127.0.0.1:8000/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
?>
