<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 12.06.2017
 * Time: 14:49
 */

namespace CallBundle\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ThuliumService
{
    private $login;

    private $password;

    private $url;

    public function __construct($url,$login,$password)
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;
    }

    public function getAgentInfo($agent_login)
    {
        $url = "{$this->url}/agents/{$agent_login}";

        return $this->doRequest("GET",$url);
    }

    public function doRequest($method,$url,$query = null,$body = null)
    {
        $client = new Client();

        try {
            if (!$query && !$body) {
                $response = $client->request($method,$url, [
                    "auth" => [$this->login, $this->password]
                ]);
            } else if($query && !$body) {
                $response = $client->request($method,$url, [
                    "query" => $query,
                    "auth" => [$this->login, $this->password]
                ]);
            } else if (!$query && $body) {
                $response = $client->request($method, $url, [
                    "form_params" => $body,
                    "auth" => [$this->login, $this->password]
                ]);
            } else {
                $response = $client->request($method,$url, [
                    "query" => $query,
                    "form_params" => $body,
                    "auth" => [$this->login, $this->password]
                ]);
            }

        }catch (ClientException $exception){
            return json_decode($exception->getResponse()->getBody(),true);
        }
        return json_decode($response->getBody()->getContents(),true);
    }
}