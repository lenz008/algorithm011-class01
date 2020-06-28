<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $count = count($nums);
        $temp = [];
        
        for ($i = 0; $i < $count; $i++) {
            $diff = $target - $nums[$i];
            if(isset($temp[$diff])) {
                return [$temp[$diff], $i];
            }
            $temp[$nums[$i]] = $i;
        }

        return false;
    }
}