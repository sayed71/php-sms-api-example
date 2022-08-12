<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$messageType = 'TEXT'; // option available: "TEXT", "UNICODE"
$campaignTitle = '20180517_MultibodyCampaign01'; // optional for MULTIBODY_CAMPAIGN

/*
 * Prepare the $smsArray for Multibody Campaign
 */
$smsArray = [
    ['mobile' => '8801717xxxxxx', 'message_body' => 'This is message body 01'],
    ['mobile' => '8801817xxxxxx', 'message_body' => 'This is message body 02'],
    ['mobile' => '8801617xxxxxx', 'message_body' => 'This is message body 03'],
    ['mobile' => '8801527xxxxxx', 'message_body' => 'This is message body 04'],
    ['mobile' => '8801927xxxxxx', 'message_body' => 'This is message body 05'],
];

/*
 * Sending SMS with multibodyCampaign() method
 * -------
 * Params:
 * -------
 * $smsArray      : Must be an array containing two keys: mobile and message_body
 * $messageType   : Must contain any of the two values: "TEXT", "UNICODE"
 * $campaignTitle : optional
 */

$sms = new AdnSmsNotification();
$sms->multibodyCampaign($smsArray, $messageType, $campaignTitle);
