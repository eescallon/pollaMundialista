<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Match;
use App\Entity\Points;
use App\Entity\Forecast;
use App\Entity\User;
;
class MatchController extends Controller
{
	/**
     * @Route("/allmatch", name="allmatch")
     */
    public function index()
    {
    	$em = $this->getDoctrine()->getManager(); 
    	$request = Request::createFromGlobals();
        $content = $request->getContent();
        $data = json_decode($content, true);
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repositoryUser->FindOneBy(["id" => $data["id"]]);
        if($user)
        {
	        $repositoryMatch = $this->getDoctrine()->getRepository(Match::class);
	        $matchs = $repositoryMatch->findAll();
        	$jsonMatch = array();
	        if($matchs)
	        {
	        	$repositoryForecast = $this->getDoctrine()->getRepository(Forecast::class);
	        	foreach($matchs as $match)
	        	{
	        		$json = array();
	        		$json["id"] = $match->getId();
	        		$json["date"] = $match->getDate()->format("Y-m-d H:i:s");
	        		$squad1 = $match->getIdSquad1();
	        		$jsonSquad1 = array();
	        		$jsonSquad1["id"] = $squad1->getId();
	        		$jsonSquad1["flag"] = $squad1->getFlag();
	        		$jsonSquad1["name"] = $squad1->getName();
	        		$json["squad1"] = $jsonSquad1;
	        		$squad2 = $match->getIdSquad2();
	        		$jsonSquad2 = array();
	        		$jsonSquad2["id"] = $squad2->getId();
	        		$jsonSquad2["flag"] = $squad2->getFlag();
	        		$jsonSquad2["name"] = $squad2->getName();
	        		$json["squad2"] = $jsonSquad2;
	        		$json["score1"] = $match->getScore1();
	        		$json["score2"] = $match->getScore2();
	        		$forecast = $repositoryForecast->FindOneBy(["idUser" => $user, "idMatch" => $match]);
        			$jsonForecast = array();
	        		if($forecast)
	        		{
	        			$jsonForecast["id"] = $forecast->getId();
	        			$jsonForecast["score1"] = $forecast->getScore1();
	        			$jsonForecast["score2"] = $forecast->getScore2();
	        			$jsonForecast["date"] = $forecast->getDate()->format("Y-m-d H:i:s");
	        		}
	        		$json["forecast"] = $jsonForecast;
	        		$jsonMatch[] = $json;
	        	}
	        }
            return $this->json(array("success" => true, "data" => $jsonMatch));

    	}
    	else
    	{
            return $this->json(array("success" => false, "message" => "No se encontro ningun usuario"));
    	}
    }
}
?>