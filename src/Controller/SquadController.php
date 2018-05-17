<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Squad;

class SquadController extends Controller
{

	/**
     * @Route("/squad", name="squad")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $arabia = new Squad();
        $arabia->setFlag('arabiasaudita.jpg');
        $arabia->setName("Arabia Saudita");

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($arabia);

        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
?>