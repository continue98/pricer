<?php

class ReceiptNalog {

    private $_authString;
    private $_headers;

    public function __construct($login, $password) {

        $this->_authString = "$login:$password";

        $deviceId = uniqid();
        $deviceOS = "Android 4.4.4";
        $protocol = "2";
        $clientVersion = "1.4.1.3";
        $userAgent = "okhttp/3.0.1";

        $this->_headers = array(
            "Device-Id: $deviceId",
            "Device-OS: $deviceOS",
            "Version: $protocol",
            "ClientVersion: $clientVersion",
            "UserAgent: $userAgent",
        );
    }

    private function setOpts(&$curl) {
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->_headers);
        curl_setopt($curl, CURLOPT_USERPWD, $this->_authString);
    }

    /**
     * string $fiscalDriveNumber ФН
     * string $fiscalDocumentNumber ФД
     * string $fiscalSign ФП
     */
    public function get($fiscalDriveNumber, $fiscalDocumentNumber, $fiscalSign) {

        $base = "https://proverkacheka.nalog.ru:9999";

        $ch = curl_init("$base/v1/inns/*/kkts/*/fss/$fiscalDriveNumber/tickets/$fiscalDocumentNumber?fiscalSign=$fiscalSign&sendToEmail=no");
        $this->setOpts($ch);

        return curl_exec($ch);
    }

}
