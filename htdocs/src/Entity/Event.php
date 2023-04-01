<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Organizer = null;

    #[ORM\Column(length: 255)]
    private ?string $Locationtype = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $StartDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $EndDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Location = null;

    #[ORM\Column]
    private ?int $Price = null;

    #[ORM\Column(nullable: true)]
    private ?int $Capacity = null;

    #[ORM\OneToMany(mappedBy: 'Event', targetEntity: EventTicket::class)]
    private Collection $eventTickets;

    public function __construct()
    {
        $this->eventTickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganizer(): ?User
    {
        return $this->Organizer;
    }

    public function setOrganizer(?User $Organizer): self
    {
        $this->Organizer = $Organizer;

        return $this;
    }

    public function getLocationtype(): ?string
    {
        return $this->Locationtype;
    }

    public function setLocationtype(string $Locationtype): self
    {
        $this->Locationtype = $Locationtype;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(?\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->Capacity;
    }

    public function setCapacity(?int $Capacity): self
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    /**
     * @return Collection<int, EventTicket>
     */
    public function getEventTickets(): Collection
    {
        return $this->eventTickets;
    }

    public function addEventTicket(EventTicket $eventTicket): self
    {
        if (!$this->eventTickets->contains($eventTicket)) {
            $this->eventTickets->add($eventTicket);
            $eventTicket->setEvent($this);
        }

        return $this;
    }

    public function removeEventTicket(EventTicket $eventTicket): self
    {
        if ($this->eventTickets->removeElement($eventTicket)) {
            // set the owning side to null (unless already changed)
            if ($eventTicket->getEvent() === $this) {
                $eventTicket->setEvent(null);
            }
        }

        return $this;
    }
}
