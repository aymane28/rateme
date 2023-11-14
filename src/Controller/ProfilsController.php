<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ReviewRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilsController extends AbstractController
{
    #[Route('/profiles', name: 'profiles')]
    public function profiles(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('profiles/profiles.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/{pseudo}', name: 'profile_details')]
    public function profile(User $user, ReviewRepository $reviewRepository): Response
    {
        $reviews = $reviewRepository->findBy(['user_id'=> $user->getId()]);
        //$reviews = $user->getReviews();
        //dd($reviews);
        return $this->render('profiles/profile_details.html.twig', [
            'user' => $user
        ]);
    }
}