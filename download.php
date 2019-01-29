<?php
require('vendor/autoload.php');

$s3 = Aws\S3\S3Client::factory();

$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

$objects = $s3->getIterator('ListObjects', array(
    "Bucket" => $bucket
));

foreach ($objects as $object) {
    echo $object['Key'] . "<br>";
}


?>