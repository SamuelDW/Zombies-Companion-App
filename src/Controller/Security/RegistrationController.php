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
     * Registraion method
     * 
     * @Route("/registration", name="registration")
     *
     * @return Response
     */
    public function register(Request $request, EntityManagerInterface $entityManager,
    UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $registrationForm = $this->createForm(RegistrationFormType::class, $user);

        $registrationForm->handleRequest($request);
        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
            $password = $passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            dd($user->getPlainPassword(), $user->getPassword());

            $entityManager->persist($user);
            $entityManager->flush();

            $pageContent = [
                'registrationForm' => $registrationForm->createView(),
            ];
            
            return $this->render('base.html.twig', $pageContent);
        }

        $pageContent = [
            'registrationForm' => $registrationForm->createView(),
            'formErrors' => $registrationForm->getErrors()
        ];
        
        return new RedirectResponse($request->headers->get('referer'));
    }
}
