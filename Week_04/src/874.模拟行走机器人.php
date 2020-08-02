<?php

class Solution {
    public $_y = 1;
    public $_x = 0;

    /**
     * @param Integer[] $commands
     * @param Integer[][] $obstacles
     * @return Integer
     */
    function robotSim($commands, $obstacles) {
        $obs_arr = [];
        foreach ($obstacles as $item) {
            $key = implode(',', $item);
            $obs_arr[$key] = $key;
        }
        $res_x = 0;
        $res_y = 0;

        $sum = 0;
        foreach ($commands as $command) {
            if ($command < 0) {
                $this->changeDirection($command);
                continue;
            }
            for ($i = 0; $i < $command; $i++){
                $res_x += $this->_x;
                $res_y += $this->_y;
                if (isset($obs_arr["{$res_x},{$res_y}"])){
                    $res_x -= $this->_x;
                    $res_y -= $this->_y;
                    break;
                }
            }
            $sum = max($sum, $res_x * $res_x + $res_y * $res_y);
        }
        return $sum;
    }

    public function changeDirection($command) {
        if ($command == -1) { //向右转 90 度
            if ($this->_x == 0) {
                $this->_x = $this->_y;
                $this->_y = 0;
            } else {
                $this->_y = -1 * $this->_x;
                $this->_x = 0;
            }
        }elseif ($command == -2) { //向左转 90 度
            if ($this->_x == 0) {
                $this->_x = -1 * $this->_y;
                $this->_y = 0;
            } else {
                $this->_y = $this->_x;
                $this->_x = 0;
            }
        }
    }
}
