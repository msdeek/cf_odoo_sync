<?php

/**
 * CF Odoo Sync plugin Moodle client wrapper functions
 *
 * @package    local_cf_odoo_sync
 */

defined('MOODLE_INTERNAL') || die();

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * A wrapper class for the Moodle Web Services API client.
 */
class MoodleClient {

    /**
     * The base URL for the Moodle instance.
     *
     * @var string
     */
    private $moodleBaseUrl;

    /**
     * The token for authenticating requests to the Moodle Web Services API.
     *
     * @var string
     */
    private $moodleToken;

    /**
     * The GuzzleHttp\Client instance used for making HTTP requests to the Moodle Web Services API.
     *
     * @var GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Constructor.
     *
     * @param string $moodleBaseUrl The base URL for the Moodle instance.
     * @param string $moodleToken The token for authenticating requests to the Moodle Web Services API.
     */
    public function __construct($moodleBaseUrl, $moodleToken) {
        $this->moodleBaseUrl = $moodleBaseUrl;
        $this->moodleToken = $moodleToken;
        $this->httpClient = new Client([
            'base_uri' => $this->moodleBaseUrl . '/webservice/rest/server.php',
            'timeout'  => 10.0,
        ]);
    }

    /**
     * Makes a GET request to the Moodle Web Services API.
     *
     * @param string $function The function to call.
     * @param array $params The parameters to include in the request.
     * @return stdClass|null The decoded response body as an object, or null if the request fails.
     */
    public function get($function, $params = []) {
        try {
            $response = $this->httpClient->get('', [
                'query' => [
                    'wstoken' => $this->moodleToken,
                    'wsfunction' => $function,
                    'moodlewsrestformat' => 'json',
                ] + $params,
            ]);
            return json_decode($response->getBody());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    /**
     * Makes a POST request to the Moodle Web Services API.
     *
     * @param string $function The function to call.
     * @param array $params The parameters to include in the request.
     * @return stdClass|null The decoded response body as an object, or null if the request fails.
     */
    public function post($function, $params = []) {
        try {
            $response = $this->httpClient->post('', [
                'form_params' => [
                    'wstoken' => $this->moodleToken,
                    'wsfunction' => $function,
                    'moodlewsrestformat' => 'json',
                ] + $params,
            ]);
            return json_decode($response->getBody());
        } catch (GuzzleException $e) {
            return null;
        }
    }

}
