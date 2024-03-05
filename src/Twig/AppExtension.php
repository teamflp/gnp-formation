<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use App\Entity\About;
use App\Entity\AboutCategory;
use App\Entity\Carousel;
use App\Entity\Services;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Doctrine\ORM\EntityManagerInterface;

class AppExtension extends AbstractExtension
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getCarousel', [$this, 'getCarousel']),
            new TwigFunction('getServices', [$this, 'getServices']),
            new TwigFunction('getAbout', [$this, 'getAbout']),
            new TwigFunction('getAboutCategory', [$this, 'getAboutCategory']),
        ];
    }

    public function getCarousel(): array
    {
        return $this->em->getRepository(Carousel::class)->findAll();
    }
    public function getServices(): array
    {
        return $this->em->getRepository(Services::class)->findAll();
    }

    public function getAbout(): array
    {
        return $this->em->getRepository(About::class)->findAll();
    }

    public function getAboutCategory(): array
    {
        return $this->em->getRepository(AboutCategory::class)->findAll();
    }
}
