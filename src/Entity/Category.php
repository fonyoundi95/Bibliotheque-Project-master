<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @Vich\Uploadable
 */
class Category
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Vich\UploadableField(mapping="cathegory_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     */
    private $image;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateImage;

    /**
     * @ORM\OneToMany(targetEntity=Books::class, cascade={"all"}, mappedBy="category")
     */
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->updateImage = new \DateTime('now');
    
    }
    public function __toString()
    {
        return ''.$this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
    public function setImage(? string $image): self
    {
        $this->image = $image;
        return $this;

    }
    /**
     * Undocumented function
     *
     * @return \DateTime|null
     */
    public function getUpdateImage(): ?\DateTime
    {
        return $this->updateImage;
    }

    /**
     * Undocumented function
     *
     * @param \DateTime|null $updateImage
     * @return $this
     */
    public function setUpdateImage(?\DateTime $updateImage): self
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
            $book->setCategory($this);
        }

        return $this;
    }

    public function removeBook(Books $book): self
    {
        if ($this->book->contains($book)) {
            $this->book->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getCategory() === $this) {
                $book->setCategory(null);
            }
        }

        return $this;
    }

    /**
     *
     * @param File|null $imageFile
     */
    public function setImageFile(? File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
         
            $this->setUpdateImage(new \DateTime());
        }
    }

    /**
     *
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

}
