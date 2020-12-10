<?php

namespace aki\telegram\base;

use GuzzleHttp\Client;
use yii\base\Component;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class TelegramBase extends Component
{

    /**
     * @var string boturl
     */
    public $apiUrl = "https://api.telegram.org";

    /**
     * Token taken from botFather
     * @var string
     */
    public $botToken;

    /**
     * bot username
     */
    public $botUsername = "PostManBot";

    /**
     * @var string SOCKS5 proxy format string: <login>:<password>@<host>:<port>
     */
    public $proxy;

    /**
     * @var \GuzzleHttp\Client
     */
    private $_client;


    /**
     * @return \GuzzleHttp\Client
     */
    protected function GetClient()
    {
        if (empty($this->_client)) {
            $this->_client = new Client(['base_uri' => $this->apiUrl]);
        }
        return $this->_client;
    }

    /**
     * initializeParams
     * @param Array $params
     */
    public function initializeParams($params)
    {
        $is_resource = false;
        $multipart    = [];

        if (empty($params)) {
            return [];
        }

        //Reformat data array in multipart way if it contains a resource
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video', 'voice', 'animation', 'video_note', 'thumb'];
        foreach ($params as $key => $item) {
           
            if (in_array($key, $attachments)) {
                if (file_exists($item)) {
                    $file = fopen($item, 'r');
                    $is_resource |= is_resource($file);
                    $multipart[] = ['name' => $key, 'contents' => $file];
                }
            }
            else{
                $multipart[] = ['name' => $key, 'contents' => $item];
            }
        }
        if ($is_resource) {
            return ['multipart' => $multipart];
        }

        return ['form_params' => $params];
    }

    /**
     * send request
     * @param String $method
     * @param Array $params
     * @return string 
     */
    public function send($method, $params = null)
    {
        $request_params = $this->initializeParams($params);
        $response = $this->client->post("/bot" . $this->botToken . $method, $request_params);
        $body = json_decode($response->getBody(), true);
        return $body;
    }
}
