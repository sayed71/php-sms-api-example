<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$message = "Thank you for your purchase. We have received your payment for item #13201. John Doe Shop.";
$recipient="8801777xxxxxx,8801717xxxxxx,8801841xxxxxx,8801678xxxxxx,8801521xxxxxx,8801919xxxxxx"; // For bulk sms i.e. general campaign

$requestType = 'GENERAL_CAMPAIGN';
$messageType = 'TEXT'; // option available: "TEXT", "UNICODE"
$campaignTitle = '20180518_Campaign01'; // set a meaningful campaign title

/*
 * Sending SMS with sendBulkSms() method
 * ---------
 * Params:
 * ---------
 * $message       : Required
 * $recipient     : Required
 * $messageType   : Must contain any of the two values: "TEXT", "UNICODE"
 * $campaignTitle : Required
 */
$sms = new AdnSmsNotification();
$sms->sendBulkSms($message, $recipient, $messageType, $campaignTitle);
