<?php
// src/Entity/Book.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "book")]

class Book
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]

    public $id;

    #[ORM\Column(name: "title", type: "string", length: 255)]
    #[Assert\NotBlank()]
    public $title;

    #[ORM\Column(name: "year", type: "integer")]
    #[Assert\NotBlank()]
    public $year;

    #[ORM\Column(name: "isbn", type: "string", length: 255)]
    #[Assert\NotBlank()]
    public $isbn;

    #[ORM\Column(name: "page_count", type: "integer")]
    #[Assert\NotBlank()]
    public $pageCount;

    
    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: "books", fetch: "EXTRA_LAZY", cascade: ["persist"])]
    
    #[ORM\JoinTable(name: "author_book_association")]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: "author_id", referencedColumnName: "id")]
    public $authors;

   public function __construct()
   {
       $this->authors = new ArrayCollection();
   }

   
    

    public function addAuthor(Author $author)
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
            $author->addBook($this); // Assuming you have a method like this in the Author entity
        }
        // $author->addBook($this); 
        // $this->authors[] = $author;
            

        return $this;
    }

    /**
     * @return Collection|Author[]
     */

    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function removeAuthor(Author $author): self
    {
        if ($this->authors->removeElement($author)) {
            $author->removeBook($this); // Assuming you have a method like this in the Author entity
        }

        return $this;
    }

    // Добавьте геттеры и сеттеры
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return sprintf('%s (%d)', $this->title, $this->year);
    }
}