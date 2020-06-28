<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $count = count($nums);
        $zero_count = 0;
        for ($i = 0,$j = 1; $i < $count; $i++) {
            if($nums[$i] == 0){
                $nums[$count - 1 + $j] = $nums[$i];
                unset($nums[$i]);
                $j++;
            }
        }
        return $nums;
    }
}