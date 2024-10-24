# Intuition
When first encountering the Two Sum problem, a straightforward approach might involve nested loops. For each element in the array, we could iterate through the remaining elements, checking if their sum equals the target. However, this approach would result in a time complexity of O(n^2).

# Approach
To improve upon the brute-force approach, we can leverage a hash map (or dictionary in some languages). This allows us to efficiently check if a complement (target - current number) exists in the array.

Here's a breakdown of the algorithm:

Create an empty hash map: This map will store the numbers we've encountered and their corresponding indices.
Iterate over the array:
For each number, calculate the complement needed to reach the target.
Check if the complement exists in the hash map.
If it does, return the indices of the current number and the complement.
If it doesn't, add the current number and its index to the hash map.   


# Complexity
Time complexity: O(n)
We iterate through the array once, and each lookup in the hash map takes constant time on average.
Space complexity: O(n)
The hash map can store up to n elements in the worst case.

# Code
```php []
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
```
# Explanation

The ```$seen``` array acts as a hash map, storing numbers as keys and their indices as values.
We iterate through the nums array.
For each number, we calculate the complement needed to reach the target.
If the complement is found in the ```$seen``` array, we've found a pair that adds up to the target.
If the complement is not found, we add the current number and its index to the $seen array for future comparisons.
In conclusion, this approach effectively solves the Two Sum problem with optimal time and space complexity. By utilizing a hash map, we can efficiently check for complements and avoid unnecessary nested loops.
