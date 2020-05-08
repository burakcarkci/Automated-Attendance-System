<?php
//Bucket Name
$bucket="face-picture-collection";	
//AWS access info
$awsAccessKey = 'Your_Key_Here';
$awsSecretKey = 'Your_Secret_Key_Here';
//instantiate the class
$s3 = new S3($awsAccessKey, $awsSecretKey);
$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
?>