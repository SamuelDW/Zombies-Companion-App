<?php

declare(strict_types=1);

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Undocumented class
 */
class RegistrationController extends AbstractController
{
    /**
     * Registering a new user.
     * 
     * @Route("/registration", name="registration")
     *
     * @return Response
     */
    public function register(
        Request $request, 
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $userPasswordHasherInterface
    ): Response {
        $user = new User();
        $registrationForm = $this->createForm(RegistrationFormType::class, $user);

        $registrationForm->handleRequest($request);
        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            
            return new RedirectResponse($request->headers->get('referer'));
        }

        return new RedirectResponse($request->headers->get('referer'));
    }
}
