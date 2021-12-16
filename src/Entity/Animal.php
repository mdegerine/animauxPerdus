<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="animal")
     */
    private $annonces;

    /**
     * @ORM\ManyToOne(targetEntity=Sexe::class, inversedBy="animals")
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Taille::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=true)
     */
    private $taille;

    /**
     * @ORM\ManyToOne(targetEntity=Identification::class, inversedBy="animals")
     */
    private $identification;

    /**
     * @ORM\ManyToOne(targetEntity=Poils::class, inversedBy="animals")
     */
    private $poils;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAnimal::class, inversedBy="animals")
     */
    private $typeAnimal;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setAnimal($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getAnimal() === $this) {
                $annonce->setAnimal(null);
            }
        }

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->taille;
    }

    public function setTaille(?Taille $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getIdentification(): ?Identification
    {
        return $this->identification;
    }

    public function setIdentification(?Identification $identification): self
    {
        $this->identification = $identification;

        return $this;
    }

    public function getPoils(): ?Poils
    {
        return $this->poils;
    }

    public function setPoils(?Poils $poils): self
    {
        $this->poils = $poils;

        return $this;
    }

    public function getTypeAnimal(): ?TypeAnimal
    {
        return $this->typeAnimal;
    }

    public function setTypeAnimal(?TypeAnimal $typeAnimal): self
    {
        $this->typeAnimal = $typeAnimal;

        return $this;
    }
}
