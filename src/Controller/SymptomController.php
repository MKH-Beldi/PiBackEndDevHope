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
        $groups = ['groups' => 'show_symptom'];
        return $this->restService->getAllAction($symptomRepository, $groups);
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

    /**
     * @Route("/getZone", name="symptom_getName", methods={"GET"})
     * @return Response
     */
    public function getZoneAction(SymptomRepository $symptomRepository)
    {
         $groups = ['groups' => 'show_symptom'];

        $list = $symptomRepository->findName();


        $serializer = $this->get('serializer');
        $data = $serializer->serialize($list, 'json', $groups);

        $response = new Response($data, Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET');

        return $response;

    }

}
