<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Reference;
use App\Entity\User;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/user")
 */
class UserController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="user_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(UserRepository $userRepository)
    {
        $groups = ['groups' => 'show_user'];
        return $this->restService->getAllAction($userRepository, $groups);
    }

    /**
     * @Route("/create", name="user_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "User", [new Reference('SpecialtyDr', 'specialtyDr', 'true'), new Reference('City', 'city', false)]);
    }

    /**
     * @Route("/update/{id}", name="user_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(User $user, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $user, [new Reference('SpecialtyDr', 'specialtyDr', 'true'), new Reference('City', 'city', false)]);
    }

    /**
     * @Route("/delete/{id}", name="user_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, UserRepository $userRepository)
    {
        return $this->restService->deleteAction($id, $userRepository);
    }
}
