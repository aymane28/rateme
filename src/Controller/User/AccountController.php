<?php

namespace App\Controller\User;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountController extends AbstractController
{
    #[Route('/{pseudo}/mon-compte', name: 'app_account')]
    public function account(User $user): Response
    {
        return $this->render('user/account.html.twig');
    }
}