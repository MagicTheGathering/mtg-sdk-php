<?php

namespace mtgsdk;

/**
 * @property-red $code
 * @property-red $name
 * @property-red $type
 * @property-red $border
 * @property-red $mkm_id
 * @property-red $mkm_name
 * @property-red $releaseDate
 * @property-red $gathererCode
 * @property-red $magicCardsInfoCode
 * @property-red $booster
 * @property-red $oldCode
 * @property-red $block
 * @property-red $onlineOnly
 * @method static Set|null find(string $id)
 */
class Set
{
    use DataBag, QueriesAll, QueriesWithConditions, QueriesOne;

    const RESOURCE = 'sets';

    /**
     * @param string $code
     *
     * @return Card[]
     */
    public static function generateBooster($code)
    {
        $url = sprintf("%s/%s/%s/booster", QueryBuilder::ENDPOINT, self::RESOURCE, $code);

        return (new QueryBuilder(self::class))->findMany($url, Card::class, Card::RESOURCE);
    }
}
