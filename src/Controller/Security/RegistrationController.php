<?php

declare(strict_types=1);

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller handling the registration of new users
 */
class RegistrationController extends AbstractController
{
    /**
     * AJAX Registraion method
     *
     * @Route("/registration", name="registration", options= {"expose" = true})
     *
     * @return Response
     */
    public function register(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $user = new User();
        $registrationForm = $this->createForm(RegistrationFormType::class, $user);

        $registrationForm->handleRequest($request);
        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
            $password = $passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $entityManager->persist($user);
            $entityManager->flush();

            $pageContent = [
                'registrationForm' => $registrationForm->createView(),
            ];

            //TODO send validation email

            return $this->render('base.html.twig', $pageContent);
        }

        dd($registrationForm->getErrors(true));

        return new JsonResponse();
    }
}
