<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Squad;

class SquadController extends Controller
{

	/**
     * @Route("/squad", name="squad")
     */
    public function index()
    {
    	$equipos = array(
    		array(
    			"name" => "Rusia",
    			"flag" => "rusia.jpg" 
    		),
    		array(
    			"name" => "Alemania",
    			"flag" => "alemania.jpg" 
    		),
    		array(
    			"name" => "Brasil",
    			"flag" => "brasil.jpg" 
    		),
    		array(
    			"name" => "Portugal",
    			"flag" => "portugal.jpg" 
    		),
    		array(
    			"name" => "Argentina",
    			"flag" => "Argentina.jpg" 
    		),
    		array(
    			"name" => "Belgica",
    			"flag" => "belgica.jpg" 
    		),
    		array(
    			"name" => "Polonia",
    			"flag" => "polonia.jpg" 
    		),
    		array(
    			"name" => "Francia",
    			"flag" => "francia.jpg" 
    		),
    		array(
    			"name" => "España",
    			"flag" => "España.jpg" 
    		),
    		array(
    			"name" => "Peru",
    			"flag" => "peru.jpg" 
    		),
    		array(
    			"name" => "Suisa",
    			"flag" => "suisa.jpg" 
    		),
    		array(
    			"name" => "Inglaterra",
    			"flag" => "inglaterra.jpg" 
    		),
    		array(
    			"name" => "Colombia",
    			"flag" => "colombia.jpg" 
    		),
    		array(
    			"name" => "Mexico",
    			"flag" => "mexico.jpg" 
    		),
    		array(
    			"name" => "Uruguay",
    			"flag" => "uruguay.jpg" 
    		),
    		array(
    			"name" => "Croacia",
    			"flag" => "croacia.jpg" 
    		),
    		array(
    			"name" => "Dinamarca",
    			"flag" => "dinarmarca.jpg" 
    		),
    		array(
    			"name" => "Islandia",
    			"flag" => "islandia.jpg" 
    		),
    		array(
    			"name" => "Costa Rica",
    			"flag" => "costarica.jpg" 
    		),
    		array(
    			"name" => "Suecia",
    			"flag" => "suecia.jpg" 
    		),
    		array(
    			"name" => "Tunez",
    			"flag" => "tunez.jpg" 
    		),
    		array(
    			"name" => "Egipto",
    			"flag" => "egipto.jpg" 
    		),
    		array(
    			"name" => "Iran",
    			"flag" => "iran.jpg" 
    		),
    		array(
    			"name" => "Serbia",
    			"flag" => "serbia.jpg" 
    		),
    		array(
    			"name" => "Nigeria",
    			"flag" => "nigeria.jpg" 
    		),
    		array(
    			"name" => "Australia",
    			"flag" => "astrualia.jpg" 
    		),
    		array(
    			"name" => "Japon",
    			"flag" => "japon.jpg" 
    		),
    		array(
    			"name" => "Marruecos",
    			"flag" => "marruecos.jpg" 
    		),
    		array(
    			"name" => "Panama",
    			"flag" => "panama.jpg" 
    		),
    		array(
    			"name" => "Corea Del Sur",
    			"flag" => "coreadelsur.jpg" 
    		),
    		array(
    			"name" => "Arabia Saudita",
    			"flag" => "arabiasaudita.jpg" 
    		),
    	);
        $entityManager = $this->getDoctrine()->getManager();
        $return = array();
        foreach($equipos as $value)
        {

        	$Squad = new Squad();
	        $Squad->setFlag($value["flag"]);
	        $Squad->setName($value["name"]);

	        // tell Doctrine you want to (eventually) save the Product (no queries yet)
	        $entityManager->persist($Squad);
	        $return[] = $value;
        }

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json([
            $return
        ]);
    }
}
?>