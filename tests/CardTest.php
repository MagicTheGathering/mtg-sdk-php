<?php

use mtgsdk\Card;
use PHPUnit\Framework\TestCase;
use VCR\VCR;

class CardTest extends TestCase
{
    use RecordsRequests;

    public function test_find_returns_card()
    {
        VCR::insertCassette('choice_of_damnations.yaml');

        $card = Card::find(88803);

        $this->assertEquals('Choice of Damnations', $card->name);
        $this->assertEquals('{5}{B}', $card->manaCost);
        $this->assertEquals(6, $card->cmc);
        $this->assertEquals('Sorcery — Arcane', $card->type);
        $this->assertContains('Black', $card->colors);
        $this->assertContains('Sorcery', $card->types);
        $this->assertContains('Arcane', $card->subtypes);
        $this->assertEquals('Rare', $card->rarity);
        $this->assertEquals('SOK', $card->set);
        $this->assertEquals('Saviors of Kamigawa', $card->setName);
        $this->assertEquals(
            "Target opponent chooses a number. You may have that player lose that much life. If you don't, that player sacrifices all but that many permanents.",
            $card->text
        );
        $this->assertEquals("\"Life is a series of choices between bad and worse.\"\n—Toshiro Umezawa", $card->flavor);
        $this->assertEquals('Tim Hildebrandt', $card->artist);
        $this->assertEquals('62', $card->number);
        $this->assertEquals(88803, $card->multiverseid);
        $this->assertEquals(
            'http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=88803&type=card',
            $card->imageUrl
        );
        $this->assertNotEmpty($card->rulings);
        $this->assertContains(
            [
                "name"         => "Scelta della Dannazione",
                "language"     => "Italian",
                "multiverseid" => 105393,
                "imageUrl"     => "http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=105393&type=card",
            ],
            $card->foreignNames
        );
        $this->assertContains('SOK', $card->printings);
        $this->assertEquals(
            "Target opponent chooses a number. You may have that player lose that much life. If you don't, that player sacrifices all but that many permanents.",
            $card->originalText
        );
        $this->assertEquals('Sorcery — Arcane', $card->originalType);
        $this->assertContains(["format" => "Commander", "legality" => "Legal"], $card->legalities);
        $this->assertEquals('1c4aab072d52d283e902f2302afa255b39e0794b', $card->id);
    }

    public function test_all_with_params_return_cards()
    {
        VCR::insertCassette('legendary_elf_warriors.yaml');

        $cards = Card::where(['supertypes' => 'legendary'])->where(['subtypes' => 'elf,warrior'])->all();
        $this->assertCount(21, $cards);
    }

    public function test_all_with_page_returns_cards()
    {
        VCR::insertCassette('all_first_page.yaml');
        $cards = Card::where(['page' => 1])->all();

        $this->assertCount(100, $cards);
    }

    public function test_all_with_page_and_page_size_returns_card()
    {
        VCR::insertCassette('all_first_page_one_card.yaml');
        $cards = Card::where(['page' => 1])->where(['pageSize' => 1])->all();

        $this->assertCount(1, $cards);
    }
}
