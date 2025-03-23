<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: MovieRepository::class)]

class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    #[ORM\Column(length: 255, nullable: false)]
    private $title;
    /**
     * @Assert\NotBlank
     */


    #[ORM\Column(length: 255)]
    private ?string $director = null;

 /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    #[ORM\Column(length: 255, nullable: false)]
    private ?int $RunningTime = null; // Removed the default null value
    /**
     * @Assert\NotBlank
     */


    #[ORM\Column(length: 255, nullable: false)]
    private ?string $reviewer = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $review = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $actor = null;

   
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ImagePath = null;

 





    public function getId(): ?int
    {
        return $this->id;
    }

    public function gettitle(): ?string
    {
        return $this->title;
    }

    public function settitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

   

    public function getRunningTime(): ?int
    {
        return $this->RunningTime;
    }

    public function setRunningTime(?int $RunningTime): self
    {
        $this->RunningTime = $RunningTime;

        return $this;
    }

    public function getReviewer(): ?string
    {
        return $this->reviewer;
    }

    public function setReviewer(?string $reviewer): self
    {
        $this->reviewer = $reviewer;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): self
    {
        $this->review = $review;

        return $this;
    }


    public function getActors(): ?string
{
    return $this->actor;
}


public function setActors(?string $actor): self
{
    $this->actor = $actor;

    return $this;
}

    
    
    public function getImagePath (): ?string
    {
        return $this->ImagePath;
    }

    public function setImagePath (?string $ImagePath ): self
    {
        $this->ImagePath  = $ImagePath ;

        return $this;
    }

}