<?php

use mtgsdk\Changelog;
use PHPUnit\Framework\TestCase;
use VCR\VCR;

class ChangelogTest extends TestCase
{
    use RecordsRequests;

    public function test_all_returns_changelogs()
    {
        VCR::insertCassette('changelogs.yaml');

        $changelogs = Changelog::all();
        $this->assertNotEmpty($changelogs);
    }
}
