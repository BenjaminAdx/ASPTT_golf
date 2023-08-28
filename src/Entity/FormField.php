<?php

namespace App\Entity;

use App\Repository\FormFieldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormFieldRepository::class)]
class FormField
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $label1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label2 = null;

    #[ORM\ManyToMany(targetEntity: Form::class, mappedBy: 'fields')]
    private Collection $forms;

    public function __construct()
    {
        $this->forms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLabel1(): ?string
    {
        return $this->label1;
    }

    public function setLabel1(string $label1): static
    {
        $this->label1 = $label1;

        return $this;
    }

    public function getLabel2(): ?string
    {
        return $this->label2;
    }

    public function setLabel2(?string $label2): static
    {
        $this->label2 = $label2;

        return $this;
    }

    /**
     * @return Collection<int, Form>
     */
    public function getForms(): Collection
    {
        return $this->forms;
    }

    public function addForm(Form $form): static
    {
        if (!$this->forms->contains($form)) {
            $this->forms->add($form);
            $form->addField($this);
        }

        return $this;
    }

    public function removeForm(Form $form): static
    {
        if ($this->forms->removeElement($form)) {
            $form->removeField($this);
        }

        return $this;
    }
}
