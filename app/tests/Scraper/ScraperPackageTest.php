<?php

namespace App\Tests\Scraper;

use App\Company;
use App\Scraper\ScraperPackage;
use PHPUnit\Framework\TestCase;

class ScraperPackageTest extends TestCase
{

    private ScraperPackage $scraperPackage;

    public function setUp(): void
    {
        parent::setUp();
        $this->scraperPackage = new ScraperPackage("https://videx.comesconnected.com/");
    }

    public function testGetContentNodes()
    {
        $expected = "hello";

        $package = $this->getMockBuilder(ScraperPackage::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getContentNodes'])
            ->getMock();
        $package->method('getContentNodes')
            ->willReturn("hello");

        $this->assertEquals($expected, $package->getContentNodes('.package'));
    }

    public function testGetPrice()
    {
        $this->assertEquals(
            "£6.00",
            $this->scraperPackage->getPrice(
                ".package-price span",
                $this->scraperPackage->getCrawler()
            )
        );
    }

    public function testGetDescription()
    {

        $expected = "Up to 40 minutes talk time per monthincluding 20 SMS(5p / minute and 4p / SMS thereafter)";
        $this->assertEquals(
            $expected,
            $this->scraperPackage->getDescription(
                ".package-name",
                $this->scraperPackage->getCrawler()
            )
        );
    }

    public function testGetTitle()
    {
        $expected = "Option 40 Mins";
        $this->assertEquals(
            $expected,
            $this->scraperPackage->getTitle(
                ".header > h3",
                $this->scraperPackage->getCrawler()
            )
        );
    }

    public function testGetDiscount()
    {
        $expected = "Save £5 on the monthly price";
        $this->assertEquals(
            $expected,
            $this->scraperPackage->getDiscount(
                ".package-price > p",
                $this->scraperPackage->getCrawler()
            )
        );
    }

    public function testScraperPackage()
    {
        $expected =
            [
                "Title" => "Option 3600 Mins",
                "Description" => "Up to 3600 minutes talk time per year including 480 SMS(5p / minute and 4p / SMS thereafter)",
                "Price" => "£174.00",
                "Discount" => "Save £18 on the monthly price"
            ];

        $company = new Company();
        $company->setTitlePath(".header > h3");
        $company->setDescriptionPath(".package-name");
        $company->setPricePath(".package-price span");
        $company->setDiscountPath(".package-price > p");

        $this->assertEquals($expected, $this->scraperPackage->getScraperPackages($company, ".package")[0]);
    }
}
