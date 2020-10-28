<?php

namespace App\Api\Frontpad;

class Connection {

    protected $url;
    protected $secret;

    protected $connection;

    public function __construct($config) {
        $this->url    = $config['url'];
        $this->secret = $config['secret'];
    }

    public function call($endpoint, $params) {
        $formParams           = $params;
        $formParams['secret'] = $this->secret;

        $options = [
            'form_params' => $formParams,
        ];

        return $this->getConnection()->post($endpoint, $options);
    }

    protected function getConnection() {
        if (!$this->connection) {
            $this->connection = new \GuzzleHttp\Client(['base_uri' => $this->url]);
        }

        return $this->connection;
    }

}
