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
		<h3>S3 Files</h3>
<?php
	try {
		$objects = $s3->getIterator('ListObjects', array(
			"Bucket" => $bucket
		));
		foreach ($objects as $object) {
			echo $object['Key'] . "<br>";
			echo 'Download link would be: ', $s3->getObjectUrl($bucket, $object['Key']), "\n\n"; 
		}
?>
<?php } catch(Exception $e) { ?>
        <p>error :(</p>
<?php }  ?>
    </body>
</html>