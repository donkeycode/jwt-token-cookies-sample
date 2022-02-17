<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource(
    attributes: ["security" => "is_granted('ROLE_USER')"],
    collectionOperations: [
        "get",
        "post" => ["security" => "is_granted('ROLE_ADMIN')"],
        // "post" => [ "security_post_denormalize" => "is_granted('BOOK_CREATE', object)" ],
    ],
    itemOperations: [
        "get",
        "delete",
        "put" => [ "security" => "is_granted('ROLE_ADMIN') or object.getOwner().getId() == user.getId()" ],

    //     "get" => [ "security" => "is_granted('BOOK_READ', object)" ],
    //     "put" => [ "security" => "is_granted('BOOK_EDIT', object)" ],
    //     "delete" => [ "security" => "is_granted('BOOK_DELETE', object)" ],
    ],
)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $owner;

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

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
