<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
#[ApiResource]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Marque;

    #[ORM\OneToMany(mappedBy: 'voiture', targetEntity: Commentaire::class)]
    private $Commentaires;

    public function __construct()
    {
        $this->Commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->Commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaires->contains($commentaire)) {
            $this->Commentaires[] = $commentaire;
            $commentaire->setVoiture($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getVoiture() === $this) {
                $commentaire->setVoiture(null);
            }
        }

        return $this;
    }
}
