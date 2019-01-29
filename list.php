<?php
require('vendor/autoload.php');
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = Aws\S3\S3Client::factory();
$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>
<html>
    <head><meta charset="UTF-8"></head>
    <body>
        <h1>S3 Download example</h1>
<?php

		$objects = $s3->listObjectsV2(['Bucket' => 'elasticbeanstalk-us-east-1-536702249694']);
?>
		<h4>S3 Files</h4>
<?php
		echo "<p> Test </p>";
		foreach ($objects['Contents'] as $object){
			echo "Test <br>";
		}
?>
    </body>
</html>