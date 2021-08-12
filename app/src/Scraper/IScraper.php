<?php

namespace App\Scraper;

/**
 * Sraper web package content from website
 * @author Marcel Zacharias
 */
interface IScraper
{
    /**
     * @param String $path path of node
     * @return text of specific content
     */
    public function getContentNodes(string $path);
}