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
    			"flag" => "argentina.jpg" 
    		),
    		array(
    			"name" => "Bélgica",
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
    			"name" => "Perú",
    			"flag" => "peru.jpg" 
    		),
    		array(
    			"name" => "Suiza",
    			"flag" => "suiza.jpg" 
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
    			"name" => "México",
    			"flag" => "mexico.jpg" 
    		),
    		array(
    			"name" => "Urúguay",
    			"flag" => "uruguay.jpg" 
    		),
    		array(
    			"name" => "Croacía",
    			"flag" => "croacia.jpg" 
    		),
    		array(
    			"name" => "Dinamarca",
    			"flag" => "dinarmarca.jpg" 
    		),
    		array(
    			"name" => "Islandía",
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
    			"name" => "Túnez",
    			"flag" => "tunez.jpg" 
    		),
    		array(
    			"name" => "Egipto",
    			"flag" => "egipto.jpg" 
    		),
    		array(
    			"name" => "Irán",
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
    			"flag" => "australia.jpg" 
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
    			"name" => "Panamá",
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
            array(
                 "name" => "Senegal",
                 "flag" => "senegal.jpg"
            )
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