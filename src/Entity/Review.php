<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $review_at = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    private ?user $user_id = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'review_by')]
    private Collection $review_by;

    public function __construct()
    {
        $this->review_by = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getReviewAt(): ?\DateTimeImmutable
    {
        return $this->review_at;
    }

    public function setReviewAt(\DateTimeImmutable $review_at): static
    {
        $this->review_at = $review_at;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getReviewBy(): Collection
    {
        return $this->review_by;
    }

    public function addReviewBy(user $reviewBy): static
    {
        if (!$this->review_by->contains($reviewBy)) {
            $this->review_by->add($reviewBy);
        }

        return $this;
    }

    public function removeReviewBy(user $reviewBy): static
    {
        $this->review_by->removeElement($reviewBy);

        return $this;
    }
}