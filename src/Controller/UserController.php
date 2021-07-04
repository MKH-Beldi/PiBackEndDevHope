<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\SpecialtyDr;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/api/user")
 */
class UserController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restServiceController= $restServiceController;
    }

    /**
     * @Route("", name="user_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(UserRepository $userRepository)
    {
        return $this->restServiceController->getAllAction($userRepository);
    }

    /**
     * @Route("/create", name="user_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        // Decoder json data en un tableau de données
        $dataArray = json_decode($request->getContent(), true);
        // Recuperation de la liste des specialtyDr's dans un tableau
        $specialtyDrArray = new ArrayCollection($dataArray["specialtyDr"]);
        // Recuperation la liste des id's des specialtyDr's
        foreach ($specialtyDrArray as $specialtyDr){
            $specialtyDrArrayIds[] = $specialtyDr["id"];
        }
        //  Recuperation id city
        $cityId = $dataArray["city"]["id"];
        // // Recuperation à partir de la BD l'object city par id recuperé à partir  json data
        $city = $this->getDoctrine()->getManager()->getRepository(City::class)->find($cityId);

        // Recuperation à partir de la BD la liste des objects SpecialtyDr dont les id's égales à la liste des id's recuperés à partir  json data
        $specialtyDrs = $this->getDoctrine()->getRepository(SpecialtyDr::class)->findBy(array('id' => $specialtyDrArrayIds));
        // Préparer une ArrayCollection pour l'affecter à l'objet $user
        $specialtyDrArrayCollection = new ArrayCollection($specialtyDrs);

        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor());
        $serializer = new Serializer([$normalizer, new DateTimeNormalizer([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])], $encoders);
        $user = $serializer->deserialize($data, 'App\Entity\User', 'json');

        // Affecter ArrayCollection SpecialtyDr à l'objet $user
        $user->setSpecialtyDr($specialtyDrArrayCollection);
        // Affecter objet $city à l'objet $user
        $user->setCity($city);
        $user->setSpecialtyDr($specialtyDrArrayCollection);
        $user->setCreatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $response = new Response('User created successfully.', Response::HTTP_CREATED);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST');

        return $response;

    }

    /**
     * @Route("/update/{id}", name="user_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(User $user, Request $request)
    {
        return $this->restServiceController->updateAction($user, $request);
    }

    /**
     * @Route("/delete/{id}", name="user_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, UserRepository $userRepository)
    {
        return $this->restServiceController->deleteAction($id, $userRepository);
    }
}
