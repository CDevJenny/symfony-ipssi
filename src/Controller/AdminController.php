<?php

namespace App\Controller;

use App\Form\ArticleFilterType;
use App\Form\ProductFilterType;
use App\Repository\ArticleRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('', name: 'app_admin')]
    public function index(Request $request, ArticleRepository $articleRepository, ProductRepository $productRepository): Response
    {
/*         $roleChecker = $this->container->get('security.authorization_checker');
        if ($roleChecker->isGranted('ROLE_ADMIN') && !$roleChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_home');
        } */
        $articlesCount = count($articleRepository->findAll());
        $productsCount = count($productRepository->findAll());

        $articleForm = $this->createForm(ArticleFilterType::class);
        $articleForm->handleRequest($request);

        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            $limit = $articleForm->get('limit')->getData();
            $author = $articleForm->get('author')->getData();
            $authorId = $author->getId();

            return $this->redirectToRoute('app_admin_articles', [
                "limit" => $limit,
                "author" => $authorId
            ]);
        }

        $productForm = $this->createForm(ProductFilterType::class);
        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {
            $limit = $productForm->get('limit')->getData();
            $seller = $productForm->get('seller')->getData();
            $category = $productForm->get('category')->getData();
            $sellerId = $seller->getId();
            $categoryId = $category->getId();

            return $this->redirectToRoute('app_admin_products', [
                "limit" => $limit,
                "seller" => $sellerId,
                "category" => $categoryId
            ]);
        }

        return $this->renderForm('admin/index.html.twig', [
            "articlesCount" => $articlesCount,
            "productsCount" => $productsCount,
            "articleForm" => $articleForm,
            "productForm" => $productForm
        ]);
    }
    #[Route('/articles/{limit}/{author}', name: 'app_admin_articles')]
    public function getArticles(ArticleRepository $articleRepository, $limit, $author) {
        
        $articles = $articleRepository->findByCreatedDate($limit, $author);

        return $this->render('admin/articles.html.twig', [
            'articles' => $articles
        ]);
    }

        #[Route('/products/{limit}/{seller}/{category}', name: 'app_admin_products')]
    public function getProducts(ProductRepository $productRepository, $limit, $seller, $category) {
        
        $products = $productRepository->findByCreatedDate($limit, $seller, $category);

        return $this->render('admin/products.html.twig', [
            'products' => $products
        ]);
    }
}
