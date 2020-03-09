<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptredenRepository")
 */
class Optreden
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $artiest_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $aanvang;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zaal;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxseats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtiestId(): ?int
    {
        return $this->artiest_id;
    }

    public function setArtiestId(int $artiest_id): self
    {
        $this->artiest_id = $artiest_id;

        return $this;
    }

    public function getAanvang(): ?\DateTimeInterface
    {
        return $this->aanvang;
    }

    public function setAanvang(\DateTimeInterface $aanvang): self
    {
        $this->aanvang = $aanvang;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getZaal(): ?string
    {
        return $this->zaal;
    }

    public function setZaal(string $zaal): self
    {
        $this->zaal = $zaal;

        return $this;
    }

    public function getMaxseats(): ?int
    {
        return $this->maxseats;
    }

    public function setMaxseats(int $maxseats): self
    {
        $this->maxseats = $maxseats;

        return $this;
    }
}
