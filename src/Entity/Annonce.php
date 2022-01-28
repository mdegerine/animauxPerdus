<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository", repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $details;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $nomVille;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $rueQuartier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity=Identification::class, inversedBy="annonces")
     */
    private $identification;

    /**
     * @ORM\ManyToOne(targetEntity=Poils::class, inversedBy="annonces")
     */
    private $poils;

    /**
     * @ORM\ManyToOne(targetEntity=Sexe::class, inversedBy="annonces")
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Taille::class, inversedBy="annonces")
     */
    private $taille;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAnimal::class, inversedBy="annonces")
     */
    private $typeAnimal;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $prenom;


    /**
     * @ORM\ManyToOne(targetEntity=Couleur::class, inversedBy="annonces")
     */
    private $couleur;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="annonce", cascade={"remove"})
     * @ORM\OrderBy({"dateCreation"="DESC"})
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="annonce",cascade={"remove", "persist"})
     */
    private $images;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->commentaires = new ArrayCollection();
        $this->images = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getnomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setnomVille(string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getrueQuartier(): ?string
    {
        return $this->rueQuartier;
    }

    public function setrueQuartier(string $rueQuartier): self
    {
        $this->rueQuartier = $rueQuartier;

        return $this;
    }


    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getTypeAnimal(): ?TypeAnimal
    {
        return $this->typeAnimal;
    }

    public function setTypeAnimal(?TypeAnimal $typeAnimal): self
    {
        $this->typeAnimal = $typeAnimal;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Commentaire|ArrayCollection|Collection
     */
    public function getCommentaires()
    {
       return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setAnnonce($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAnnonce() === $this) {
                $commentaire->setAnnonce(null);
            }
        }

        return $this;
    }
    /**
     * @return Images|ArrayCollection|Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAnnonce($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getAnnonce() === $this) {
                $image->setAnnonce(null);
            }
        }

        return $this;
    }
}
