<?php
require 'vendor/autoload.php';

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

// Create a Secrets Manager Client
$client = new SecretsManagerClient([
    'version' => 'latest',
    'region'  => 'ap-south-1'  // Example: us-east-1
]);

$secretName = 'AWS_keys';

try {
    // Fetch the secret
    $result = $client->getSecretValue(['SecretId' => $secretName]);
    $secrets = json_decode($result['SecretString'], true);

    // Store values in constants
    define('AWS_ACCESS_KEY', $secrets['AWS_ACCESS_KEY_ID']);
    define('AWS_SECRET_KEY', $secrets['AWS_SECRET_ACCESS_KEY']);
    define('S3_BUCKET', 'aws-aws');
    define('S3_REGION', 'ap-south-1');

} catch (AwsException $e) {
    die("Error retrieving secret: " . $e->getMessage());
}
?>
