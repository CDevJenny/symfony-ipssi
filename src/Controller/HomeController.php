<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/')]
class HomeController extends AbstractController
{
    public function __construct(
        protected ManagerRegistry $registery, 
        protected UserPasswordHasherInterface $encoder) 
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
/*     #[Route('/create_user', name:'app_create_user')]
    public function createUser() {
        $user = new User;
        
        $user->setEmail('test@test.com');
        $user->setRoles(['ROLE_USER']);
        $plainPassword = 'mdp1234';
        $password = $this->encoder->hashPassword($user, $plainPassword);
        $user->setPassword($password);
        
        $entityManager = $this->registery->getManager();

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    } */
}
