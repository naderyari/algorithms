## **Efficiently Calculating Tree Heights After Subtree Removal**

### **Intuition**
The problem involves calculating the height of a binary tree after removing subtrees rooted at specific nodes. To efficiently handle multiple queries, we can preprocess the tree to store information about node depths and levels. By leveraging this information, we can quickly determine the new height of the tree after each removal.

### **Approach**
1. **Preprocess the Tree:**
   - Perform a depth-first search (DFS) to calculate the depth and level of each node.
   - Store this information in a `nodeToDepthAndLevel` map.
   - Maintain a `levelToMaxDepths` map to store the two largest depths for each level.

2. **Process Queries:**
   - For each query:
     - Retrieve the depth and level of the node to be removed.
     - Consult the `levelToMaxDepths` map to find the two largest depths remaining at that level.
     - Calculate the new height of the tree based on the remaining maximum depths.

### **Complexity**
- **Time complexity:** O(N + Q), where N is the number of nodes in the tree and Q is the number of queries. The preprocessing DFS takes O(N) time, and each query can be processed in O(1) time.
- **Space complexity:** O(N), primarily due to the `nodeToDepthAndLevel` and `levelToMaxDepths` maps.

### **Code**
```php
class Solution {
    private $nodeToDepthAndLevel = [];
    private $levelToMaxDepths = [];

    public function treeQueries($root, $queries) {
        $this->traverse($root, 0);

        $result = [];
        foreach ($queries as $query) {
            [$depth, $level] = $this->nodeToDepthAndLevel[$query] ?? [0, 0];
            $maxDepths = $this->levelToMaxDepths[$level] ?? [0, 0];

            $result[] = $level - 1 + max($maxDepths[0], $maxDepths[1] < $depth ? $maxDepths[1] : 0);
        }

        return $result;
    }

    private function traverse($node, $level) {
        if (!$node) {
            return 0;
        }

        $depth = max($this->traverse($node->left, $level + 1), $this->traverse($node->right, $level + 1)) + 1;
        $this->nodeToDepthAndLevel[$node->val] = [$depth, $level];

        $maxDepths = $this->levelToMaxDepths[$level] ?? [0, 0];
        if ($depth > $maxDepths[1]) {
            $maxDepths[0] = $maxDepths[1];
            $maxDepths[1] = $depth;
        } elseif ($depth > $maxDepths[0]) {
            $maxDepths[0] = $depth;
        }
        $this->levelToMaxDepths[$level] = $maxDepths;

        return $depth;
    }
}
```
