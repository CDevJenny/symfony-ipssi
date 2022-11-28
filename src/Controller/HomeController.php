<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    public function __construct(protected ManagerRegistry $registery) 
    {
    }

    #[Route('', name: 'app_home')]
    public function index(): Response
    {
        $articleRepository = $this->registery->getRepository(Article::class);

        $article = $articleRepository->find(1);

        return $this->render('home/index.html.twig', [
            'article' => $article,
        ]);
    }
}
