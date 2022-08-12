<?php

namespace AdnSms;

interface AdnSmsInterface
{
    public function setRecipient($recipient);

    public function getRecipient();

    public function setMessageBody($message);

    public function getMessageBody();

    public function setMessageType($messageType);

    public function getMessageType();

    public function setRequestType($requestType);

    public function getRequestType();

    public function sendSms($requestType, $message, $recipient, $messageType);

    public function multibodyCampaign($smsArray, $messageType);

    public function callToApi($data);
}
