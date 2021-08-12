<?php

namespace App\Scraper;

use App\Company;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Contain Information about web subscription packages such as Price, Description, Title, Discount
 * 
 * @param String $html link to website for scraper information
 * @author Marcel Zacharias
 */
class ScraperPackage implements IScraper
{
    /**
     * Web crawler instance
     */
    private Crawler $crawler;

    function __construct(String $html)
    {
        $this->crawler = new Crawler(file_get_contents($html));
    }

    /**
     * @return Crawler instance of Crawler
     */
    public function getCrawler()
    {
        return $this->crawler;
    }

    /**
     * @param String $path path to node
     * @return Crawler
     */
    public function getContentNodes(string $path)
    {
        return $this->crawler->filter($path);
    }

    /**
     * @param String $path path to node
     * @param Crawler $node for filter to get text
     * @return String price
     */
    public function getPrice(String $path, Crawler $node): string
    {
        return $node->filter($path)->text();
    }

    /**
     * @param String $path path to node
     * @param Crawler $node for filter to get text
     * @return String title
     */
    public function getTitle(String $path, Crawler $node): string
    {
        return $node->filter($path)->text();
    }

    /**
     * @param String $path path to node
     * @param Crawler $node for filter to get text
     * @return String Description
     */
    public function getDescription(String $path, Crawler $node): string
    {
        return $node->filter($path)->text();
    }

    /**
     * @param String $path path to node
     * @param Crawler $node for filter to get text
     * @return String Discount or empty string
     */
    public function getDiscount(String $path, Crawler $node): string
    {
        return $node->filter($path)->text('');
    }

    /**
     * Generate package information of all packages nodes with Title, Description, Price, Discount and sort in DESC order on prices
     * 
     * @param Company $company instance of web company
     * @param String $path path to node
     * @return Array 
     */
    public function getScraperPackages(Company $company, String $path): array
    {

        $result = $this->getContentNodes($path)->each(function ($node) use ($company) {
            $data["Title"] = $this->getTitle($company->getTitlePath(), $node);
            $data["Description"] = $this->getDescription($company->getDescriptionPath(), $node);
            $data["Price"] = $this->getPrice($company->getPricePath(), $node);
            $data["Discount"] = $this->getDiscount($company->getDiscountPath(), $node);
            return $data;
        });

        usort($result, function ($price1, $price2) {
            return ((float) str_replace("£", "", $price2['Price'])) <=> ((float) str_replace("£", "", $price1['Price']));
        });

        return $result;
    }
}
