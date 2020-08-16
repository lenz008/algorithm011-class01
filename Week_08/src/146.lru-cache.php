<?php

class LRUCache {
    private $capacity = null;
    private $map = [];
    private $list = [];

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (($pos = array_search($key,$this->list)) !== false) {
            unset($this->list[$pos]);
            array_unshift($this->list, $key);
            return $this->map[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (($pos = array_search($key, $this->list)) !== false) {
            unset($this->list[$pos]);
            array_unshift($this->list, $key);
        } else {
            if ($this->capacity == count($this->list)) {
                $del_key = array_pop($this->list);
                unset($this->map[$del_key]);
            }
            array_unshift($this->list ,$key);
        }

        $this->map[$key] = $value;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */