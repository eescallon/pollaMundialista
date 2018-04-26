<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SquadRepository")
 */
class Squad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Flag;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Name;

    public function getId()
    {
        return $this->id;
    }

    public function getFlag(): ?string
    {
        return $this->Flag;
    }

    public function setFlag(string $Flag): self
    {
        $this->Flag = $Flag;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }
}
