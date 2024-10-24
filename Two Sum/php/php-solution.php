<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $seen = [];
    for ($i = 0; $i < count($nums); $i++) {
        $complement = $target - $nums[$i];
        if (isset($seen[$complement])) {
            return [$seen[$complement], $i];
        }
        $seen[$nums[$i]] = $i;
    }
    return null;
    
    }
}
?>
