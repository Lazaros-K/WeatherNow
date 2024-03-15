<?php

class APIurl {
    
    public $KeyAPI = "";
    public $nameAPI = "";
    public $qAPI = "";

    function seturl($KeyAPI,$nameAPI,$qAPI) {
        $this->KeyAPI = $KeyAPI;
        $this->nameAPI = $nameAPI;
        $this->qAPI = $qAPI;
    }

    function geturl() {
        $URL_STRING = "http://api.weatherapi.com/v1/" . $this->nameAPI . "?key=" . $this->KeyAPI . "&q=" . $this->qAPI;
        return $URL_STRING;
    }
}

class APIrequest {

    public $urlObject;
    
    function __construct() {
        $this->urlObject = new APIurl();
    }

    function getjson() {

        $ch = curl_init();

        $headers = [
            "Content-type: application/json; charset=UTF-8",
            "accept-language: en"
        ];

        curl_setopt($ch, CURLOPT_URL, $this->urlObject->geturl());
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers

            //,CURLOPT_HEADER => true
        ]);

        $data = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        

        curl_close($ch);

        return $data;
    }
}
