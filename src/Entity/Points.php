<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PointsRepository")
 */
class Points
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */

    private $Point;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="points")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    public function getId()
    {
        return $this->id;
    }


    public function getPoint(): ?int
    {
        return $this->Point;
    }

    public function setPoint(int $Point): self
    {
        $this->Point = $Point;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
