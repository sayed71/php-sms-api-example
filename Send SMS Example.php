<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$digits = 5;
$randnumber =  rand(pow(10, $digits-1), pow(10, $digits)-1);

$message = "Verify code is: ".$randnumber;
$recipient="8801843******";       // For SINGLE_SMS or OTP (Set Mobile Number)
$requestType = 'OTP';    // options available: "SINGLE_SMS", "OTP"
$messageType = 'UNICODE';         // options available: "TEXT", "UNICODE"

/*
 * Sending Single SMS or OTP with sendSms() method
 * ----------
 * Params:
 * ----------
 * $requestType   : Required, Must contain any of the two values: "SINGLE_SMS", "OTP"
 * $message       : Required
 * $recipient     : Required
 * $messageType   : Must contain any of the two values: "TEXT", "UNICODE"
 */
//Balance
//$smsNotification = new AdnSmsNotification();
//$smsNotification->checkBalance();


$sms = new AdnSmsNotification();
echo $sms->sendSms($requestType, $message, $recipient, $messageType);
