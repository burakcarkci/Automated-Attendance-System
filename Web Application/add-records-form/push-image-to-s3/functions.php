<?php
function getFileExtension($file_name) {
 return substr(strrchr($file_name,'.'),1);
}
?>