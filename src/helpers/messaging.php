<?php
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;
require_once('src\helpers\load.php');


//  declare keys in variables
$url = "https://parseapi.back4app.com/classes/Message";
$body = "src\components\message.json";
$keys = array(
  "X-Parse-Application-Id" => "BCrUQVkk80pCdeImSXoKXL5ZCtyyEZwbN7mAb11f",
  "X-Parse-REST-API-Key" => "swrFFIXJlFudtF3HkZPtfybDFRTmS7sPwvGUzQ9w",
);

// construct message object
$message = new ParseObject("Message");
$message->set("toUser", ParseUser::getCurrentUser());
$message->set("read", true);
$message->set("fromUser", ParseUser::getCurrentUser());
$message->set("message","a string");
$message->set("Connections", new ParseObject("Connections"));

// post method for headers
if (isset($_POST($url, $keys, $body) ) ) {
      //try and POST the variables with the keys and the body  
 try {
  $message->save();
  echo 'New object created with objectId: ' . $message->getObjectId();

 } catch (ParseException $ex) {
   // Execute any logic that should take place if the save fails.
   // error is a ParseException object with an error code and message.
   echo 'Failed to create new object, with error message: ' . $ex->getMessage();
     }

    }

?>

