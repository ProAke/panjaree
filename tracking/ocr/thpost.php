<?php
//include_once("trackingAPI.php");
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);



//require_once('trackingAPI.php'); // TrackingAPI class
$tokenKey = "OuTlWpIqYmZKHUU:TBZ9SLT?D!KgX.FOSMAjMmCwGMK4YdKJNqX9V6SUC-K-X2IfC-NmR6DUH=SYTmBAV0SGJoCxGnCnBbNWLCHZ";
$tokenPath = "tokenFoler\thposttoken.log"; // กำหนด path สำหรับสร้างไฟล์เก็บ token อย่าลืม permission 777 หรือ 755
$tracking = new TrackingAPI($tokenKey, $tokenPath);
echo $tracking->getLastToken(); // ค่า Token ที่ generate






class TrackingAPI
{
    private $_TOKEN_KEY; // static token ในหน้าจัดการของสมาชิก
    private $_TOKEN_PATH; // path ไฟล์สำหรับเก็บ Token
    private $_WEBHOOK; // ใช้งาน webhook หรือไม่

    // constructor
    public function __construct($_TOKEN_KEY, $_TOKEN_PATH, $_WEBHOOK = NULL)
    {
        $this->_TOKEN_KEY = $_TOKEN_KEY;
        $this->_TOKEN_PATH = $_TOKEN_PATH;
        $this->_WEBHOOK = $_WEBHOOK;
    }

    // ฟังก์ชั่นสำหรับเรียกดูข้อมูล Token ล่าสุด
    public function  getLastToken()
    {
        if (@file_exists($this->_TOKEN_PATH)) {
            list($expire, $token) = explode("\n", file_get_contents($this->_TOKEN_PATH));
            if (time() > strtotime($expire)) { // ถ้าหมดอายถ ให้ไป request ใหม่ 
                $dataToken = $this->getToken();
                if (isset($dataToken)) {
                    $accToken = $dataToken['token'];
                    $token = implode("\r\n", $dataToken);
                    $this->saveToken($token);
                    return $accToken;
                } else {
                    return NULL;
                }
            } else {
                return trim($token);
            }
        } else {
            $dataToken = $this->getToken();
            if (isset($dataToken)) {
                $accToken = $dataToken['token'];
                $token = implode("\r\n", $dataToken);
                $this->saveToken($token);
                return $accToken;
            } else {
                return NULL;
            }
        }
    }

    // ฟังก์ชั่นสำหรับ save Token ไปใน path ไฟล์ที่กำหนด
    public function saveToken($dataToken)
    {
        return file_put_contents($this->_TOKEN_PATH, $dataToken);
    }

    // ฟังกด์ชั่นสำหรับ Request Token .ใหม่
    public function getToken($ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;

        if (isset($this->_WEBHOOK)) {
            $tokenURL = "https://trackwebhook.thailandpost.co.th/post/api/v1/authenticate/token";
        } else {
            $tokenURL = "https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token";
        }

        $headers = array(
            'Authorization: Token ' . $this->_TOKEN_KEY,
            'Content-Type: application/json'
        );
        $data = array();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, TRUE);
        if (!is_null($result) && array_key_exists('token', $result)) {
            return $result;
        } else {
            return NULL;
        }
    }

    // getItems และ RequestItems
    public function getItems($barcode = array(), $lang = "TH", $ststus = "all", $batch = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        $accToken = $this->getLastToken();
        if (isset($batch)) {
            $trackURL = "https://trackapi.thailandpost.co.th/post/api/v1/track/batch";
        } else {
            $trackURL = "https://trackapi.thailandpost.co.th/post/api/v1/track";
        }

        $headers = array(
            'Authorization: Token ' . $accToken,
            'Content-Type: application/json'
        );

        $data = array(
            "status" => $ststus,
            "language" => $lang,
            "barcode" => $barcode
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $trackURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, TRUE);
        if (!is_null($result) && array_key_exists('status', $result)) {
            return $result;
        } else {
            return NULL;
        }
    }

    // HookTrack Function
    public function hookTrack($barcode = array(), $lang = "TH", $ststus = "all", $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;

        $accToken = $this->getLastToken();
        $hookURL = "https://trackwebhook.thailandpost.co.th/post/api/v1/hook";

        $headers = array(
            'Authorization: Token ' . $accToken,
            'Content-Type: application/json'
        );

        $data = array(
            "status" => $ststus,
            "language" => $lang,
            "barcode" => $barcode
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $hookURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, TRUE);
        if (!is_null($result) && array_key_exists('status', $result)) {
            return $result;
        } else {
            return NULL;
        }
    }
}
