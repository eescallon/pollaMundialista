<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Points;

class PointsController extends Controller
{
	/**
     * @Route("/positions", name="positions")
     */
	public function getPositions()
	{
		$pointRepo = $this->getDoctrine()->getRepository(Points::class);
		$points = $pointRepo->findPositions();
		$array = array();
		foreach($points as $point)
		{
			$temp = array();
			$temp["id"] = $point->getId();
			$temp["points"] = $point->getPoint();
			$user = $point->getIdUser();
			$person = $user->getIdPerson();
			$arrayPerson = array();
			$arrayPerson["id"] = $person->getId();
			$arrayPerson["name"] = $person->getName();
			$arrayPerson["lastName"] = $person->getLastname();
			$temp["person"] = $arrayPerson;
			$array[] = $temp;
		}

		return $this->json(array("success" => true, "data" => $array));
	}
}
?>