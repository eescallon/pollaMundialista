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
        $squad1 = $repoSquad->find(1);
        $squad2 = $repoSquad->find(31);
        $match1 = new Match();
        $match1->setDate(new \Datetime());
        $match1->setIdSquad1($squad1);
        $match1->setIdSquad2($squad2);
        $em->persist($match1);

        $squad3 = $repoSquad->find(25);
        $squad4 = $repoSquad->find(15)
        $match = new Match();
        $match2->setDate(new \Datetime());
        $match2->setIdSquad1($squad3);
        $match2->setIdSquad2($squad4);
        $em->persist($match2);

        $squad5 = $repoSquad->find(28);
        $squad6 = $repoSquad->find(23)
        $match3 = new Match();
        $match3->setDate(new \Datetime());
        $match3->setIdSquad1($squad5);
        $match3->setIdSquad2($squad6);
        $em->persist($match3);

        $squad7 = $repoSquad->find(4);
        $squad8 = $repoSquad->find(9);
        $match4 = new Match();
        $match4->setDate(new \Datetime());
        $match4->setIdSquad1($squad7);
        $match4->setIdSquad2($squad8);
        $em->persist($match4);

        $squad9 = $repoSquad->find(8);
        $squad10 = $repoSquad->find(26);
        $match5 = new Match();
        $match5->setDate(new \Datetime());
        $match5->setIdSquad1($squad9);
        $match5->setIdSquad2($squad10);
        $em->persist($match5);

        $squad11 = $repoSquad->find(5);
        $squad12 = $repoSquad->find(18);
        $match6 = new Match();
        $match6->setDate(new \Datetime());
        $match6->setIdSquad1($squad11);
        $match6->setIdSquad2($squad12);
        $em->persist($match6);

        $squad13 = $repoSquad->find(10);
        $squad14 = $repoSquad->find(17);
        $match7 = new Match();
        $match7->setDate(new \Datetime());
        $match7->setIdSquad1($squad13);
        $match7->setIdSquad2($squad14);
        $em->persist($match7);

        $squad15 = $repoSquad->find(16);
        $squad16 = $repoSquad->find(25);
        $match8 = new Match();
        $match8->setDate(new \Datetime());
        $match8->setIdSquad1($squad15);
        $match8->setIdSquad2($squad16);
        $em->persist($match8);

        $squad17 = $repoSquad->find(19);
        $squad18 = $repoSquad->find(24);
        $match9 = new Match();
        $match9->setDate(new \Datetime());
        $match9->setIdSquad1($squad17);
        $match9->setIdSquad2($squad18);
        $em->persist($match9);

        $squad19 = $repoSquad->find(2);
        $squad20 = $repoSquad->find(14);
        $match10 = new Match();
        $match10->setDate(new \Datetime());
        $match10->setIdSquad1($squad19);
        $match10->setIdSquad2($squad20);
        $em->persist($match10);

        $squad21 = $repoSquad->find(3);
        $squad22 = $repoSquad->find(11);
        $match11 = new Match();
        $match11->setDate(new \Datetime());
        $match11->setIdSquad1($squad21);
        $match11->setIdSquad2($squad22);
        $em->persist($match11);

        $squad23 = $repoSquad->find(20);
        $squad24 = $repoSquad->find(30);
        $match12 = new Match();
        $match12->setDate(new \Datetime());
        $match12->setIdSquad1($squad23);
        $match12->setIdSquad2($squad24);
        $em->persist($match12);

        $squad25 = $repoSquad->find(6);
        $squad26 = $repoSquad->find(29);
        $match13 = new Match();
        $match13->setDate(new \Datetime());
        $match13->setIdSquad1($squad25);
        $match13->setIdSquad2($squad26);
        $em->persist($match13);

        $squad27 = $repoSquad->find(21);
        $squad28 = $repoSquad->find(12);
        $match14 = new Match();
        $match14->setDate(new \Datetime());
        $match14->setIdSquad1($squad27);
        $match14->setIdSquad2($squad28);
        $em->persist($match14);

        $squad29 = $repoSquad->find(13);
        $squad30 = $repoSquad->find(27);
        $match15 = new Match();
        $match15->setDate(new \Datetime());
        $match15->setIdSquad1($squad29);
        $match15->setIdSquad2($squad30);
        $em->persist($match15);

        $squad31 = $repoSquad->find(7);
        $squad32 = $repoSquad->find(32);
        $match16 = new Match();
        $match16->setDate(new \Datetime());
        $match16->setIdSquad1($squad31);
        $match16->setIdSquad2($squad32);
        $em->persist($match16);
    	
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