<?php
require_once 'vendor/autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;


$connectionString = 'DefaultEndpointsProtocol=http;AccountName=text;AccountKey=GekwgNRIiF60aOhbG7shJegF4ExM9gSFkTKGxl3sFDy7W1hz4HFy0Yg+za4BE4QPDJTBAvlYhacbUe+0Q460+Q==';

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

try    {
    // List blobs.
    $blob_list = $blobRestProxy->listBlobs("text");
    $blobs = $blob_list->getBlobs();

    foreach($blobs as $blob)
    {
        echo $blob->getName().": ".$blob->getUrl()."<br />";
    }
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

?>

