<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForecastRepository")
 */
class Forecast
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

    private $Score1;

    /**
     * @ORM\Column(type="integer")
     */
    private $Score2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Match")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idMatch;

    public function getId()
    {
        return $this->id;
    }


    public function getScore1(): ?int
    {
        return $this->Score1;
    }

    public function setScore1(int $Score1): self
    {
        $this->Score1 = $Score1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->Score2;
    }

    public function setScore2(int $Score2): self
    {
        $this->Score2 = $Score2;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

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

    public function getIdMatch(): ?Match
    {
        return $this->idMatch;
    }

    public function setIdMatch(?Match $idMatch): self
    {
        $this->idMatch = $idMatch;

        return $this;
    }
}
