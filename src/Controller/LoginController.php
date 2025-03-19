<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login')]
    public function index(Request $request, AuthenticationUtils $authenticationUtils): Response
    {   
        // créaaton du formulaire de connexion
        $form = $this->createForm(LoginType::class);

        // récupération des erreurs de connexion
        $error = $authenticationUtils->getLastAuthenticationError();

        // récupération du dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('login/login.html.twig', [
            'form' => $form->createView(),
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
}
