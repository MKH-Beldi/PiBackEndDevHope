<?php

namespace App\Controller;

use App\Entity\Reference;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
        $objectToPersist = $serializer->deserialize($data, "App\Entity\\".$className, 'json');

        $objectToPersist->setCreatedAt(new \DateTime("now", new \DateTimeZone('Africa/Tunis')));
        $em = $this->getDoctrine()->getManager();
        $em->persist($objectToPersist);
        $em->flush();

        $response = new Response('Instance of '."App\Entity\\".$className.' created successfully.', Response::HTTP_CREATED);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST');

        return $response;
    }

    /**
     * @param Request $request
     * @param Reference[] $refs
     * @return Response
     */
    public function createWithRefsAction(Request $request, $className, $references)
    {
        $dataArray = json_decode($request->getContent(), true);
        foreach ($references as $reference)
        {
            $referencesNames[] = $reference->refName;

        }

        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor());
        $serializer = new Serializer([$normalizer, new DateTimeNormalizer()], $encoders);
        $object = $serializer->deserialize($data, "App\Entity\\".$className, 'json',[AbstractNormalizer::IGNORED_ATTRIBUTES => $referencesNames]);


        foreach ($references as $reference)
        {
            if (isset($dataArray[$reference->refName])) {
                $referencesArray = new ArrayCollection($dataArray[$reference->refName]);
                if($reference->isArray)
                {
                    foreach ($referencesArray as $ref){
                        $referenceArrayIds[] = $ref["id"];
                        $classNameRef = $reference->className;
                        $objectsRef = $this->getDoctrine()->getRepository("App\Entity\\".$classNameRef)->findBy(array('id' => $referenceArrayIds));
                    }
                    $objectsArrayCollection = new ArrayCollection($objectsRef);
                    $object->__set($reference->refName, $objectsArrayCollection);

                }else
                {
                    $referenceId= $dataArray[$reference->refName]["id"];
                    $classNameRef = $reference->className;
                    $objectRef = $this->getDoctrine()->getManager()->getRepository("App\Entity\\".$classNameRef)->find($referenceId);
                    $object->__set($reference->refName, $objectRef);
                }
            }

        }

        $object->setCreatedAt(new \DateTime("now", new \DateTimeZone('Africa/Tunis')));
        $em = $this->getDoctrine()->getManager();
        $em->persist($object);
        $em->flush();

        $response = new Response("App\Entity\\".$className.' created successfully.', Response::HTTP_CREATED);
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
        $objectUpdate->setUpdatedAt(new \DateTime("now", new \DateTimeZone('Africa/Tunis')));
        $entityManager->flush();

        $response = new Response('Instance of '.get_class($objectUpdate).' updated successfully.', Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'PUT, PATCH');

        return $response;
    }

    /**
     * @param Request $request
     * @param $objectUpdate
     * @param $className
     * @param $references
     * @return Response
     */
    public function updateWithRefsAction(Request $request, $objectUpdate, $references)
    {
        $dataArray = json_decode($request->getContent(), true);
        foreach ($references as $reference)
        {
            $referencesNames[] = $reference->refName;
        }
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor());
        $serializer = new Serializer([$normalizer, new DateTimeNormalizer()], $encoders);
        $serializer->deserialize($data, get_class($objectUpdate), 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => $referencesNames, AbstractNormalizer::OBJECT_TO_POPULATE => $objectUpdate]);

        foreach ($references as $reference)
        {
            if (isset($dataArray[$reference->refName]))
            {
                $referencesArray = new ArrayCollection($dataArray[$reference->refName]);
                if($reference->isArray)
                {
                    foreach ($referencesArray as $ref){
                        $referenceArrayIds[] = $ref["id"];
                        $classNameRef = $reference->className;
                        $objectsRef = $this->getDoctrine()->getRepository("App\Entity\\".$classNameRef)->findBy(array('id' => $referenceArrayIds));
                    }
                    $objectsArrayCollection = new ArrayCollection($objectsRef);
                    $objectUpdate->__set($reference->refName, $objectsArrayCollection);

                }else
                {
                    $referenceId= $dataArray[$reference->refName]["id"];
                    $classNameRef = $reference->className;
                    $objectRef = $this->getDoctrine()->getManager()->getRepository("App\Entity\\".$classNameRef)->find($referenceId);
                    $objectUpdate->__set($reference->refName, $objectRef);
                }
            }
        }

        $objectUpdate->setUpdatedAt(new \DateTime("now", new \DateTimeZone('Africa/Tunis')));
        $em = $this->getDoctrine()->getManager();
        $em->flush();

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
