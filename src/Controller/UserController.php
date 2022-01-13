<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
    #[Route('/user/{user_id}', name: 'user')]
    public function showUser($user_id, ManagerRegistry $managerRegistry): Response
    {
        $manager = $managerRegistry->getRepository(User::class);
        $user = $manager->find($user_id);
        $phones = $user->getPhones();
        $profile = $user->getProfileId();

        return $this->render('user/index.html.twig', [
            'user' => $user,
            'phones' => $phones,
            'profile' => $profile
        ]);
    }
}
