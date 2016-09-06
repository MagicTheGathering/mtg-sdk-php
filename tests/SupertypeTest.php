<?php

use mtgsdk\Supertype;
use VCR\VCR;

class SupertypeTest extends PHPUnit\Framework\TestCase
{
    use RecordsRequests;

    public function test_all_returns_subtypes()
    {
        VCR::insertCassette('supertypes.yaml');
        $supertypes = Supertype::all();

        $this->assertEquals(["Basic", "Legendary", "Ongoing", "Snow", "World"], $supertypes);
    }
}
