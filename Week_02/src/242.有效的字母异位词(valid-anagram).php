<?php

class Solution {

    /**
    * @param String $s
    * @param String $t
    * @return Boolean
    */
    function isAnagram($s, $t) {
        // php 内置函数实现 
        // return count_chars($s, 1) == count_chars($t, 1);

        $length = strlen($s);

        $length = strlen($s);

        if ($length != strlen($t)) {
            return false;
        }

        $hash = [];

        for ($i = 0; $i < $length; $i++) {
            $hash[$s[$i]] = ($hash[$s[$i]] ?? 0) + 1;
        }

        for ($i = 0; $i < $length; $i++) {
            if (isset($hash[$t[$i]]) && --$hash[$t[$i]] == 0) {
                unset($hash[$t[$i]]);
            }
        }
        return $hash == [];
    }
}
