<?php

class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p)
    {
        $sLen = strlen($s);
        $pLen = strlen($p);
        if (empty($p) || $pLen > $sLen) return [];
        $pHash = [];
        $sHash = [];
        $resArr = [];
        //先取得p中的字符统计，同时拿到第一个窗口中的字符统计。
        for ($i = 0; $i < $pLen; $i++) {
            if (!isset($pHash[$p[$i]])) {
                $pHash[$p[$i]] = 1;
            } else {
                $pHash[$p[$i]] += 1;
            }
            if (!isset($sHash[$s[$i]])) {
                $sHash[$s[$i]] = 1;
            } else {
                $sHash[$s[$i]] += 1;
            }
        }
        $start = 0;
        //如果统计结果匹配，那么将第一个窗口加入结果集
        if ($this->same($pHash, $sHash)) $resArr[] = $start;
        while ($start < $sLen - $pLen + 1) {//循环向后移动窗口，直到遇到最后一个窗口
            $sHash[$s[$start]]--;//把之前窗口开头的字母统计减掉
            if ($sHash[$s[$start]] == 0) unset($sHash[$s[$start]]);//如果减掉后个数为0，将该字母统计删除
            $start++;//向后移动窗口
            $eTmp = $s[$start + $pLen - 1];//获得新的窗口结束的位置
            if (!isset($sHash[$eTmp])) {//统计新窗口结束位置的字母的个数
                $sHash[$eTmp] = 1;
            } else {
                $sHash[$eTmp]++;
            }
            if ($this->same($pHash, $sHash)) $resArr[] = $start;//如果当前窗口中的统计结果匹配，那么将当前窗口起始位置加入结果集。
        }
        return $resArr;
    }

    function same($arr1, $arr2)
    {
        if (count($arr1) != count($arr2)) return false;

        foreach ($arr1 as $key => $v) {
            if (!isset($arr2[$key]) || $arr2[$key] != $v) return false;
        }

        return true;
    }
}
