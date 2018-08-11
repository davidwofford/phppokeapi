<?php
/**
 * Author: David Wofford
 * Class: PhpPokeApi
 * Description: A simple wrapper for calling the poke api and returning the data
 * Poke Api: https://pokeapi.co/
 */

namespace DavidWofford\PhpPokeApi;

final class PhpPokeApi implements constants
{
    /**
     * Handles fetching and returning data from an endpoint
     * @param string $endpoint
     * @param string|integer $nameOrId
     * @param array $filters
     * @param integer $limit
     * @param integer $offset
     * @return array
     * @throws \Exception
     */
    public function fetchData(string $endpoint, $nameOrId = '', array $filters = [], int $limit = 20, int $offset = 0) : array
    {
        if (!in_array($endpoint, self::AVAILABLE_ENDPOINTS, true)) {
            throw new \Exception('Invalid endpoint', 1000);
        }

        if ($limit > 100) {
            // This is done to prevent pulling too much data from the api to help abide by their fair use policy
            throw new \Exception('Limit cannot be higher than 100', 1001);
        }

        if (is_string($nameOrId)) {
            $nameOrId = substr(filter_var(trim($nameOrId), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP), 0, 20);
        } elseif ($nameOrId === 0 || strlen(trim($nameOrId)) === 0) {
            $nameOrId = '';
        }

        $url = self::API_URL . $endpoint . '/' . $nameOrId . '?limit=' . $limit . '&offset=' . $offset;

        return $this->filterData($this->callApi($url), $filters);
    }

    /**
     * Handles calling the api
     * @param string $url
     * @return array
     * @throws \Exception
     */
    private function callApi(string $url) : array
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::TIMEOUT);

        if (!$curlData = curl_exec($curl)) {
            throw new \Exception(curl_error($curl), curl_errno($curl));
        } else {
            $http = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($http === 200) {
                $returnData = json_decode($curlData, true);
            } else {
                $curlData = json_decode($curlData, true);
                $returnData = [
                    'error' => isset($curlData['detail']) ? $curlData['detail'] : 'An has error occurred'
                ];
            }


        }

        curl_close($curl);

        return $returnData;
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