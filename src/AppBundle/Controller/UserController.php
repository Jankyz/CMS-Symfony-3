<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/", name="user_add")
     *
     * @param Request $Request
     *
     * @return Response
     */
    public function addUser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        if ($request->isMethod("post")){
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());

                $user->setPassword($password);
                $user->setRegisteredAt(new \DateTime());

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash("success", "Rejestracja użytkownika {$user->getUsername()} przebiegła pomyślnie.");

                return $this->redirectToRoute("user_details", ['id' => $user->getId()] );

            }
            $this->addFlash("error", "Rejestracja nieudana!");
        }

        return $this->render("Users/add.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/list", name="user_list")
     *
     * @Security("has_role('ROLE_USER')")
     *
     * @return Response
     */
    public function listAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $list = $entityManager->getRepository(User::class)->findAll();

        return $this->render("Users/list.html.twig", ["list" => $list]);
    }

    /**
     * @Route("/list/{id}", name="user_details")
     *
     * @param User $user
     *
     * @return Response
     */
    public function detailsAction(User $user)
    {
        return $this->render("Users/details.html.twig", ['user' => $user]);
    }
}