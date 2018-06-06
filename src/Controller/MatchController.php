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
    	$squadRusia = $repoSquad->find(1);
    	$squadarabiasaudita = $repoSquad->find(31);

    	$squadegipto = $repoSquad->find(22);
    	$squaduruguay = $repoSquad->find(15);

        $squadmarruecos = $repoSquad->find(28);
        $squadiran = $repoSquad->find(23);

        $squadportugal = $repoSquad->find(4);
        $squadespaña = $repoSquad->find(9);

        $squadfrancia = $repoSquad->find(8);
        $squadaustralia = $repoSquad->find(26);

        $squadargentina = $repoSquad->find(5);
        $squadislandia = $repoSquad->find(18);

        $squadperu = $repoSquad->find(10);
        $squaddinamarca = $repoSquad->find(17);

        $squadcroacia = $repoSquad->find(16);
        $squadnigeria = $repoSquad->find(25);

        $squadcostarica = $repoSquad->find(19);
        $squadserbia = $repoSquad->find(24);

        $squadalemania = $repoSquad->find(2);
        $squadmexico = $repoSquad->find(14);

        $squadbrasil = $repoSquad->find(3);
        $squadsuiza = $repoSquad->find(11);

        $squadsuecia = $repoSquad->find(20);
        $squadcoreadelsur = $repoSquad->find(30);

        $squadbelgica = $repoSquad->find(6);
        $squadpanama = $repoSquad->find(29);

        $squadtunez = $repoSquad->find(21);
        $squadinglaterra = $repoSquad->find(12);

        $squadpolonia = $repoSquad->find(7);
        $squadsenegal = $repoSquad->find(32);

        $squadcolombia = $repoSquad->find(13);
        $squadjapon = $repoSquad->find(27);

    	$match1 = new Match();
    	$match1->setDate(new \Datetime("2018-06-14 10:00:00"));
    	$match1->setIdSquad1($squadRusia);
    	$match1->setIdSquad2($squadarabiasaudita);
    	$em->persist($match1);

        $match2 = new Match();
        $match2->setDate(new \Datetime("2018-06-15 07:00:00"));
        $match2->setIdSquad1($squadegipto);
        $match2->setIdSquad2($squaduruguay);
        $em->persist($match2);

        $match3 = new Match();
        $match3->setDate(new \Datetime("2018-06-15 10:00:00"));
        $match3->setIdSquad1($squadmarruecos);
        $match3->setIdSquad2($squadiran);
        $em->persist($match3);

        $match4 = new Match();
        $match4->setDate(new \Datetime("2018-06-15 13:00:00"));
        $match4->setIdSquad1($squadportugal);
        $match4->setIdSquad2($squadespaña);
        $em->persist($match4);

        $match5 = new Match();
        $match5->setDate(new \Datetime("2018-06-16 05:00:00"));
        $match5->setIdSquad1($squadfrancia);
        $match5->setIdSquad2($squadaustralia);
        $em->persist($match5);

        $match6 = new Match();
        $match6->setDate(new \Datetime("2018-06-16 08:00:00"));
        $match6->setIdSquad1($squadargentina);
        $match6->setIdSquad2($squadislandia);
        $em->persist($match6);
    	
        $match7 = new Match();
        $match7->setDate(new \Datetime("2018-06-16 11:00:00"));
        $match7->setIdSquad1($squadperu);
        $match7->setIdSquad2($squaddinamarca);
        $em->persist($match7);

        $match8 = new Match();
        $match8->setDate(new \Datetime("2018-06-16 14:00:00"));
        $match8->setIdSquad1($squadcroacia);
        $match8->setIdSquad2($squadnigeria);
        $em->persist($match8);

        $match9 = new Match();
        $match9->setDate(new \Datetime("2018-06-17 07:00:00"));
        $match9->setIdSquad1($squadcostarica);
        $match9->setIdSquad2($squadserbia);
        $em->persist($match9);

        $match10 = new Match();
        $match10->setDate(new \Datetime("2018-06-17 10:00:00"));
        $match10->setIdSquad1($squadalemania);
        $match10->setIdSquad2($squadmexico);
        $em->persist($match10);

        $match11 = new Match();
        $match11->setDate(new \Datetime("2018-06-17 13:00:00"));
        $match11->setIdSquad1($squadbrasil);
        $match11->setIdSquad2($squadsuiza);
        $em->persist($match11);

        $match12 = new Match();
        $match12->setDate(new \Datetime("2018-06-18 07:00:00"));
        $match12->setIdSquad1($squadsuecia);
        $match12->setIdSquad2($squadcoreadelsur);
        $em->persist($match12);

        $match13 = new Match();
        $match13->setDate(new \Datetime("2018-06-18 10:00:00"));
        $match13->setIdSquad1($squadbelgica);
        $match13->setIdSquad2($squadpanama);
        $em->persist($match13);

        $match14 = new Match();
        $match14->setDate(new \Datetime("2018-06-18 13:00:00"));
        $match14->setIdSquad1($squadtunez);
        $match14->setIdSquad2($squadinglaterra);
        $em->persist($match14);

        $match15 = new Match();
        $match15->setDate(new \Datetime("2018-06-19 07:00:00"));
        $match15->setIdSquad1($squadcolombia);
        $match15->setIdSquad2($squadjapon);
        $em->persist($match15);

        $match16 = new Match();
        $match16->setDate(new \Datetime("2018-06-19 10:00:00"));
        $match16->setIdSquad1($squadpolonia);
        $match16->setIdSquad2($squadsenegal);
        $em->persist($match16);

        $match17 = new Match();
        $match17->setDate(new \Datetime("2018-06-19 13:00:00"));
        $match17->setIdSquad1($squadRusia);
        $match17->setIdSquad2($squadegipto);
        $em->persist($match17);

        $match18 = new Match();
        $match18->setDate(new \Datetime("2018-06-20 07:00:00"));
        $match18->setIdSquad1($squadportugal);
        $match18->setIdSquad2($squadmarruecos);
        $em->persist($match18);

        $match19 = new Match();
        $match19->setDate(new \Datetime("2018-06-20 10:00:00"));
        $match19->setIdSquad1($squaduruguay);
        $match19->setIdSquad2($squadarabiasaudita);
        $em->persist($match19);

        $match20 = new Match();
        $match20->setDate(new \Datetime("2018-06-20 13:00:00"));
        $match20->setIdSquad1($squadiran);
        $match20->setIdSquad2($squadespaña);
        $em->persist($match20);

        $match21 = new Match();
        $match21->setDate(new \Datetime("2018-06-21 07:00:00"));
        $match21->setIdSquad1($squaddinamarca);
        $match21->setIdSquad2($squadaustralia);
        $em->persist($match21);

        $match22 = new Match();
        $match22->setDate(new \Datetime("2018-06-21 10:00:00"));
        $match22->setIdSquad1($squadfrancia);
        $match22->setIdSquad2($squadperu);
        $em->persist($match22);

        $match23 = new Match();
        $match23->setDate(new \Datetime("2018-06-21 13:00:00"));
        $match23->setIdSquad1($squadargentina);
        $match23->setIdSquad2($squadcroacia);
        $em->persist($match23);

        $match24 = new Match();
        $match24->setDate(new \Datetime("2018-06-22 07:00:00"));
        $match24->setIdSquad1($squadbrasil);
        $match24->setIdSquad2($squadcostarica);
        $em->persist($match24);

        $match25 = new Match();
        $match25->setDate(new \Datetime("2018-06-22 10:00:00"));
        $match25->setIdSquad1($squadnigeria);
        $match25->setIdSquad2($squadislandia);
        $em->persist($match25);

        $match26 = new Match();
        $match26->setDate(new \Datetime("2018-06-22 13:00:00"));
        $match26->setIdSquad1($squadserbia);
        $match26->setIdSquad2($squadsuiza);
        $em->persist($match26);

        $match27 = new Match();
        $match27->setDate(new \Datetime("2018-06-23 07:00:00"));
        $match27->setIdSquad1($squadbelgica);
        $match27->setIdSquad2($squadtunez);
        $em->persist($match27);

        $match28 = new Match();
        $match28->setDate(new \Datetime("2018-06-23 10:00:00"));
        $match28->setIdSquad1($squadcoreadelsur);
        $match28->setIdSquad2($squadmexico);
        $em->persist($match28);

        $match29 = new Match();
        $match29->setDate(new \Datetime("2018-06-23 13:00:00"));
        $match29->setIdSquad1($squadalemania);
        $match29->setIdSquad2($squadsuecia);
        $em->persist($match29);

        $match30 = new Match();
        $match30->setDate(new \Datetime("2018-06-24 07:00:00"));
        $match30->setIdSquad1($squadinglaterra);
        $match30->setIdSquad2($squadpanama);
        $em->persist($match30);

        $match31 = new Match();
        $match31->setDate(new \Datetime("2018-06-24 10:00:00"));
        $match31->setIdSquad1($squadjapon);
        $match31->setIdSquad2($squadsenegal);
        $em->persist($match31);

        $match32 = new Match();
        $match32->setDate(new \Datetime("2018-06-24 13:00:00"));
        $match32->setIdSquad1($squadpolonia);
        $match32->setIdSquad2($squadcolombia);
        $em->persist($match32);

        $match33 = new Match();
        $match33->setDate(new \Datetime("2018-06-25 09:00:00"));
        $match33->setIdSquad1($squadarabiasaudita);
        $match33->setIdSquad2($squadegipto);
        $em->persist($match33);

        $match34 = new Match();
        $match34->setDate(new \Datetime("2018-06-25 09:00:00"));
        $match34->setIdSquad1($squaduruguay);
        $match34->setIdSquad2($squadRusia);
        $em->persist($match34);

        $match35 = new Match();
        $match35->setDate(new \Datetime("2018-06-25 13:00:00"));
        $match35->setIdSquad1($squadiran);
        $match35->setIdSquad2($squadportugal);
        $em->persist($match35);

        $match36 = new Match();
        $match36->setDate(new \Datetime("2018-06-25 13:00:00"));
        $match36->setIdSquad1($squadespaña);
        $match36->setIdSquad2($squadmarruecos);
        $em->persist($match36);

        $match37 = new Match();
        $match37->setDate(new \Datetime("2018-06-26 09:00:00"));
        $match37->setIdSquad1($squadaustralia);
        $match37->setIdSquad2($squadperu);
        $em->persist($match37);

        $match38 = new Match();
        $match38->setDate(new \Datetime("2018-06-26 09:00:00"));
        $match38->setIdSquad1($squaddinamarca);
        $match38->setIdSquad2($squadfrancia);
        $em->persist($match38);

        $match39 = new Match();
        $match39->setDate(new \Datetime("2018-06-26 13:00:00"));
        $match39->setIdSquad1($squadnigeria);
        $match39->setIdSquad2($squadargentina);
        $em->persist($match39);

        $match40 = new Match();
        $match40->setDate(new \Datetime("2018-06-26 13:00:00"));
        $match40->setIdSquad1($squadislandia);
        $match40->setIdSquad2($squadcroacia);
        $em->persist($match40);

        $match41 = new Match();
        $match41->setDate(new \Datetime("2018-06-27 09:00:00"));
        $match41->setIdSquad1($squadcoreadelsur);
        $match41->setIdSquad2($squadalemania);
        $em->persist($match41);

        $match42 = new Match();
        $match42->setDate(new \Datetime("2018-06-27 09:00:00"));
        $match42->setIdSquad1($squadmexico);
        $match42->setIdSquad2($squadsuecia);
        $em->persist($match42);

        $match43 = new Match();
        $match43->setDate(new \Datetime("2018-06-27 13:00:00"));
        $match43->setIdSquad1($squadsuiza);
        $match43->setIdSquad2($squadcostarica);
        $em->persist($match43);

        $match44 = new Match();
        $match44->setDate(new \Datetime("2018-06-27 13:00:00"));
        $match44->setIdSquad1($squadserbia);
        $match44->setIdSquad2($squadbrasil);
        $em->persist($match44);

        $match45 = new Match();
        $match45->setDate(new \Datetime("2018-06-28 09:00:00"));
        $match45->setIdSquad1($squadsenegal);
        $match45->setIdSquad2($squadcolombia);
        $em->persist($match45);

        $match46 = new Match();
        $match46->setDate(new \Datetime("2018-06-28 09:00:00"));
        $match46->setIdSquad1($squadjapon);
        $match46->setIdSquad2($squadpolonia);
        $em->persist($match46);

        $match47 = new Match();
        $match47->setDate(new \Datetime("2018-06-28 13:00:00"));
        $match47->setIdSquad1($squadinglaterra);
        $match47->setIdSquad2($squadbelgica);
        $em->persist($match47);

        $match48 = new Match();
        $match48->setDate(new \Datetime("2018-06-28 13:00:00"));
        $match48->setIdSquad1($squadpanama);
        $match48->setIdSquad2($squadtunez);
        $em->persist($match48);

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