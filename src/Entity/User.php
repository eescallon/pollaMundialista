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
     * @ORM\JoinColumn(nullable=true)
     */
    private $idPerson;

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
 


}
