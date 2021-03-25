<?php

namespace aki\telegram\base;

use aki\telegram\types\InputMedia\InputMedia;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
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
     * @var Input
     */
    private $_input;


    /**
     * @return \GuzzleHttp\Client
     */
    protected function getClient()
    {
        if (empty($this->_client)) {
            $this->_client = new Client(['base_uri' => $this->apiUrl]);
        }
        return $this->_client;
    }

    /**
     * @return \Input
     */
    /**
     * @return Input
     */
    protected function getInput(): ?Input
    {
        if (empty($this->_input)) {
            $input = file_get_contents('php://input');
            if (!$input) {
                $this->_input = null;
            } else {
                try {
                    $array = json_decode($input, true, 512, JSON_THROW_ON_ERROR);
                    $this->_input = new Input($array);
                }
                catch (\Exception $ex) {
                    return null;
                }
            }
        }

        return $this->_input;
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
            if ($key === 'media') {
                // Magical media input helper.
                $item = $this->mediaInputHelper($item, $is_resource, $multipart);
            } else if (in_array($key, $attachments)) {
                if (file_exists($item)) {
                    $file = fopen($item, 'r');
                    $is_resource |= is_resource($file);
                    $multipart[] = ['name' => $key, 'contents' => $file];
                }
            }


            $multipart[]  = ['name' => $key, 'contents' => $item];
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


    /**
     * 
     */
    public function mediaInputHelper($item, bool &$is_resource, &$multipart)
    {
        $was_array = is_array($item);
        $was_array || $item = [$item];

        $possible_medias = [];
        /** @var InputMedia|null $media_item */
        foreach ($item as $media_item) {
            if (!($media_item instanceof InputMedia)) {
                continue;
            }
            $possible_medias = array_filter([
                'media' => $media_item->media,
            ]);

            foreach ($possible_medias as $type => $media) {

                // Allow absolute paths to local files.
                $media = new Stream(fopen($media, 'rb'));

                if (is_resource($media) || $media instanceof Stream) {
                    $is_resource = true;
                    $unique_key   = uniqid($type . '_', false);
                    $multipart[]  = ['name' => $unique_key, 'contents' => $media];
                }
            }
        }
        return json_encode($item);
    }
}
