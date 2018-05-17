<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 * @ORM\Table(name="tbmatch")
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score2;

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
        return $this->date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getScore1(): ?int
    {
        return $this->score1;
    }

    public function setScore1(int $Score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->score2;
    }

    public function setScore2(int $Score2): self
    {
        $this->score2 = $score2;

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
