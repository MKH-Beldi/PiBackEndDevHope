<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\MedicalExam;
use App\Entity\Reference;
use App\Repository\MedicalExamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/medicalExam")
 */
class MedicalExamController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="medicalExam_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(MedicalExamRepository $MedicalExamRepository)
    {
        return $this->restService->getAllAction($MedicalExamRepository);
    }

    /**
     * @Route("/create", name="medicalexam_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "MedicalExam", [new Reference("Consultation", "consultation", false), new Reference('user', 'userLab', false)]);
    }

    /**
     * @Route("/update/{id}", name="medicalexam_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(MedicalExam $medicalExam, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $medicalExam, [new Reference("Consultation", "consultation", false), new Reference('user', 'userLab', false)]);
    }

    /**
     * @Route("/delete/{id}", name="medicalExam_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, MedicalExamRepository $medicalExamRepository)
    {
        return $this->restService->deleteAction($id, $medicalExamRepository);
    }

}
