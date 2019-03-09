<?php
/**
 * Author: David Wofford
 * Class: PhpPokeApiException
 * Description: An exception wrapper for the library based on the existing Exception class
 * Poke Api: https://pokeapi.co/
 */

namespace DavidWofford\PhpPokeApi;

class PhpPokeApiException extends \Exception
{
    /**
     * This class does not do anything special
     * It exists so that people can catch errors specifically from this api wrapper
     */
}
