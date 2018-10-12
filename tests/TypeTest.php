<?php

use mtgsdk\Type;
use VCR\VCR;

class TypeTest extends PHPUnit\Framework\TestCase
{
    use RecordsRequests;

    public function test_all_returns_types()
    {
        VCR::insertCassette('types.yaml');

        $types = Type::all();

        $this->assertEquals([
            "Artifact",
            "Conspiracy",
            "Creature",
            "Enchantment",
	    "Host",
	    "Instant",
            "Land",
            "Phenomenon",
            "Plane",
            "Planeswalker",
            "Scheme",
            "Sorcery",
            "Tribal",
            "Vanguard",
        ], $types);
    }
}
