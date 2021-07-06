<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Reference;
use App\Repository\ConsultationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/consultation")
 */
class ConsultationController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="consultation_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(ConsultationRepository $consultationRepository)
    {
        return $this->restService->getAllAction($consultationRepository);
    }

    /**
     * @Route("/create", name="consultation_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Consultation", [new Reference("Symptom", "symptoms", true)]);
    }

        /**
     * @Route("/update/{id}", name="consultation_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Consultation $consultation, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $consultation, [new Reference("Symptom", "symptoms", true)]);
    }

    /**
     * @Route("/delete/{id}", name="consultation_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, ConsultationRepository $consultationRepository)
    {
        return $this->restService->deleteAction($id, $consultationRepository);
    }
}
