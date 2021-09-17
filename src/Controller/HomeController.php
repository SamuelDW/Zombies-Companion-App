<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
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
        $user = new User();
        $registerForm = $this->createForm(RegistrationFormType::class, $user);

      // $existUser = $userRepository->getUserByUserIdentifier('example@example.com');

        $pageContent = [
            'registrationForm' => $registerForm->createView(),
        ];

        return $this->render('base.html.twig', $pageContent);
    }
}
