<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\FileMedicalExam;
use App\Entity\Reference;
use App\Repository\FileMedicalExamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/fileMedicalExam")
 */
class FileMedicalExamController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService = $restServiceController;
    }

    /**
     * @Route("/", name="fileMedicalExam_getAll",methods={"GET"})
     * @return Response
     */
    public function getAllAction(FileMedicalExamRepository $filesMedicalExamRepository)
    {
        $groups = ['groups' => 'show_fileMedicalExam'];
        return $this->restService->getAllAction($filesMedicalExamRepository,$groups);
    }

    /**
     * @Route("/create", name="fileMedicalExam_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "FileMedicalExam", [new Reference("MedicalExam", "medicalExam", false)]);
    }

    /**
     * @Route("/update/{id}", name="fileMedicalExam_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(FileMedicalExam $fileMedicalExam, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $fileMedicalExam, [new Reference("MedicalExam", "medicalExam", false)]);
    }

    /**
     * @Route("/delete/{id}", name="fileMedicalExam_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, FileMedicalExamRepository $fileMedicalExamRepository)
    {
        return $this->restService->deleteAction($id, $fileMedicalExamRepository);
    }
}
