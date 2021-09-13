<?php

declare(strict_types=1);

namespace App\Controller\Security;

use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Undocumented class
 */
class RegistrationController extends AbstractController
{
    /**
     * Registering a new user.
     * 
     * @Route("/ajax/registration", name="registration")
     *
     * @return Response
     */
    public function register(Request $request): Response
    {
        $registrationForm = $this->createForm(RegistrationFormType::class);

        $registrationForm->handleRequest($request);
        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
           // dd("I'm here", $registrationForm->getData());
            $newUserData = $registrationForm->getData();

            dd($newUserData);
            return new RedirectResponse($request->headers->get('referer'));
        }

        return new RedirectResponse($request->headers->get('referer'));
    }
}
