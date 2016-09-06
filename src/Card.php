<?php

namespace mtgsdk;

/**
 * @property-read $name
 * @property-read $layout
 * @property-read $manaCost
 * @property-read $cmc
 * @property-read $colors
 * @property-read $names
 * @property-read $type
 * @property-read $supertypes
 * @property-read $subtypes
 * @property-read $types
 * @property-read $rarity
 * @property-read $text
 * @property-read $flavor
 * @property-read $artist
 * @property-read $number
 * @property-read $power
 * @property-read $toughness
 * @property-read $loyalty
 * @property-read $multiverseid
 * @property-read $variations
 * @property-read $watermark
 * @property-read $border
 * @property-read $timeshifted
 * @property-read $hand
 * @property-read $life
 * @property-read $releaseDate
 * @property-read $starter
 * @property-read $printings
 * @property-read $originalText
 * @property-read $originalType
 * @property-read $source
 * @property-read $imageUrl
 * @property-read $set
 * @property-read $setName
 * @property-read $id
 * @property-read $legalities
 * @property-read $rulings
 * @property-read $foreignNames
 */
class Card
{
    use DataBag, QueriesAll, QueriesWithConditions, QueriesOne;

    const RESOURCE = 'cards';
}
