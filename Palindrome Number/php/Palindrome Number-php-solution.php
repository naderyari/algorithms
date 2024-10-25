<?php
class Solution {

/**
 * @param Integer $x
 * @return Boolean
 */
function isPalindrome($x) {
    if (strval($x)== strrev($x)){
        return true;
    }else{
        return false;
    }
}
}