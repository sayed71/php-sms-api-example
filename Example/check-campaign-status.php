<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

$campaignUid = 'CXXXXXXXXXXXXXXXX';

/*
 * For checking Campaign Status with checkCampaignStatus() method.
 * $campaignUid : parameter is required.
 * */
$sms = new AdnSmsNotification();
$sms->checkCampaignStatus($campaignUid);
