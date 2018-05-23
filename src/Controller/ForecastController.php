<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Match;
use App\Entity\Forecast;
use App\Entity\User;

class ForecastController extends Controller
{
	/**
     * @Route("/insert/forecast", name="insertforecast")
     */
    public function insertForecast()
    {
    	$em = $this->getDoctrine()->getManager();
    	$request = Request::createFromGlobals();
        $content = $request->getContent();
        $data = json_decode($content, true);
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $repositoryMatch = $this->getDoctrine()->getRepository(Match::class);
        $match = $repositoryMatch->FindOneBy(["id" => $data["idMatch"]]);
        $user = $repositoryUser->FindOneBy(["id" => $data["idUser"]]);
        $dateNow = new \Datetime();
        print_r($dateNow);
        print_r($match->getDate());
        if($dateNow < $match->getDate())
        {
        	$repositoryForecast = $this->getDoctrine()->getRepository(Forecast::class);
        	$forecast = $repositoryForecast->FindOneBy(["idUser" => $user, "idMatch" => $match]);
        	if($forecast)
        	{
        		$forecast->setScore1($data["score1"]);
        		$forecast->setScore2($data["score2"]);
        		$forecast->setDate(new \Datetime());
        	}
        	else
        	{
        		$newForecast = new Forecast();
        		$newForecast->setScore1($data["score1"]);
        		$newForecast->setScore2($data["score2"]);
        		$newForecast->setDate(new \Datetime());
        		$newForecast->setIdUser($user);
        		$newForecast->setIdMatch($match);
        		$em->persist($newForecast);
        	}
        	$em->flush();
        	return $this->json(array("success" => true, "data" => array("idForecast" => $newForecast->getId())));
        }
        else
        {
            return $this->json(array("success" => false, "message" => "El partido ya comenzo no se puede actualizar"));
        }
	}
}
?>