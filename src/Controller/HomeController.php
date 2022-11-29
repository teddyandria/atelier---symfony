<?php

namespace App\Controller;

use App\DataFixtures\SquirrelFixtures;
use App\Repository\NutRepository;
use App\Repository\SquirrelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/home', name: 'home_index')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SquirrelRepository $squirrels, NutRepository $nuts): Response
    {
        $nutView = $nuts->findAll();
        $squirrelView = $squirrels->findAll();
        return $this->render('home/index.html.twig', [
            'squirrels' => $squirrelView,
            'nuts' => $nutView,
        ]);
    }
}
