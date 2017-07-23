<?php
/**
 * Interface for sorting algorithms.
 */

namespace Interfaces;

/**
 * Sort algorithms should implement this interface.
 */
interface SortInterface {
    /**
     * Sort method should implement.
     * @param array $items
     */
    public static function sort($items);
}