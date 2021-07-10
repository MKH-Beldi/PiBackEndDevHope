<?php

namespace App\Controller;

use App\Controller\Service\RestServiceController;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reference;

/**
 * @Route("/api/comment")
 */
class CommentController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="comment_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(CommentRepository  $commentRepository)
    {
        $groups = ['groups' => 'show_comment'];
        return $this->restService->getAllAction($commentRepository, $groups);
    }

    /**
     * @Route("/create", name="comment_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Comment", [new Reference('User', 'user', false), new Reference('Publication', 'publication', false)]);
    }

    /**
     * @Route("/update/{id}", name="comment_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Comment $comment, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $comment, [new Reference('User', 'user', false), new Reference('Publication', 'publication', false)]);
    }

    /**
     * @Route("/delete/{id}", name="comment_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, CommentRepository    $commentRepository)
    {
        return $this->restService->deleteAction($id, $commentRepository);
    }



}
