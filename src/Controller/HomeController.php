<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * Undocumented function
     * 
     * @Route("/", name="index")
     *
     * @return Response
     */
    public function index(UserRepository $userRepository): Response
    {
        $registerForm = $this->createForm(RegistrationFormType::class);

        //dd($userRepository->getUserByUserIdentifier('samueldurw@outlook.com'));

        $pageContent = [
            'registrationForm' => $registerForm->createView(),
        ];

        return $this->render('base.html.twig', $pageContent);
    }
}
