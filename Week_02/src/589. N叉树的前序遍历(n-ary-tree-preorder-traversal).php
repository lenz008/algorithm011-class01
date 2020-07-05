<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        $s = new SplStack();
        $s->push($root);

        $result = [];
        while(!$s->isEmpty()) {
            $data = $s->pop();
            $result[] = $data->val;
            for($i = count($data->children) - 1; $i >= 0; --$i) {
                $s->push($data->children[$i]);
            }
        }
        
        return $result;
    }

}