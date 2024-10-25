<?php
class Solution {

    /**
     * @param String[] $folder
     * @return String[]
     */
    function removeSubfolders($folder) {
        sort($folder);
        $result = [];

    foreach ($folder as $f) {
        if (empty($result) || strpos($f, end($result) . '/') !== 0) {
            $result[] = $f;
        }
    }
    
    return $result;
    }
}