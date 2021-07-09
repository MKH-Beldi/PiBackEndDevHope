<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\SpecialtyDr;
use App\Repository\SpecialtyDrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/specialtyDr")
 */
class SpecialtyDrController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService = $restServiceController;
    }

    /**
     * @Route("", name="specialtyDr_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(SpecialtyDrRepository $specialtyDrRepository)
    {
        return $this->restService->getAllAction($specialtyDrRepository);
    }

    /**
     * @Route("/create", name="specialtyDr_create", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createAction($request, "SpecialtyDr");
    }

    /**
     * @Route("/update/{id}", name="specialtyDr_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(SpecialtyDr $specialtyDr, Request $request)
    {
        return $this->restService->updateAction($specialtyDr, $request);
    }

    /**
     * @Route("/delete/{id}", name="specialtyDr_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, SpecialtyDrRepository $specialtyDrRepository)
    {
        return $this->restService->deleteAction($id, $specialtyDrRepository);
    }
}
