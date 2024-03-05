<?php

namespace App\Entity;

use App\Repository\CarouselRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarouselRepository::class)]
class Carousel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $sousTitre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/webp"},
     *     maxSize="2048k",
     *     minWidth = 1366,
     *     maxWidth = 1366,
     *     minHeight = 768,
     *     maxHeight = 768,
     *     mimeTypesMessage="L'image doit être au format .jpg, .jpeg ou .webp",
     *     maxSizeMessage="L'image ne doit pas dépasser 2048k",
     *     sizeNotDetectedMessage = "La taille de l'image n'a pas pu être détectée",
     *     minWidthMessage = "La largeur de l'image est trop petite ({{ width }}px). La largeur minimale attendue est de {{ min_width }}px",
     *     maxWidthMessage = "La largeur de l'image est trop grande ({{ width }}px). La largeur maximale attendue est de {{ max_width }}px",
     *     minHeightMessage = "La hauteur de l'image est trop petite ({{ height }}px). La hauteur minimale attendue est de {{ min_height }}px",
     *     maxHeightMessage = "La hauteur de l'image est trop grande ({{ height }}px). La hauteur maximale attendue est de {{ max_height }}px"
     * )
     */
    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $btnInfo = null;

    #[ORM\Column(length: 255)]
    private ?string $btnInscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(string $sousTitre): static
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBtnInfo(): ?string
    {
        return $this->btnInfo;
    }

    public function setBtnInfo(string $btnInfo): static
    {
        $this->btnInfo = $btnInfo;

        return $this;
    }

    public function getBtnInscription(): ?string
    {
        return $this->btnInscription;
    }

    public function setBtnInscription(string $btnInscription): static
    {
        $this->btnInscription = $btnInscription;

        return $this;
    }
}
