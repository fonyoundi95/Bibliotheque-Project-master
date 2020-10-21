<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="string")
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
    private $livre;

    /**
     * @Vich\UploadableField(mapping="fichier_image", fileNameProperty="livre")
     * @var File
     */
    private $fileAttach;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     */
    private $updateFile;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="livre_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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
        $this->setUpdateFile(new \DateTime('now'));
    }
    
    public function __toString()
    {
        return '' . $this->title;
    }

  
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }
    

    public function setTitle(?string $title): self
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

    public function getLivre(): ?string
    {
        return $this->livre;
    }

    public function setLivre(?string $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    
     /**
      * Undocumented function
      *
      * @return File|null
      */
    public function getFileAttach(): ?File
    {
        return $this->fileAttach;
    }


     /**
      * Undocumented function
      *
      * @param File|null $fileAttach
      * 
      */
    public function setFileAttach(?File $fileAttach = null)
    {
        $this->fileAttach = $fileAttach;

        if(null !== $fileAttach)
        {
            $this->updateFile = new \DateTime();
        }
    }
     /**
      * Undocumented function
      *
      * @return string|null
      */
    public function getImage(): ?string
    {
        return $this->image;
    }
     /**
      * Undocumented function
      *
      * @param string|null $image
      * @return $this
      */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
     /**
      * Undocumented function
      *
      * @return \DateTimeInterface|null
      */
    public function getUpdateFile(): ?\DateTimeInterface
    {
        return $this->updateFile;
    }
     
    /**
      * Undocumented function
      *
      * @param \DateTimeInterface|null $updateFile
      * @return self
      */
     public function setUpdateFile(?\DateTimeInterface $updateFile): self
    {
        $this->updateFile = $updateFile;

        return $this;
    }

     /**
      * Undocumented function
      *
      * @return \DateTimeInterface|null
      */
    public function getUpdateImage(): ?\DateTimeInterface
    {
        return $this->updateImage;
    }

     /**
      * Undocumented function
      *
      * @param \DateTimeInterface|null $updateImage
      * @return self
      */
    public function setUpdateImage(?\DateTimeInterface $updateImage): self
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

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updateImage = new \Datetime();
        }
    }


}
