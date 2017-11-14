# Magic: The Gathering SDK

[![Latest Stable Version](https://poser.pugx.org/mtgsdk/mtgsdk/v/stable)](https://packagist.org/packages/mtgsdk/mtgsdk)
[![License](https://poser.pugx.org/mtgsdk/mtgsdk/license)](https://packagist.org/packages/mtgsdk/mtgsdk)
[![composer.lock](https://poser.pugx.org/mtgsdk/mtgsdk/composerlock)](https://packagist.org/packages/mtgsdk/mtgsdk)
[![Build Status](https://travis-ci.org/MagicTheGathering/mtg-sdk-php.svg?branch=master)](https://travis-ci.org/MagicTheGathering/mtg-sdk-php)
[![Code Climate](https://codeclimate.com/github/MagicTheGathering/mtg-sdk-php/badges/gpa.svg)](https://codeclimate.com/github/MagicTheGathering/mtg-sdk-php)
[![Coverage Status](https://coveralls.io/repos/github/MagicTheGathering/mtg-sdk-php/badge.svg?branch=master)](https://coveralls.io/github/MagicTheGathering/mtg-sdk-php?branch=master)

This is the Magic: The Gathering SDK PHP implementation. It is a wrapper around the MTG API of [magicthegathering.io](http://magicthegathering.io/).

## Requirements
This library does not have any requirements.

## Installation

Using composer:

    composer require mtgsdk/mtgsdk:dev-master

## Usage

### Properties Per Class

All class properties are camel-cased and documented through class DocBlocks.
They respect the API's syntax.

NOTE: **All properties are READ-ONLY. You cannot modify them.**

#### Card

    name
    multiverseid
    layout
    names
    manaCost
    cmc
    colors
    type
    supertypes
    subtypes
    rarity
    text
    flavor
    artist
    number
    power
    toughness
    loyalty
    variations
    watermark
    border
    timeshifted
    hand
    life
    reserved
    releaseDate
    starter
    rulings
    foreignNames
    printings
    originalText
    originalType
    legalities
    source
    imageUrl
    set
    setName
    id

#### Set

    code
    name
    gathererCode
    oldCode
    magicCardsInfoCode
    releaseDate
    border
    type
    block
    onlineOnly
    booster
    mkmId
    mkmName

#### Changelog

    version
    releaseDate
    details
    
### Find Card by Multiverse Id

    $card = Card::find(386616);
    
### Filter Cards via Query Parameters

    $cards = Card::where(['set' => 'ktk'])->where(['subtypes' => ['warrior', 'human']])->all();
    
### Get all cards (will page through all the data - could take awhile)

    $cards = Card::all();
    
### Get all cards, but only a specific page of data

    $cards = Card::where(['page' => 5, 'pageSize' => 30])->all();
    
### Nesting conditions is also allowed

    $cards = Card::where(['page' => 5])->where(['pageSize' => 30])->all();
    
### Find a Set by code

    $set = Set::find('ktk');
    
### Get all sets

    $sets = Set::all();
    
### Filter sets via query parameters

    $sets = Set::where(['name' => 'khans'])->all();
    
### Get all types

    $types = Type::all();
    
### Get all subtypes

    $subtypes = Subtype::all();
    
### Get all supertypes

    $supertypes = Supertype::all();
    
### Get all changelogs

    $changelogs = Changelog::all();
    
## Contributing

1. Fork it ( https://github.com/[my-github-username]/mtg-sdk-php/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request
