<?php

class Papi
{
    const DATA_FILE_PATH = "/var/www/landing-affdragons.loc/app/data/data.json";
    /**
     * @var mixed
     */
    private $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->request["msisdn"] = "+971" . $this->request["phone"];
        $this->request["userIp"] = $_SERVER["REMOTE_ADDR"];
    }

    public function sendOtp()
    {
        $params = [
            'clickid' => $this->request["clickId"],
            'msisdn' => $this->request["msisdn"],
            'method' => 'sendOtp',
            'operator' => 'etisalat',
            'pid' => 1190,
            'offer_id' => 15976,
            'userIP' => $_SERVER["REMOTE_ADDR"],
            'userUA' => $_SERVER['HTTP_USER_AGENT'],
            'data' => $this->request["data"]
        ];

        $url = 'https://fordragopro.com/papi/Serpkcae/' . '?' . http_build_query($params);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $result = [
                "response" => 'error',
                "message" => 'Error cURL: ' . curl_error($ch)
            ];
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($httpCode >= 200 && $httpCode < 300) {
                $result = $response;
            } else {
                $result = [
                    "response" => 'error',
                    "message" => "Error HTTP ($httpCode): $response"
                ];
            }
        }

        curl_close($ch);

        return $result;
    }

    /**
     * @return mixed
     */
    public function validate()
    {
        try {
            $result = [];
            $result['validPhone'] = $this->validatePhoneNumber();
        } catch (Exception $e) {
            $result = [
                "response" => "error",
                "message" => $e->getMessage()
            ];
        }
        return $this->checkErrors($result);
    }

    /**
     * @param $result
     * @return mixed
     */
    private function checkErrors($result)
    {
        foreach ($result as $key => $value) {
            if (empty($value) || $value['response'] != 'error') {
                unset($result[$key]);
            }
        }

        if (empty($result)) {
            $result = [
                'response' => 'success',
                'message' => "otp verified",
            ];
        }

        return $result;
    }

    /**
     * @return array|string[]
     */
    private function validatePhoneNumber()
    {
        $result = [];
        if (!preg_match('/^\+971[0-9]{9}$/', $this->request["msisdn"])) {
            $result = [
                'response' => 'error',
                'message' => "msisdn must have 9 digits",
            ];
        }

        return $result;
    }
}

$api = new Papi();
$validateResult = $api->validate();

if (isset($validateResult['response']) && $validateResult['response'] == 'success') {
    $result = $api->sendOtp();
} else {
    $messages = [];
    foreach ($validateResult as $key => $value) {
        $messages[] = $value["message"];
    }
    $result = [
        'response' => 'error',
        'message' => $messages,
    ];
}

echo json_encode($result);