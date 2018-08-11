<?php
/**
 * Author: David Wofford
 * Class: constants
 * Description: An interface to hold the constants used by the api wrapper
 * Poke Api: https://pokeapi.co/
 */
namespace DavidWofford\PhpPokeApi;

interface constants
{
    /**
     * @const string Stores the base url to call for the api
     */
    const API_URL = 'http://pokeapi.co/api/v2/';

    /**
     * @const int Stores the timeout time for the api call
     */
    const TIMEOUT = 10;

    /**
     * @const array List of available endpoints
     */
    const AVAILABLE_ENDPOINTS = [
        'berry',
        'berry-firmness',
        'berry-flavor',
        'contest-type',
        'contest-effect',
        'super-contest-effect',
        'encounter-method',
        'encounter-condition',
        'encounter-condition-value',
        'evolution-chain',
        'evolution-trigger',
        'generation',
        'pokedex',
        'version',
        'version-group',
        'item',
        'item-attribute',
        'item-category',
        'item-fling-effect',
        'item-pocket',
        'machine',
        'move',
        'move-ailment',
        'move-battle-style',
        'move-category',
        'move-damage-class',
        'move-learn-method',
        'move-target',
        'location',
        'location-area',
        'pal-park-area',
        'region',
        'ability',
        'characteristic',
        'egg-group',
        'gender',
        'growth-rate',
        'nature',
        'pokeathlon-stat',
        'pokemon',
        'pokemon-color',
        'pokemon-form',
        'pokemon-habitat',
        'pokemon-shape',
        'pokemon-species',
        'stat',
        'type',
        'language'
    ];

    /**
     * @const string endpoint for berries
     */
    const ENDPOINT_BERRY = 'berry';

    /**
     * @const string endpoint for berry firmness
     */
    const ENDPOINT_BERRY_FIRMNESS = 'berry-firmness';

    /**
     * @const string endpoint for berry flavors
     */
    const ENDPOINT_BERRY_FLAVOR = 'berry-flavor';

    /**
     * @const string endpoint for contest types
     */
    const ENDPOINT_CONTEST_TYPE = 'contest-type';

    /**
     * @const string endpoint for contest effects
     */
    const ENDPOINT_CONTEST_EFFECT = 'contest-effect';

    /**
     * @const string endpoint for super contest effects
     */
    const ENDPOINT_SUPER_CONTEST_EFFECT = 'super-contest-effect';

    /**
     * @const string endpoint for encounter menthods
     */
    const ENDPOINT_ENCOUNTER_METHOD = 'encounter-method';

    /**
     * @const string endpoint for encounter conditions
     */
    const ENDPOINT_ENCOUNTER_CONDITION = 'encounter-condition';

    /**
     * @const string endpoint for encounter condition values
     */
    const ENDPOINT_ENCOUNTER_CONDITION_VALUE = 'encounter-condition-value';

    /**
     * @const string endpoint for evolution chains
     */
    const ENDPOINT_EVOLUTION_CHAIN = 'evolution-chain';

    /**
     * @const string endpoint for evolution triggers
     */
    const ENDPOINT_EVOLUTION_TRIGGER = 'evolution-trigger';

    /**
     * @const string endpoint for generations
     */
    const ENDPOINT_GENERATION = 'generation';

    /**
     * @const string endpoint for the pokedex
     */
    const ENDPOINT_POKEDEX = 'pokedex';

    /**
     * @const string endpoint for versions
     */
    const ENDPOINT_VERSION = 'version';

    /**
     * @const string endpoint for version groups
     */
    const ENDPOINT_VERSION_GROUP = 'version-group';

    /**
     * @const string endpoint for items
     */
    const ENDPOINT_ITEM = 'item';

    /**
     * @const string endpoint for item attributes
     */
    const ENDPOINT_ITEM_ATTRIBUTE = 'item-attribute';

    /**
     * @const string endpoint for item categories
     */
    const ENDPOINT_ITEM_CATEGORY = 'item-category';

    /**
     * @const string endpoint for item fling effects
     */
    const ENDPOINT_ITEM_FLING_EFFECT = 'item-fling-effect';

    /**
     * @const string endpoint for item pockets
     */
    const ENDPOINT_ITEM_POCKET = 'item-pocket';

    /**
     * @const string endpoint for machines
     */
    const ENDPOINT_MACHINE = 'machine';

    /**
     * @const string endpoint for moves
     */
    const ENDPOINT_MOVE = 'move';

    /**
     * @const string endpoint for move ailments
     */
    const ENDPOINT_MOVE_AILMENT = 'move-ailment';

    /**
     * @const string endpoint for move battle styles
     */
    const ENDPOINT_MOVE_BATTLE_STYLE = 'move-battle-style';

    /**
     * @const string endpoint for move categories
     */
    const ENDPOINT_MOVE_CATEGORY = 'move-category';

    /**
     * @const string endpoint for move damage classes
     */
    const ENDPOINT_MOVE_DAMAGE_CLASS = 'move-damage-class';

    /**
     * @const string endpoint for move learn methods
     */
    const ENDPOINT_MOVE_LEARN_METHOD = 'move-learn-method';

    /**
     * @const string endpoint for move targets
     */
    const ENDPOINT_MOVE_TARGET = 'move-target';

    /**
     * @const string endpoint for locations
     */
    const ENDPOINT_LOCATION = 'location';

    /**
     * @const string endpoint for location areas
     */
    const ENDPOINT_LOCATION_AREA = 'location-area';

    /**
     * @const string endpoint for pal park areas
     */
    const ENDPOINT_PAL_PARK_AREA = 'pal-park-area';

    /**
     * @const string endpoint for regions
     */
    const ENDPOINT_REGION = 'region';

    /**
     * @const string endpoint for abilities
     */
    const ENDPOINT_ABILITY = 'ability';

    /**
     * @const string endpoint for characteristics
     */
    const ENDPOINT_CHARACTERISTIC = 'characteristic';

    /**
     * @const string endpoint for egg groups
     */
    const ENDPOINT_EGG_GROUP = 'egg-group';

    /**
     * @const string endpoint for genders
     */
    const ENDPOINT_GENDER = 'gender';

    /**
     * @const string endpoint for growth rates
     */
    const ENDPOINT_GROWTH_RATE = 'growth-rate';

    /**
     * @const string endpoint for natures
     */
    const ENDPOINT_NATURE = 'nature';

    /**
     * @const string endpoint for pokeathlon stats
     */
    const ENDPOINT_POKEATHLON_STAT = 'pokeathlon-stat';

    /**
     * @const string endpoint for pokemon
     */
    const ENDPOINT_POKEMON = 'pokemon';

    /**
     * @const string endpoint for pokemon colors
     */
    const ENDPOINT_POKEMON_COLOR = 'pokemon-color';

    /**
     * @const string endpoint for pokemon forms
     */
    const ENDPOINT_POKEMON_FORM = 'pokemon-form';

    /**
     * @const string endpoint for pokemon habitats
     */
    const ENDPOINT_POKEMON_HABITAT = 'pokemon-habitat';

    /**
     * @const string endpoint for pokemon shapes
     */
    const ENDPOINT_POKEMON_SHAPE = 'pokemon-shape';

    /**
     * @const string endpoint for pokemon species
     */
    const ENDPOINT_POKEMON_SPECIES = 'pokemon-species';

    /**
     * @const string endpoint for stats
     */
    const ENDPOINT_STAT = 'stat';

    /**
     * @const string endpoint for types
     */
    const ENDPOINT_TYPE = 'type';

    /**
     * @const string endpoint for languages
     */
    const ENDPOINT_LANGUAGE = 'language';
}