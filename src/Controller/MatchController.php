<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Match;
use App\Entity\Points;
use App\Entity\Forecast;
use App\Entity\User;
use App\Entity\Squad;
;
class MatchController extends Controller
{
	/**
     * @Route("/insertmatch", name="insertmatch")
     */
	public function insertMatch(){
    	$em = $this->getDoctrine()->getManager(); 
    	$repoSquad = $this->getDoctrine()->getRepository(Squad::class);
        $squad1 = $repoSquad->find(1,31);
        $squad2 = $repoSquad->find(25,15);

        $squad3 = $repoSquad->find(28,23);
        $squad4 = $repoSquad->find(4,9);


        $squad5 = $repoSquad->find(8,26);
        $squad6 = $repoSquad->find(5,18);

        $squad7 = $repoSquad->find(10,17);
        $squad8 = $repoSquad->find(9);

        $squad9 = $repoSquad->find(8);
        $squad10 = $repoSquad->find(26);

        $squad11 = $repoSquad->find(5);
        $squad12 = $repoSquad->find(18);

        $squad13 = $repoSquad->find(10);
        $squad14 = $repoSquad->find(17);

        $squad15 = $repoSquad->find(16);
        $squad16 = $repoSquad->find(25);

        $squad17 = $repoSquad->find(19);
        $squad18 = $repoSquad->find(24);

        $squad19 = $repoSquad->find(2);
        $squad20 = $repoSquad->find(14);

        $squad21 = $repoSquad->find(3);
        $squad22 = $repoSquad->find(11);

        $squad23 = $repoSquad->find(20);
        $squad24 = $repoSquad->find(30);

        $squad25 = $repoSquad->find(6);
        $squad26 = $repoSquad->find(29);

        $squad27 = $repoSquad->find(21);
        $squad28 = $repoSquad->find(12);

        $squad29 = $repoSquad->find(13);
        $squad30 = $repoSquad->find(27);

        $squad31 = $repoSquad->find(7);
        $squad32 = $repoSquad->find(32);




        $squad3 = $repoSquad->find(3);
        $squad4 = $repoSquad->find(4)
    	$match1 = new Match();
    	$match1->setDate(new \Datetime());
    	$match1->setIdSquad1($squad1);
    	$match1->setIdSquad2($squad2);
    	$em->persist($match1);


    	$match2 = new Match();
    	$match2->setDate(new \Datetime());
    	$match2->setIdSquad1($squad3);
    	$match2->setIdSquad2($squad4);
    	$em->persist($match2);

    	$em->flush();
        return $this->json(array("success" => false, "message" => "Partidos creados"));
	}

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

    /**
     * @Route("/save/finalmatch/{id}", name="savefinalmatch")
     */
    public function saveFinalMatch($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = Request::createFromGlobals();
        $content = $request->getContent();
        $data = json_decode($content, true);
        $repoMatch = $this->getDoctrine()->getRepository(Match::class);
        $match = $repoMatch->find($id);
        $match->setScore1($data["score1"]);
        $match->setScore2($data["score2"]);
        $forecastRepo = $this->getDoctrine()->getRepository(Forecast::class);
        $forecasts = $forecastRepo->findBy(array("idMatch" => $match));
        $pointRepo = $this->getDoctrine()->getRepository(Points::class);
        foreach ($forecasts as $value) 
        {
            $point = $pointRepo->findOneBy(array("idUser" => $value->getIdUser()));
            if(!$point)
            {
                $point = new Points();
                $point->setIdUser($value->getIdUser());
                $point->setPoint(0);
                $em->persist($point);
            }
            $newPoint = $point->getPoint();
            if($value->getScore1() == $data["score1"] && $value->getScore2() == $data["score2"])
            {
                $newPoint = $newPoint + 5;
            }
            else
            {
                if($data["score1"] > $data["score2"])
                {
                    if($value->getScore1() > $value->getScore2())
                    {
                        $newPoint = $newPoint + 2;
                    }
                }
                else if($data["score1"] < $data["score2"])
                {
                    if($value->getScore1() < $value->getScore2())
                    {
                        $newPoint = $newPoint + 2;
                    }
                }
                else
                {
                    if($value->getScore1() == $value->getScore2())
                    {
                        $newPoint = $newPoint + 2;
                    }
                }
            }
            $point->setPoint($newPoint);
        }
        $em->flush();
        return $this->json(array("success" => true, "message" => "Marcador final guardado con exito"));
    }
}
?>