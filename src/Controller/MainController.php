<?php

namespace App\Controller;

use App\Repository\TrackerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @param TrackerRepository $trackerRepository
     * @return Response
     */
    public function index(TrackerRepository $trackerRepository, Request $request): Response
    {
            if ($request->request->has('submit')) {
                $this->date = $request->request->get('date');

                return $this->render('main/index.html.twig', [
                    'dateActually' => $trackerRepository->findByActuallyDate(),
                    'allDepartment' => $trackerRepository->findAllDepartments(),
                    'date' => $trackerRepository->findByDate($this->date),
                ]);
            } else {
                return $this->render('main/index.html.twig', [
                    'dateActually' => $trackerRepository->findByActuallyDate(),
                    'allDepartment' => $trackerRepository->findAllDepartments(),
                    ]);
            }
    }
}
