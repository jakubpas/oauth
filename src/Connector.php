<?php

namespace JakubPas\Oauth;

/**
 * Class Connector
 * @author Jakub Pas
 * @package JakubPas\Oauth
 */
class Connector
{
    public $provider;
    public $clientId;
    public $clientSecret;
    public $redirectUrl;
    public $scope;
    public $nonce;
    public $state;

    public $oauthVersion;
    public $dialogUrl;
    public $accessToken;
    public $responseType;
    public $userProfileUrl;
    public $header;

    protected $requestUrl;
    protected $accessTokenUrl;

    /**
     * @param string $provider
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param string $scope
     * @param string $nonce
     * @param string $state
     * @throws \Exception
     */
    public function __construct($provider, $clientId, $clientSecret, $redirectUrl, $scope, $nonce='', $state='')
    {
        $this->provider = $provider;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
        $this->scope = $scope;

        if(!isset($providers[$this->provider])) {
            throw new \Exception('Unknown provider');
        }
        foreach (Providers::$providers[$this->provider] as $property => $value) {
            $this->$property = $value;
        }
    }

    /**
     * Print authorization redirect
     */
    public function Authorize()
    {
        if ($this->oauthVersion == '2.0') {
            $dialogUrl = $this->dialogUrl . 'client_id=' . $this->clientId . '&response_type=' . $this->responseType . '&scope=' . $this->scope /*.'&nonce='.$this->nonce*/ . '&state=' . $this->state . '&redirect_uri=' . urlencode(
                    $this->redirectUrl
                );
        } else {
            $date = new \DateTime();
            $postParams = 'oauth_consumer_key=' . $this->clientId . '&oauth_signature_method=HMAC-SHA1' . '&oauth_timestamp=' . $date->getTimestamp(
                ) . '&oauth_nonce=' . $this->nonce . '&oauth_callback=' . $this->redirectUrl . '&oauth_signature=' . $this->clientSecret . '&oauth_version=1.0';
            $redirect_url = $this->requestUrl . $postParams;
            $oauth_redirect_value = $this->curlRequest($redirect_url, 'GET', '');
            $dialogUrl = $this->dialogUrl . $oauth_redirect_value;
        }
        echo "<script> top.location.href='" . $dialogUrl . "'</script>";
    }

    /**
     * @return string json string of user profile data
     * @param string $code
     */
    public function getUserProfile($code)
    {
        $accessToken = $this->getAccessToken($code);
        /**
         * @var \stdClass $tokenObject
         */
        $tokenObject = json_decode(stripslashes($accessToken));
        if ($tokenObject === null) {
            $token = $accessToken;
        } else {
            $token = $tokenObject->access_token;
        }
        if ($this->provider == 'Yammer') {
            $token = $tokenObject->access_token->token;
        }
        if ($this->userProfileUrl) {
            $profile_url = $this->userProfileUrl . $token;
            return $this->curlRequest($profile_url, 'GET', $token);
        }
        return (string) $accessToken;
    }

    /**
     * @param string $url
     * @return string
     */
    public function APICall($url)
    {
        return (string) $this->curlRequest($url, 'GET', $_SESSION['atoken']);
    }

    /**
     * @param string $url
     * @param string $method GET|POST
     * @param string $postFields
     * @return string
     */
    private function curlRequest($url, $method, $postFields)
    {
        $resource = curl_init($url);
        if ($method == "POST") {
            $options = array(
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $postFields,
                CURLOPT_RETURNTRANSFER => 1,
            );

        } else {
            $options = array(
                CURLOPT_RETURNTRANSFER => 1,
            );

        }
        curl_setopt_array($resource, $options);
        if ($this->header) {
            curl_setopt($resource, CURLOPT_HTTPHEADER, array($this->header . $postFields));
        }
        $response = (string) curl_exec($resource);
        curl_close($resource);
        if (preg_match('/graph\.connect\.facebook\.com\/me/', $url)) {
            $response = file_get_contents($url);
        }
        return $response;
    }

    /**
     * @return string
     * @param string $code
     */
    private function getAccessToken($code)
    {
        $postParams = 'client_id=' . $this->clientId . '&client_secret=' . $this->clientSecret . '&grant_type=authorization_code' . '&redirect_uri=' . urlencode(
                $this->redirectUrl
            ) . '&code=' . $code;
        return $this->curlRequest($this->accessTokenUrl, 'POST', $postParams);
    }
}