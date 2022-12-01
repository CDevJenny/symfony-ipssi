<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    public function __construct(protected UserPasswordHasherInterface $userPasswordHasher)
    {      
    }

    
    #[Route('/profile/{id}', name: 'app_user_show')]
    public function getProfile(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($user->getId() == $this->getUser()->getId()) {
            $profile = $user;
            $userArticles = $user->getArticles()->toArray();
            $userProducts = $user->getProducts()->toArray();

            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                    $this->userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );
    
                $entityManager->persist($user);
                $entityManager->flush();
                
                return $this->redirectToRoute('app_user_show', ["id" => $user->getId()]);
            }
                    
        return $this->render('user/index.html.twig', [
            'user' => $profile,
            'articles' => $userArticles,
            'products' => $userProducts,
            'form' => $form->createView()
        ]);

        } else {
            return $this->redirectToRoute('app_home');
        }
    }
}