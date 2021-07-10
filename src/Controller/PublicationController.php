<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reference;




/**
 * @Route("/api/publication")
 */

class PublicationController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="publication_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(PublicationRepository  $publicationRepository)
    {
        $groups = ['groups' => 'show_publication'];
        return $this->restService->getAllAction($publicationRepository, $groups);;
    }

    /**
     * @Route("/create", name="publication_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Publication", [new Reference('User', 'userDr', false)]);
    }

    /**
     * @Route("/update/{id}", name="publication_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Publication $publication, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $publication, [new Reference('User', 'userDr', false)]);
    }

    /**
     * @Route("/delete/{id}", name="publication_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, PublicationRepository   $publicationRepository)
    {
        return $this->restService->deleteAction($id, $publicationRepository);
    }


}
