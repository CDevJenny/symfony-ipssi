<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    public function __construct(protected AuthorizationCheckerInterface $authorizationChecker)
    {
    }
    #[Route('', name: 'app_admin')]
    public function index(ArticleRepository $articleRepository, ProductRepository $productRepository): Response
    {
        $articles = $articleRepository->findAll();
        $products = $productRepository->findAll();

        return $this->render('admin/index.html.twig', [
            "articles" => $articles,
            "products" => $products
        ]);
    }
}
