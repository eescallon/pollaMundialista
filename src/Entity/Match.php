<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", length=30)
     */

    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Score1;

    /**
     * @ORM\Column(type="integer")
     */
    private $Score2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Squad")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSquad1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Squad")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSquad2;

    public function getId()
    {
        return $this->id;
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

    public function getIdSquad1(): ?Squad
    {
        return $this->idSquad1;
    }

    public function setIdSquad1(?Squad $idSquad1): self
    {
        $this->idSquad1 = $idSquad1;

        return $this;
    }

    public function getIdSquad2(): ?Squad
    {
        return $this->idSquad2;
    }

    public function setIdSquad2(?Squad $idSquad2): self
    {
        $this->idSquad2 = $idSquad2;

        return $this;
    }
}
