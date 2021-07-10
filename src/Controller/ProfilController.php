<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Profil;
use App\Entity\Reference;
use App\Repository\ProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/api/profil")
 */

class ProfilController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="profil_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(ProfilRepository  $profilRepository)
    {
        $groups = ['groups' => 'show_profil'];
        return $this->restService->getAllAction($profilRepository, $groups);    }

    /**
     * @Route("/create", name="profil_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Profil", [new Reference('User', 'userDr', false)]);
    }

    /**
     * @Route("/update/{id}", name="profil_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Profil $profil, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $profil, [new Reference('User', 'userDr', false)]);
    }

    /**
     * @Route("/delete/{id}", name="profil_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, ProfilRepository  $profilRepository)
    {
        return $this->restService->deleteAction($id, $profilRepository);
    }


}
