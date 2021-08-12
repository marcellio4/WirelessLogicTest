<?php

namespace App\Scraper;

/**
 * Sraper web package content from website
 * @author Marcel Zacharias
 */
interface IScraper
{
    /**
     * Generate all nodes for products on website
     * 
     * @param String $path path of node products
     * @return Crawler nodes of specific content 
     */
    public function getContentNodes(string $path);
}