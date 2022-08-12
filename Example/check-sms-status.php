<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$smsUid = 'SXXXXXXXXXXXXXXXX';

/*
 * For checking SMS Status with checkSmsStatus() method.
 * $smsUid : parameter is required.
 * */
$sms = new AdnSmsNotification();
$sms->checkSmsStatus($smsUid);
