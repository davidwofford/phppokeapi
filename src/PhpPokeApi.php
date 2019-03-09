<?php
/**
 * Author: David Wofford
 * Class: PhpPokeApi
 * Description: A simple wrapper for calling the poke api and returning the data
 * Poke Api: https://pokeapi.co/
 */

namespace DavidWofford\PhpPokeApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;

final class PhpPokeApi implements PhpPokeApiConstants
{
    /**
     * PhpPokeApi constructor.
     */
    public function __construct()
    {
        if (!defined('PHP_POKE_API_BYPASS_SSL')) {
            define('PHP_POKE_API_BYPASS_SSL', false);
        }
    }

    /**
     * Handles fetching and returning data from an endpoint
     * @param string $endpoint
     * @param string|integer $nameOrId
     * @param array $filters
     * @param integer $limit
     * @param integer $offset
     * @return array
     * @throws PhpPokeApiException
     */
    public function fetchData(string $endpoint, $nameOrId = '', array $filters = [], int $limit = 20, int $offset = 0) : array
    {
        if (!in_array($endpoint, self::AVAILABLE_ENDPOINTS, true)) {
            throw new PhpPokeApiException('Invalid endpoint', 1000);
        }

        if ($limit > 100) {
            // This is done to prevent pulling too much data from the api to help abide by their fair use policy
            throw new PhpPokeApiException('Limit cannot be higher than 100', 1001);
        }

        if (is_string($nameOrId)) {
            $nameOrId = substr(filter_var(trim($nameOrId), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP), 0, 20);
        } elseif ($nameOrId === 0 || trim($nameOrId) === '') {
            $nameOrId = '';
        }

        $url = self::API_URL . $endpoint . '/' . $nameOrId . '?limit=' . $limit . '&offset=' . $offset;

        return $this->filterData($this->callApi($url), $filters);
    }

    /**
     * Handles calling the api
     * @param string $url
     * @return array
     * @throws PhpPokeApiException
     */
    private function callApi(string $url) : array
    {
        $client = new Client([
            'base_uri'  => $url,
            'timeout'   => self::TIMEOUT,
            // This will bypass the ssl cert check, do not turn this on in production
            'verify'    => !PHP_POKE_API_BYPASS_SSL
        ]);

        $request = new Request('GET', '', []);
        try {
            $response = $client->send($request);

            if ($response->getStatusCode() !== 200) {
                throw new PhpPokeApiException($response->getReasonPhrase(), $response->getStatusCode());
            }

            return  json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new PhpPokeApiException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Handles filtering the data
     * @param $data
     * @param $filters
     * @return array
     */
    private function filterData($data, $filters) : array
    {
        if (empty($filters)) {
            return $data;
        }

        $returnData = [];

        foreach ($filters as $key => $filter) {
            $key = is_array($filter) ? $key : $filter;
            if (isset($data[$key])) {
                $returnData[$key] = is_array($filter) ? $this->filterData($data[$key], $filter) : $data[$key];
            }
        }

        return $returnData;
    }
}