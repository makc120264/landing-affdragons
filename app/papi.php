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
        $this->request["msisdn"] = "+971" . $this->request["msisdn"];
    }

    /**
     * @return array|string[]
     */
    public function sendOtp()
    {
        try {
            $data = [];
            if (file_exists(self::DATA_FILE_PATH)) {
                $jsonData = file_get_contents(self::DATA_FILE_PATH);
                $data = json_decode($jsonData, true);
            }

            if (!array_key_exists($this->request["msisdn"], $data)) {
                $data[$this->request["msisdn"]] = $this->request;
                $jsonData = json_encode($data);
                file_put_contents(self::DATA_FILE_PATH, $jsonData);
                $result = [
                    'response' => 'success',
                    'message' => "otp sent",
                    "reqid" => md5($this->request["msisdn"])
                ];
            } else {
                $result = [
                    "response" => "error",
                    "message" => "already subscribed"
                ];
            }

        } catch (Exception $e) {
            $result = [
                "response" => "error",
                "message" => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function validate()
    {
        try {
            $result = [];
            $result['validPhone'] = $this->validatePhoneNumber();
            $result['validRequestMethod'] = $this->validateRequestMethod();
            $result['validOperator'] = $this->validateOperator();
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
    private function validateOperator()
    {
        $result = [];
        if ($this->request["operator"] !== "etisalat") {
            $result = [
                'response' => 'error',
                'message' => "wrong operator",
            ];
        }

        return $result;
    }

    /**
     * @return array|string[]
     */
    private function validateRequestMethod()
    {
        $result = [];
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            $result = [
                'response' => 'error',
                'message' => "invalid method requested",
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
$result = $api->validate();

if ($result['response'] == 'success') {
    $request = $api->getRequest();
    $method = $request["method"];
    $result = $api->$method();
}

echo json_encode($result);