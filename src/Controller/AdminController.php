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
        $articles = $articleRepository->findByCreatedDate(10, 2);
        $products = $productRepository->findAll();

        return $this->render('admin/index.html.twig', [
            "articles" => $articles,
            "products" => $products
        ]);
    }
    #[Route('/articles/{limit}/{author}', name: 'app_admin_articles')]
    public function getArticles(ArticleRepository $articleRepository, $limit, $author) {
        dd($limit);
        $filters = $articleRepository->findByCreatedDate($limit, $author);
    }
}
