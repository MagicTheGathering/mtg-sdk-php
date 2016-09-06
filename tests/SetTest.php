<?php

use mtgsdk\Set;
use VCR\VCR;

class SetTest extends PHPUnit\Framework\TestCase
{
    use RecordsRequests;

    public function test_find_returns_set()
    {
        VCR::insertCassette('ktk.yaml');

        $set = Set::find('ktk');

        $this->assertEquals('KTK', $set->code);
        $this->assertEquals('Khans of Tarkir', $set->name);
        $this->assertEquals('expansion', $set->type);
        $this->assertEquals('black', $set->border);
        $this->assertContains('common', $set->booster);
        $this->assertEquals('2014-09-26', $set->releaseDate);
        $this->assertEquals('ktk', $set->magicCardsInfoCode);
    }

    public function test_generate_booster_returns_cards()
    {
        VCR::insertCassette('booster.yaml');

        $cards = Set::generateBooster('ktk');

        $this->assertCount(15, $cards);
        $this->assertEquals('KTK', $cards[0]->set);
    }

    public function test_where_filters_on_name()
    {
        VCR::insertCassette('filtered_sets.yaml');

        $sets = Set::where(['name' => 'khans'])->all();

        $this->assertCount(1, $sets);
        $this->assertEquals('KTK', $sets[0]->code);
    }

    public function test_all_returns_all_sets()
    {
        VCR::insertCassette('all_sets.yaml');

        $sets = Set::all();

        $this->assertGreaterThan(190, count($sets));
    }
}
