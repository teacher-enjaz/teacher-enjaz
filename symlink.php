<?php
$targetFolder = '/127:0:0:1:8000/storage/app/public';
$linkFolder = '/127:0:0:1:8000/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
?>
