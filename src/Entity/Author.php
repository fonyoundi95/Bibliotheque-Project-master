<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uploadImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bibliography;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateImage;

    /**
     * @ORM\OneToMany(targetEntity=Books::class, mappedBy="author")
     */
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function __toString()
    {
        return '' .$this->nomfirstName;
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

    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    public function setImageFile(string $imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getUploadImage(): ?string
    {
        return $this->uploadImage;
    }

    public function setUploadImage(string $uploadImage): self
    {
        $this->uploadImage = $uploadImage;

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

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;

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
