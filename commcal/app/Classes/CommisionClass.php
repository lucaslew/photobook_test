<?php

namespace App\Classes;
use Illuminate\Support\Facades\Log;


class CommisionClass {
    public $itemId, $itemName, $itemQuantity, $itemQuantityUOM, $itemSalesAmount, $itemCommisionGained, $noun;
    
    // Assigning the values
    public function __construct($itemId, $itemQuantity) {
        $this->itemId = $itemId;
        $this->itemQuantity = $itemQuantity;
        $this->itemName = '';
        $this->itemQuantityUOM = 0;
        $this->itemSalesAmount = 0;
        $this->itemCommisionGained = 0;
        $this->noun = '';
    }

    public function calculateComission() {
        switch ($this->itemId) {
            case "businesscard":

                $itemName = 'Business Card';
                $salesPrice = 10;
                $uom = 200;
                $commisionGained = 0;
                $noun = "box";

                $sales_amount = $this->itemQuantity * $salesPrice;
                $quantity_uom = $this->itemQuantity * $uom;

                if($this->itemQuantity < 10) {
                    $commisionGained = $sales_amount * 10 / 100;
                } else if ($this->itemQuantity >= 10 && $this->itemQuantity < 20) {
                    $commisionGained = $sales_amount * 12 / 100;
                } else if ($this->itemQuantity >= 20 && $this->itemQuantity < 50) {
                    $commisionGained = $sales_amount * 15 / 100;
                } else {
                    $commisionGained = $sales_amount * 20 / 100;
                }

                $this->setItemDetails($itemName, $quantity_uom, $sales_amount, $commisionGained, $noun);
                break;
            case "brochures":
                $itemName = 'Brochures';
                $salesPrice = 20;
                $uom = 1000;
                $commisionGained = 0;
                $noun = "box";

                $sales_amount = $this->itemQuantity * $salesPrice;
                $quantity_uom = $this->itemQuantity * $uom;

                if($this->itemQuantity < 10) {
                    $commisionGained = $sales_amount * 8 / 100;
                } else if ($this->itemQuantity >= 10 && $this->itemQuantity < 20) {
                    $commisionGained = $sales_amount * 10 / 100;
                } else if ($this->itemQuantity >= 20 && $this->itemQuantity < 50) {
                    $commisionGained = $sales_amount * 14 / 100;
                } else {
                    $commisionGained = $sales_amount * 18 / 100;
                }

                $this->setItemDetails($itemName, $quantity_uom, $sales_amount, $commisionGained, $noun);
                break;
            case "yearbook":
                $itemName = 'Year Book';
                $salesPrice = 100;
                $uom = 50;
                $commisionGained = 0;
                $noun = "box";

                $sales_amount = $this->itemQuantity * $salesPrice;
                $quantity_uom = $this->itemQuantity * $uom;

                if($this->itemQuantity < 10) {
                    $commisionGained = $sales_amount * 7 / 100;
                } else if ($this->itemQuantity >= 10 && $this->itemQuantity < 20) {
                    $commisionGained = $sales_amount * 9 / 100;
                } else if ($this->itemQuantity >= 20 && $this->itemQuantity < 30) {
                    $commisionGained = $sales_amount * 13 / 100;
                } else {
                    $commisionGained = $sales_amount * 15 / 100;
                }

                $this->setItemDetails($itemName, $quantity_uom, $sales_amount, $commisionGained, $noun);
                break;
            case "mug":
                $itemName = 'Mug';
                $salesPrice = 10;
                $uom = 1;
                $commisionGained = 0;
                $noun = "mug";

                $sales_amount = $this->itemQuantity * $salesPrice;
                $quantity_uom = $this->itemQuantity * $uom;

                $commisionGained = $sales_amount * 10 / 100;

                $this->setItemDetails($itemName, $quantity_uom, $sales_amount, $commisionGained, $noun);
                break;
            default:
                Log::info("No such product found.");
        }
        return $this;
    }

    private function setItemDetails($itemName, $quantity_uom, $sales_amount, $commisionGained, $noun) {
        $this->itemName = $itemName;
        $this->itemQuantityUOM = $quantity_uom;
        $this->itemSalesAmount = $sales_amount;
        $this->itemCommisionGained = $commisionGained;

        if ($this->itemQuantity == 1) {
            $this->noun = $noun;
        } else {
            $this->noun = $noun == "box" ? $noun . "es" : $noun . "s";
        }
    }
}
