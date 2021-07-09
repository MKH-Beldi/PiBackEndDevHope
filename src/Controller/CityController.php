<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/city")
 */
class CityController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService = $restServiceController;
    }

    /**
     * @Route("", name="city_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(CityRepository $cityRepository)
    {
        return $this->restService->getAllAction($cityRepository);
    }
}
