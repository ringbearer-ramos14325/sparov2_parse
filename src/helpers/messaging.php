<?php
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;

$url = "https://parseapi.back4app.com/classes/Message";
$body = "src\helpers\message.json";
$applicationId = "X-Parse-Application-Id: BCrUQVkk80pCdeImSXoKXL5ZCtyyEZwbN7mAb11f";
$REST_API_KEY = "X-Parse-REST-API-Key: swrFFIXJlFudtF3HkZPtfybDFRTmS7sPwvGUzQ9w";


$message = new ParseObject("Message");
$message->set("toUser", ParseUser::getCurrentUser());
$message->set("read", true);
$message->set("fromUser", ParseUser::getCurrentUser());
$message->set("message","a string");
$message->set("Connections", new ParseObject("Connections"));

if (isset($_POST[$applicationId]) && $_POST([$REST_API_KEY] ) ) {
  die ("Invalid headers for Parse Server");
} else try {
   $message->save();
   echo 'New object created with objectId: ' . $message->getObjectId();
 } catch (ParseException $ex) {
   // Execute any logic that should take place if the save fails.
   // error is a ParseException object with an error code and message.
   echo 'Failed to create new object, with error message: ' . $ex->getMessage();
 }   

?>

