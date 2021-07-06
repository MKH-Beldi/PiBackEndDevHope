<?php

namespace App\Controller;

use App\Entity\Ordinance;
use App\Entity\Reference;
use App\Repository\OrdinanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/ordinance")
 */
class OrdinanceController extends AbstractController
{

    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="ordinance_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(OrdinanceRepository $ordinanceRepository)
    {
        return $this->restService->getAllAction($ordinanceRepository);
    }

    /**
     * @Route("/create", name="ordinance_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Ordinance", [new Reference('Consultation', 'consultation', false)]);
    }

    /**
     * @Route("/update/{id}", name="ordinance_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Ordinance $ordinance, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $ordinance, [new Reference('Consultation', 'consultation', false)]);
    }

    /**
     * @Route("/delete/{id}", name="ordinance_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, OrdinanceRepository $ordinanceRepository)
    {
        return $this->restService->deleteAction($id, $ordinanceRepository);
    }

}
