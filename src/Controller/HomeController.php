<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @return Response
     */
    public function index(): Response
    {
        $registerForm = $this->createForm(RegistrationFormType::class);

        $pageContent = [
            'registrationForm' => $registerForm->createView(),
        ];

        return $this->render('base.html.twig', $pageContent);
    }
}