<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$message = "Thank you for your purchase. We have received your payment for item #13201. John Doe Shop.";
$recipient="8801717xxxxxx";       // For SINGLE_SMS or OTP
$requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
$messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

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

$sms = new AdnSmsNotification();
$sms->sendSms($requestType, $message, $recipient, $messageType);
