<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Person", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPerson;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Points", mappedBy="idUser")
     */
    private $points;

    public function __construct()
    {
        $this->points = new ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Person", cascade={"persist", "remove"})
     */


    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIdPerson(): ?Person
    {
        return $this->idPerson;
    }

    public function setIdPerson(Person $idPerson): self
    {
        $this->idPerson = $idPerson;

        return $this;
    }

    /**
     * @return Collection|Points[]
     */
    public function getPoints(): Collection
    {
        return $this->points;
    }

    public function addPoint(Points $point): self
    {
        if (!$this->points->contains($point)) {
            $this->points[] = $point;
            $point->setIdUser($this);
        }

        return $this;
    }

    public function removePoint(Points $point): self
    {
        if ($this->points->contains($point)) {
            $this->points->removeElement($point);
            // set the owning side to null (unless already changed)
            if ($point->getIdUser() === $this) {
                $point->setIdUser(null);
            }
        }

        return $this;
    }



}
