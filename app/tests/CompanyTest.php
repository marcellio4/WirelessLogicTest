<?php

namespace App\Tests;

use App\Company;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    private Company $company;

    public function setUp(): void
    {
        parent::setUp();
        $this->company = new Company();
    }

    public function testSetAndGetTitlePath()
    {
        $expected = "path";
        $this->assertEquals(
            $expected,
            $this->company
                ->setTitlePath("path")
                ->getTitlePath()
        );
    }

    public function testSetAndGetDescriptionPath()
    {
        $expected = "path";
        $this->assertEquals(
            $expected,
            $this->company
                ->setDescriptionPath("path")
                ->getDescriptionPath()
        );
    }

    public function testSetAndGetPricePath()
    {
        $expected = "path";
        $this->assertEquals(
            $expected,
            $this->company
                ->setPricePath("path")
                ->getPricePath()
        );
    }

    public function testSetAndGetDiscountPath()
    {
        $expected = "path";
        $this->assertEquals(
            $expected,
            $this->company
                ->setDiscountPath("path")
                ->getDiscountPath()
        );
    }
}
