<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->restService->getAllAction($commentRepository);
    }

    /**
     * @Route("/create", name="publication_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Comment", [new Reference('User', 'user_id', false), new Reference('Publication', 'publication_id', false)]);
    }

    /**
     * @Route("/update/{id}", name="comment_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Comment $comment, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $comment, [new Reference('User', 'user_id', false), new Reference('Publication', 'publication_id', false)]);
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
