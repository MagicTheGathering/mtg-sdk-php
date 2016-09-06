<?php

use mtgsdk\Subtype;
use VCR\VCR;

class SubtypeTest extends PHPUnit\Framework\TestCase
{
    use RecordsRequests;

    public function test_all_returns_subtypes()
    {
        VCR::insertCassette('subtypes.yaml');
        $subtypes = Subtype::all();

        $this->assertTrue(count($subtypes) > 20);
        $this->assertContains('Warrior', $subtypes);
    }
}
