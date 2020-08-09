<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n == 1) {
            return 1;
        }
        if ($n == 2) {
            return 2;
        }
        $first = 1;
        $second = 2;
        for ($i = 3; $i<= $n; $i++) {
            $res = $first + $second;
            $first = $second;
            $second = $res;
        }
        return $res;
    }
}