<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Symptom;
use App\Repository\SymptomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/symptom")
 */
class SymptomController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="symptom_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(SymptomRepository $symptomRepository)
    {
        return $this->restService->getAllAction($symptomRepository);
    }

    /**
     * @Route("/create", name="symptom_create", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createAction($request, "Symptom");
    }

    /**
     * @Route("/update/{id}", name="symptom_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Symptom $symptom, Request $request)
    {
        return $this->restService->updateAction($symptom, $request);
    }

    /**
     * @Route("/delete/{id}", name="symptom_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, SymptomRepository $symptomRepository)
    {
        return $this->restService->deleteAction($id, $symptomRepository);
    }

}
