<?php
require('vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// Create a S3Client
$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'us-east-1',
    'version' => '2008-10-17'
]);

$bucket = 'elasticbeanstalk-us-east-1-933586134018';

// Get the policy of a specific bucket
try {
    $resp = $s3Client->getBucketPolicy([
        'Bucket' => $bucket
    ]);
    echo "Succeed in receiving bucket policy:\n";
    echo $resp->get('Policy');
    echo "\n";
} catch (AwsException $e) {
    // Display error message
    echo $e->getMessage();
    echo "\n";
}

?>
