<?php

class Trie {
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = new TrieNode();
        $this->size = 0;
    }

    public function size()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($str) {
        if (strlen($str) == 0)
            return;

        $cur = $this->root;

        for ($i = 0; $i < strlen($str); $i++) {
            $c = substr($str, $i, 1);
            if (!isset($cur->next[$c])) {
                $cur->next[$c] = new TrieNode();
            }
            $cur = $cur->next[$c];
        }

        if (!$cur->isWord) {
            $cur->isWord = true;
            $this->size++;
        }
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($str) {
        $cur = $this->root;
        for ($i = 0; $i < strlen($str); $i++) {
            $c = substr($str, $i, 1);
            if (!isset($cur->next[$c])) {
                return false;
            }
            $cur = $cur->next[$c];
        }

        return $cur->isWord;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $cur = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $c = substr($prefix, $i, 1);
            if (!isset($cur->next[$c])) {
                return false;
            }
            $cur = $cur->next[$c];
        }

        return true;
    }
}

class TrieNode
{
    public $isWord;
    public $next;

    public function __construct($isWord = false)
    {
        $this->isWord = $isWord;
        $this->next = null;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
