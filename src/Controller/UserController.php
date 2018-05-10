<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setEmail('user');
        $user->setPassword("pass");

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $request = Request::createFromGlobals();
        $content = $request->getContent();
        $data = json_decode($content, true);

        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->FindOneBy(["email" => $data["user"] , "password" => $data["password"]]);
        if($user)
        {
            $jsonUser = array();
            $jsonUser["id"] = $user->getId();
            $jsonUser["email"] = $user->getEmail();
            $jsonUser["points"] = $user->getPoints();
            $person = $user->getIdPerson();
            if($person)
            {
                $jsonPerson = array();
                $jsonPerosn["id"] = $person->getId();
                $jsonPerson["name"] = $person->getName();
                $jsonPerson["lastName"] = $person->getLastname();
                $jsonUser["person"] = $jsonPerson;
            }
            return $this->json(array("success" => true, "data" => $jsonUser));
        }
        else
        {
            return $this->json(array("success" => false, "data" => array()));
        }
    }
}
