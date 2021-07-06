<?php

namespace App\Controller;

use App\Entity\Reference;
use App\Entity\Schedule;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/schedule")
 */
class ScheduleController extends AbstractController
{
    public function __construct(RestServiceController $restServiceController)
    {
        $this->restService= $restServiceController;
    }

    /**
     * @Route("", name="schedule_getAll", methods={"GET"})
     * @return Response
     */
    public function getAllAction(ScheduleRepository $scheduleRepository)
    {
        return $this->restService->getAllAction($scheduleRepository);
    }

    /**
     * @Route("/create", name="schedule_create", methods={"POST"})
     * @return Response
     */
    public function createAction(Request $request)
    {
        return $this->restService->createWithRefsAction($request, "Schedule", [new Reference('User', 'userDr', false)]);
    }

    /**
     * @Route("/update/{id}", name="schedule_update", methods={"PUT","PATCH"})
     * @return Response
     */
    public function updateAction(Schedule $schedule, Request $request)
    {
        return $this->restService->updateWithRefsAction($request, $schedule, [new Reference('User', 'userDr', false), new Reference('User', 'userPatient', false), new Reference('Consultation', 'consultation', false)]);
    }

    /**
     * @Route("/delete/{id}", name="schedule_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteAction($id, ScheduleRepository $scheduleRepository)
    {
        return $this->restService->deleteAction($id, $scheduleRepository);
    }
}
