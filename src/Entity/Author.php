<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;



/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 * @Vich\Uploadable
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secondName;


    /**
     * @Vich\UploadableField(mapping="author_image", fileNameProperty="image")
     * @var File
     */
    private $uploadImage;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $image;
    

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bibliography;

    /**
     * @ORM\OneToMany(targetEntity=Books::class, cascade={"all"}, mappedBy="author")
     */
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->updated = new \Datetime('now');
    }

    public function __toString()
    {
        return $this->firstName;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getUploadImage(): ?File
    {
        return $this->uploadImage;
    }

    /**
     * @param File|null $uploadImage
     */
    public function setUploadImage(?File $uploadImage = null)
    {
        $this->uploadImage = $uploadImage;

        if (null !== $uploadImage) {
            $this->updated = new \Datetime();
        }
    }


    /**
     * @return \DateTime|null
     */
    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime|null $updated
     * @return $this
     */
    public function setUpdated(?\DateTime $updated): self
    {
        $this->updated = $updated;
        return $this;
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


    public function getBibliography(): ?string
    {
        return $this->bibliography;
    }

    public function setBibliography(string $bibliography): self
    {
        $this->bibliography = $bibliography;

        return $this;
    }


    /**
     * @return Collection|Books[]
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Books $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
            $book->setAuthor($this);
        }

        return $this;
    }

    public function removeBook(Books $book): self
    {
        if ($this->book->contains($book)) {
            $this->book->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getAuthor() === $this) {
                $book->setAuthor(null);
            }
        }

        return $this;
    }
}
