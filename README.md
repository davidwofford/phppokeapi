# PHP Poke API

A simple wrapper for connecting to and pulling information from the [Pokeapi](https://pokeapi.co/) api

## Features

- An easy to use wrapper for connecting to the poke api to get pokemon data
- Option to filter down the data that is returned from the api so you only get what you need

## Notes

- All data is returned as associative arrays

## Requirements

- PHP >= 7.1
- Curl extension enabled
- JSON extension enabled

## Installation

### Composer

To install through composer add the following line to your `composer.json` file:
```
    "require": {
        "davidwofford/phppokeape": "1.0.*"
    }
```
or run this command
```
    composer require davidwofford/phppokeapi
```

### Copy

If you do not wish to use composer, copy the PhpPokeApi directory to your library / vendor folder and add:

```php
    include "[vendor / library directory]/phppokeapi/src/constants.php";
    include "[vendor / library directory]/phppokeapi/src/PhpPokeApi.php";
```

## Usage

### Get a pokemon

To get all of the data for a specific
```php
    $pokeApi = new \DavidWofford\PhpPokeApi\PhpPokeApi();
    
    try {
        $data = $pokeApi->fetchData($pokeApi::ENDPOINT_POKEMON, 'bulbasaur');
    } catch (\Exception $e) {
        // Handle the exception
    }
```

### Filter down the data returned

To filter down the return data simply pass in the filter parameter

```php
    $pokeApi = new \DavidWofford\PhpPokeApi\PhpPokeApi();
    
    try {
        $filters = [
            'id',
            'name'
        ];
        $data = $pokeApi->fetchData($pokeApi::ENDPOINT_POKEMON, 'bulbasaur', $filters);
    } catch (\Exception $e) {
        // Handle the exception
    }
```

This will return:

```
[
    'id'    => 1,
    'name'  => 'bulbasaur'
]
```

### Configuration
If you are having issues with your ssl cert being denied locally you can add this define in your project to bypass the ssl cert check.

`define('PHP_POKE_API_BYPASS_SSL', true);`

**DO NOT TURN THIS ON IN PRODUCTION**

## Resources

- [Pokeapi documentation](https://pokeapi.co/docsv2/)
