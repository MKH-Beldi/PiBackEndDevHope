<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Certificat;
use App\Repository\CertificatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reference;


/**
 * @Route("/api/certificat")
 */
class CertificatController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="certificat_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(CertificatRepository  $certificatRepository)
    {
        $groups = ['groups' => 'show_certificat'];
        return $this->restService->getAllAction($certificatRepository,$groups);
    }

    /**
     * @Route("/create", name="certificat_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Certificat", [new Reference("Consultation", "consultation", false)]);
    }

    /**
     * @Route("/update/{id}", name="certificat_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Certificat $certificat, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $certificat, [new Reference("Consultation", "consultation", false)]);
    }

    /**
     * @Route("/delete/{id}", name="certificat_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, CertificatRepository  $certificatRepository)
    {
        return $this->restService->deleteAction($id, $certificatRepository);
    }
}
