<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfPage;

   
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publishingHouse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileAttach;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;


    /**
     * @ORM\Column(type="datetime")
     */
    private $updateFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateImage;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="book", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="book")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="book")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }
    
    public function __toString()
    {
        return '' . $this->title;
    }

  
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?int
    {
        return $this->title;
    }
    

    public function setTitle(int $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNumberOfPage(): ?int
    {
        return $this->numberOfPage;
    }

    public function setNumberOfPage(int $numberOfPage): self
    {
        $this->numberOfPage = $numberOfPage;

        return $this;
    }

    public function getPublishingHouse(): ?string
    {
        return $this->publishingHouse;
    }

    public function setPublishingHouse(string $publishingHouse): self
    {
        $this->publishingHouse = $publishingHouse;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(string $Resume): self
    {
        $this->Resume = $Resume;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getFileAttach(): ?string
    {
        return $this->fileAttach;
    }

    public function setFileAttach(string $fileAttach): self
    {
        $this->fileAttach = $fileAttach;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUpdateFile(): ?\DateTimeInterface
    {
        return $this->updateFile;
    }

    public function setUpdateFile(\DateTimeInterface $updateFile): self
    {
        $this->updateFile = $updateFile;

        return $this;
    }

    public function getUpdateImage(): ?\DateTimeInterface
    {
        return $this->updateImage;
    }

    public function setUpdateImage(\DateTimeInterface $updateImage): self
    {
        $this->updateImage = $updateImage;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setBook($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getBook() === $this) {
                $comment->setBook(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }


}
