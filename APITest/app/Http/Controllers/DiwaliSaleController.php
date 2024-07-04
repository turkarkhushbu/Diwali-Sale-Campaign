<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiwaliSaleController extends Controller
{
    private $discountedProducts = [];
    private $payableProducts = [];
 

    public function getProductItemsRuleOne(Request $request) {
        
        //Fetch product ids.
       $apiContent = json_decode($request->getContent());
       $productIds = $apiContent->product_ids;
       
        if(empty($productIds)) {
            return response()->json([
                'message' => 'Please provide input array of products'
                
            ], 422);
        }
       // Divide into discounted and items arrays based on rule one criteria.
        for($i=0;$i<count($productIds); $i++) {
         // Compare the current element with the next one
            if (isset($productIds[$i + 1])) {
                if ($productIds[$i] < $productIds[$i + 1]) {
                // Add the greater item to payable items array
                    if(!in_array($productIds[$i], $this->payableProducts)) {
                        array_push($this->payableProducts, $productIds[$i + 1]);
                        array_push($this->discountedProducts, $productIds[$i]);
                    }
                } 
                else {
                    array_push($this->payableProducts, $productIds[$i]);
                    array_push($this->discountedProducts, $productIds[$i+1]);
                       
                }
        
            } else {
                break;
            }
        }

        return response()->json([
                "Discounted Items" => $this->discountedProducts,
                "Payable Items" => $this->payableProducts ],
            200);
    
    }

    public function getProductItemsRuleTwo(Request $request) {
        
        //Fetch product ids.
        $apiContent = json_decode($request->getContent());
        $productIds = $apiContent->product_ids;
        
        if(empty($productIds)) {
            return response()->json([
                'message' => 'Please provide input array of products'
                
            ], 422);
        }
        // Divide into discounted and items arrays based on rule one criteria.
        for($i=0;$i<count($productIds); $i++) {
        // Compare the current element with the next one
            if (isset($productIds[$i + 1])) {
                if ($productIds[$i] < $productIds[$i + 1]) {
                // Add the greater item to payable items array
                    if(!in_array($productIds[$i], $this->payableProducts)) {
                        array_push($this->payableProducts, $productIds[$i + 1]);
                        array_push($this->discountedProducts, $productIds[$i]);
                    }
                } 
                else {
                    array_push($this->payableProducts, $productIds[$i]);
                    array_push($this->discountedProducts, $productIds[$i+1]);
                        
                }
        
            } else {
                break;
            }
        }

        return response()->json([
                "Discounted Items" => $this->discountedProducts,
                "Payable Items" => $this->payableProducts ],
            200);
    }

    public function getProductItemsRuleThree(Request $request) {
        
        //Fetch product ids.
        $apiContent = json_decode($request->getContent());
        $items = $apiContent->product_ids;
        
        if(empty($items)) {
            return response()->json([
                'message' => 'Please provide input array of products'
                
            ], 422);
        }
          // Sort the items in descending order of price
        rsort($items);
        
        $discountedItems = [];
        $payableItems = [];
        
        for ($i = 0; $i < count($items); $i++) {
            if (count($discountedItems) == 4) {
                // If we already have four discounted items, add the remaining items to payable list
                array_push($payableItems, $items[$i]);
            } else if ($i + 1 < count($items) && $items[$i] > $items[$i + 1]) {
                // If there is at least one more item and it qualifies for discount, add it to discounted list
                array_push($discountedItems, $items[$i]);
                
                // Skip the next item as it has been discounted
                $i++;
            } else {
                // Add current item to payable list since it doesn't qualify for discount
                array_push($payableItems, $items[$i]);
            }
        }
       
        return response()->json([
            "Discounted Items" => $discountedItems,
            "Payable Items" => $payableItems ],
        200);

    }
}
