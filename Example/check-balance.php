<?php

require_once(__DIR__."/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

/*
 * For Checking Balance with checkBalance() method.
 * */
$smsNotification = new AdnSmsNotification();
$smsNotification->checkBalance();
