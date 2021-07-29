<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Repository\GouvernorateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/gouvernorate")
 */
class GouvernorateController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService = $restServiceController;
    }

    /**
     * @Route("", name="gouvernorate_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(GouvernorateRepository $gouvernorateRepository)
    {
        $groups = ['groups' => 'show_gouvernorate'];
        return $this->restService->getAllAction($gouvernorateRepository, $groups);    }
}
