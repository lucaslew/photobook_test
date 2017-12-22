<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use App\Classes\CommisionClass;

class CommisionTest extends TestCase
{
    public function testBusinessCardCommisionOneItem()
    {
        $commision = new CommisionClass("businesscard", 1);
        $returnComission = $commision->calculateComission();

        $this->assertTrue($returnComission->itemName == "Business Card");
        $this->assertTrue($returnComission->itemQuantityUOM == "200");
        $this->assertTrue($returnComission->itemSalesAmount == "10");
        $this->assertTrue($returnComission->itemCommisionGained == "1");
    }

    public function testBusinessCardCommisionTwentyItems()
    {
        $commision = new CommisionClass("businesscard", 20);
        $returnComission = $commision->calculateComission();

        $this->assertTrue($returnComission->itemName == "Business Card");
        $this->assertTrue($returnComission->itemQuantityUOM == "4000");
        $this->assertTrue($returnComission->itemSalesAmount == "200");
        $this->assertTrue($returnComission->itemCommisionGained == "30");
    }

    public function testBrochuresCommisionElevenItem()
    {
        $commision = new CommisionClass("brochures", 11);
        $returnComission = $commision->calculateComission();

        $this->assertTrue($returnComission->itemName == "Brochures");
        $this->assertTrue($returnComission->itemQuantityUOM == "11000");
        $this->assertTrue($returnComission->itemSalesAmount == "220");
        $this->assertTrue($returnComission->itemCommisionGained == "22");
    }

    public function testBrochuresCommisionFiftyItems()
    {
        $commision = new CommisionClass("brochures", 50);
        $returnComission = $commision->calculateComission();

        $this->assertTrue($returnComission->itemName == "Brochures");
        $this->assertTrue($returnComission->itemQuantityUOM == "50000");
        $this->assertTrue($returnComission->itemSalesAmount == "1000");
        $this->assertTrue($returnComission->itemCommisionGained == "180");
    }

    public function testMugCommisionFiftyItems()
    {
        $commision = new CommisionClass("mug", 30);
        $returnComission = $commision->calculateComission();

        $this->assertTrue($returnComission->itemName == "Mug");
        $this->assertTrue($returnComission->itemQuantityUOM == "30");
        $this->assertTrue($returnComission->itemSalesAmount == "300");
        $this->assertTrue($returnComission->itemCommisionGained == "30");
    }

    public function testNounOfYearBookOneItem()
    {
        $commision = new CommisionClass("yearbook", 1);
        $returnComission = $commision->calculateComission();
        $this->assertTrue($returnComission->noun == "box");
    }

    public function testNounOfYearBookThreeItem()
    {
        $commision = new CommisionClass("yearbook", 3);
        $returnComission = $commision->calculateComission();
        $this->assertTrue($returnComission->noun == "boxes");
    }
}
