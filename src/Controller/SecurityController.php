<?php

namespace App\Controller;

use App\Entity\Owner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="app_login", methods={"POST"})
     */
    public function login()
    {
        return $this->json([
                'user' => $this->getUser() ? $this->getUser()->getId() : null]
        );
    }

    /**
     * @Route("/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $data = \json_decode($request->getContent(), true);
        $user = new Owner();
        $user->setEmail($data['email']);

        $user->setPassword($encoder->encodePassword($user, $data['plainPassword']));
        if($data['user_type']=='user')
            $user->setRoles(['ROLE_USER']);
        if($data['user_type']=='config')
            $user->setRoles(['ROLE_CONFIG']);
        if($data['user_type']=='company')
            $user->setRoles(['ROLE_COMPANY']);

        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse($user);

    }
}