<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PeriodRepository")
 */
class Period
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"period_safe", "for_task"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"period_safe", "for_task"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     * @Groups({"period_safe", "for_task"})
     */
    private $endDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"period_safe", "for_task"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HourlyRate")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"period_safe", "for_task"})
     */
    private $hourlyRate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TransportRate")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"period_safe", "for_task"})
     */
    private $transportRate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="periods")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"period_safe", "for_task"})
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="period")
     * @Groups({"period_safe"})
     */
    private $tasks;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isConfirmed;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHourlyRate(): ?HourlyRate
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(?HourlyRate $hourlyRate): self
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    public function getTransportRate(): ?TransportRate
    {
        return $this->transportRate;
    }

    public function setTransportRate(?TransportRate $transportRate): self
    {
        $this->transportRate = $transportRate;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setPeriod($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getPeriod() === $this) {
                $task->setPeriod(null);
            }
        }

        return $this;
    }

    public function getIsConfirmed(): ?bool
    {
        return $this->isConfirmed;
    }

    public function setIsConfirmed(bool $confirmed): self
    {
        $this->isConfirmed = $confirmed;

        return $this;
    }
}
