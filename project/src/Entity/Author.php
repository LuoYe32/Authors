<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "author")]

class Author
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]

    public $id;

    #[ORM\Column(name: "first_name", type: "string", length: 255)]
    #[Assert\NotBlank()]

    public $firstName;

    #[ORM\Column(name: "last_name", type: "string", length: 255)]
    #[Assert\NotBlank()]
    public $lastName;

    #[ORM\Column(name: "middle_name", type: "string", length: 255)]
    #[Assert\NotBlank()]
    public $middleName;

    #[ORM\ManyToMany(targetEntity: "Book", mappedBy: "authors", cascade: ["persist"])]

    public $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    
    
    public function addBook(Book $book)
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->addAuthor($this); // Assuming you have a method like this in the Book entity
        }
        $this->books[] = $book;
        $book->addAuthor($this);

        return $this;
    }
    /**
     * @return Collection|Book[]
     */

    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            $book->removeAuthor($this); // Assuming you have a method like this in the Book entity
        }
        //$this->removeBook($book);
        $book->removeAuthor($this);
        

        return $this;
    }

    // Добавьте геттеры и сеттеры
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return sprintf('%s %s %s', $this->firstName, $this->lastName, $this->middleName);
    }
}