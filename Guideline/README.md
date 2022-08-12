# ADN SMS API - v1.0

### NOTE:

- Before using the sample code, first initialize the credentials and api domain in the `config/config.php` file.
- `request_type` value options: `SINGLE_SMS`, `OTP`, `GENERAL_CAMPAIGN`, `MULTIBODY_CAMPAIGN`
- `message_type` value options: `TEXT`, `UNICODE`


## List of ERROR CODES
| ERROR CODE      | ERROR MESSAGE             |
| :-------------  | :----------------         |
| 2001            | INVALID_NUMBER            |
| 2002            | INVALID_MESSAGE_LENGTH    |
| 2003            | INVALID_PARAMETER         |
| 2004            | EXCEED_REQUEST_LIMIT      |
| 2005            | INVALID_MESSAGE_TYPE      |
| 3001            | INVALID_CREDENTIAL        |
| 4001            | CLIENT_DISABLED           |
| 4002            | MASK_DISABLED             |
| 4003            | API_DISABLED              |
| 4004            | IP_BLACKLISTED            |
| 4005            | INSUFFICIENT_BALANCE      |
| 4006            | NOT_CONFIGURED            |
| 5001            | UNKNOWN_ERROR             |
| 5004            | RECORD_NOT_FOUND          |



## All API list of ADN SMS:

#### Check Balance API

**Description:**

To check the remaining SMS balance status of your account, you can use this API.

**Request:**

**URL:** POST `/api/v1/secure/check-balance`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)


**Sample Success Response**

```
{
    "balance": {
        "sms": 49
    },
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

**Sample Failed Response**

```
{
    "balance": {},
    "api_response_code": 400,
    "api_response_message": "FAILED",
    "error": {
        "error_code": 3001,
        "error_message": "INVALID_CREDENTIAL"
    }
}
```

-----------

#### Campaign Status Check API

**Description:**

To check the individual campaign status, you can call this API.


**URL:** POST `/api/v1/secure/campaign-status`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `campaign_uid` (required)

**Sample Success Response**

```
{
    "campaign": {
        "campaign_uid": "CXXXXXXXXXXXXXXXX",
        "campaign_title": "API_Single_SMS_2018-05-18",
        "scheduled_time": "2018-05-18 17:51",
        "summary": {
            "pending": 0,
            "success": 5,
            "failed": 0
        }
    },
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

**Sample Failed Response**

```
{
    "campaign": {},
    "api_response_code": 400,
    "api_response_message": "FAILED",
    "error": {
        "error_code": 5004,
        "error_message": "RECORD_NOT_FOUND"
    }
}
```

-----------

#### SMS Status Check API

**Description:**

To check the individual SMS status, you can call this API.


**URL:** POST `/api/v1/secure/sms-status`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `sms_uid` (required)

**Sample Success Response**

```
{
    "sms": {
        "sms_uid": "SXXXXXXXXXXXXXXXX",
        "campaign_uid": "CXXXXXXXXXXXXXXXX",
        "recipient": "880161XXXXXXX",
        "message_body": "This is message body 03",
        "length": 23,
        "sms_quantity": 1,
        "sms_status": "SUCCESS"
    },
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

**Sample Failed Response**

```
{
    "sms": {},
    "api_response_code": 400,
    "api_response_message": "FAILED",
    "error": {
        "error_code": 5004,
        "error_message": "RECORD_NOT_FOUND"
    }
}
```

-----------


#### Send SMS API (Single SMS)

**Description:**

If you want to send SMS to a single/individual recipient (i.e. mobile number), you can use this API.

**Request**

**URL:** POST `/api/v1/secure/send-sms`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `request_type` (required, value: SINGLE_SMS)
4. `message_type` (required, value: TEXT | UNICODE)
5. `mobile` (required)
6. `message_body` (required)


**Sample Response**

```
{
    "request_type": "SINGLE_SMS",
    "campaign_uid": "CXXXXXXXXXXXXXXXX",
    "sms_uid": "SXXXXXXXXXXXXXXXX",
    "invalid_numbers": [],
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

-----------


#### Send SMS API (OTP)

**Description:**

If you want to send OTP SMS to a single/individual recipient (i.e. mobile number), you can use this API.

**Request**

**URL:** POST `/api/v1/secure/send-sms`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `request_type` (required, value: OTP)
4. `message_type` (required, value: TEXT | UNICODE)
5. `mobile` (required)
6. `message_body` (required)


**Sample Response**

```
{
    "request_type": "OTP",
    "campaign_uid": "CXXXXXXXXXXXXXXXX",
    "sms_uid": "SXXXXXXXXXXXXXXXX",
    "invalid_numbers": [],
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

-----------



#### Send SMS API (Bulk SMS)

**Description:**

If you want to send same SMS to multiple recipients (i.e. mobile numbers), you can use this API.
Note: You can send maximum 500 SMS via Bulk SMS API in a single request.

*Note: multiple mobile numbers should be comma-separated.*

**Request**

**URL:** POST `/api/v1/secure/send-sms`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `request_type` (required, value: GENERAL_CAMPAIGN)
4. `message_type` (required, value: TEXT | UNICODE)
5. `mobile` (required) [comma separated mobile numbers, ex. 018XXXXXXXX,017XXXXXXXX,016XXXXXXXX ]
6. `message_body` (required)
7. `campaign_title` (required)


**Sample Response**

```
{
    "request_type": "GENERAL_CAMPAIGN",
    "campaign_uid": "CXXXXXXXXXXXXXXXX",
    "sms_uid": null,
    "invalid_numbers": [
        "0144511455445"
    ],
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

-----------


#### Send SMS API (Multibody Campaign)

**Description:**

If you want to send different SMS to different recipients (i.e. mobile numbers), you can use this API.

*Note: You can send maximum 10 SMS via Multibody Campaign API in a single request.*

**Request**

**URL:** POST `/api/v1/secure/send-sms`

**Headers:** Accept:application/json

**Params:**

1. `api_key` (required)
2. `api_secret` (required)
3. `request_type` (required, value: MULTIBODY_CAMPAIGN)
4. `message_type` (required, value: TEXT | UNICODE)
5. `campaign_title` (optional)
6. `sms[][mobile]` (required)
7. `sms[][message_body]` (required)


**Sample Response**

```
{
    "request_type": "MULTIBODY_CAMPAIGN",
    "campaign_uid": "CXXXXXXXXXXXXXXXX",
    "sms_uid": null,
    "invalid_numbers": [],
    "api_response_code": 200,
    "api_response_message": "SUCCESS"
}
```

**Sample Failed Response For Send SMS API**

```
{
    "request_type": "MULTIBODY_CAMPAIGN",
    "api_response_code": 400,
    "api_response_message": "FAILED",
    "error": {
        "error_code": 3001,
        "error_message": "INVALID_CREDENTIAL"
    }
}
```
