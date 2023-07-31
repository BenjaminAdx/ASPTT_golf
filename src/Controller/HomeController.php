<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/connaître', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }


    #[Route('/golfpartenaires', name: 'partners')]
    public function partners(): Response
    {
        return $this->render('home/partners.html.twig');
    }

    #[Route('/evenements', name: 'events')]
    public function events(): Response
    {
        return $this->render('home/events.html.twig');
    }

    #[Route('/compétitions', name: 'tournaments')]
    public function tournaments(): Response
    {
        return $this->render('home/tournaments.html.twig');
    }

    #[Route('/voyages', name: 'travels')]
    public function travels(): Response
    {
        return $this->render('home/travels.html.twig');
    }

    #[Route('/formations', name: 'training')]
    public function training(): Response
    {
        return $this->render('home/training.html.twig');
    }
}
