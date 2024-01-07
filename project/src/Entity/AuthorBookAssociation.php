<?php

namespace App\Entity;

use App\Repository\AuthorBookAssociationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorBookAssociationRepository::class)]
class AuthorBookAssociation
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "Author")]
    #[ORM\JoinColumn(name: "author_id", referencedColumnName: "id")]
    private $author;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "Book")]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "id")]
    private $book;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }
}
