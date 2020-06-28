<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $digits = array_reverse($digits);
        $count = count($digits);
        for ($i = 0; $i < $count; $i++) {
            $digits[$i] = $digits[$i] + 1;
            if($digits[$i] >= 10) {
                $digits[$i] -= 10;
                $digits[$i+1] = isset($digits[$i+1]) ? $digits[$i+1] : 1;
                continue;
            } else {
                break;
            }
        }
        return array_reverse($digits);
    }
}