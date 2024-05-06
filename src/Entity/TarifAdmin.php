<?php

namespace App\Entity;

use App\Repository\TarifAdminRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifAdminRepository::class)]
class TarifAdmin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $offre = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getOffre(): array
    {
        return $this->offre;
    }

    public function setOffre(array $offre): static
    {
        $this->offre = $offre;

        return $this;
    }
}
