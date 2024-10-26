<?php
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