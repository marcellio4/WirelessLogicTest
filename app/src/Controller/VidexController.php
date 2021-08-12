<?php

namespace App\Controller;

use App\Company;
use App\Scraper\ScraperPackage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VidexController extends AbstractController
{

    /**
     *  Display all products options
     * 
     * @Route("api/videx/products", name="products_options", methods={"GET"})
     */
    public function productOptions(Company $company): Response
    {
        $scraperPackage = new ScraperPackage("https://videx.comesconnected.com/");
        $company->setTitlePath(".header > h3")
            ->setDescriptionPath(".package-name")
            ->setPricePath(".package-price span")
            ->setDiscountPath(".package-price > p");

        $result = $scraperPackage->getScraperPackages($company, ".package");
        return new JsonResponse($result);
    }
}
