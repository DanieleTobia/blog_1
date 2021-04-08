<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 */
class Blog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank(message="Il titolo non può essere vuoto")
     * @Assert\Length(min=5,max=20)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="La descrizione breve non può essere vuota")
     * @Assert\Length(max=50)
     */
    private $short_description;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Il testo non può essere vuoto")
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default": "default.png"})
     * @Assert\Image(maxSize="100k")
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
