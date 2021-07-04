<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;


class RestServiceController extends AbstractController
{
    /**
     * @param mixed $objectRepository
     * @return Response
     */
    public function getAllAction($objectRepository)
    {
        $list = $objectRepository->findAll();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($list, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        $response = new Response($data, Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET');

        return $response;
    }

    /**
     * @param Request $request
     * @param string $className
     * @return Response
     */
    public function createAction(Request $request, $className)
    {
        $data = $request->getContent();

        $serializer = $this->get('serializer');
        $objectToPersist = $serializer->deserialize($data, $className, 'json');

        $objectToPersist->setCreatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($objectToPersist);
        $em->flush();

        $response = new Response('Instance of '.$className.' created successfully.', Response::HTTP_CREATED);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST');

        return $response;
    }

    /**
     * @param mixed $objectUpdate
     * @param Request $request
     * @return Response
     */
    public function updateAction($objectUpdate, Request $request)
    {

        $data = $request->getContent();
        $entityManager = $this->getDoctrine()->getManager();


        $serializer = $this->get('serializer');
        $serializer->deserialize($data, get_class($objectUpdate), 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $objectUpdate]);
        $objectUpdate->setUpdatedAt(new \DateTime());
        $entityManager->flush();

        $response = new Response('Instance of '.get_class($objectUpdate).' updated successfully.', Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'PUT, PATCH');

        return $response;
    }

    /**
     * @param $id
     * @param mixed $objectRepository
     * @return Response
     */
    public function deleteAction($id, $objectRepository)
    {
        $objectToDelete = $objectRepository->find($id);
        if(!$objectToDelete)
        {
            $response = new Response('Object not found inside the database', Response::HTTP_NOT_FOUND);
            return $response;
        }
        $entityManager= $this->getDoctrine()->getManager();
        $entityManager->remove($objectToDelete);
        $entityManager->flush();

        $response = new Response('Instance of '.get_class($objectToDelete).' deleted successfully.', Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'DELETE');

        return $response;
    }
}
