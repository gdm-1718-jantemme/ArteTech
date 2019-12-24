<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employee;

    /**
     * @ORM\Column(type="date")
     * @Groups({"group1"})
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PauseLength")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"group1"})
     */
    private $pauseLength;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Period", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"group1"})
     */
    private $period;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"group1"})
     */
    private $materialsUsed;

    /**
     * @ORM\Column(type="time")
     */
    private $start_time;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $end_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?User
    {
        return $this->employee;
    }

    public function setEmployee(?User $employee): self
    {
        $this->employee = $employee;

        return $this;
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

    public function getPauseLength(): ?PauseLength
    {
        return $this->pauseLength;
    }

    public function setPauseLength(?PauseLength $pauseLength): self
    {
        $this->pauseLength = $pauseLength;

        return $this;
    }

    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    public function setPeriod(?Period $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getMaterialsUsed(): ?string
    {
        return $this->materialsUsed;
    }

    public function setMaterialsUsed(string $materialsUsed): self
    {
        $this->materialsUsed = $materialsUsed;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(?\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }
}
