<?php
namespace Model\Entities\Items\Categories;

class Category {

    private string $title;
    private Collection $subCategories;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->subCategories = new Collection;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setSubCategories(Collection $categories): self
    {
        $this->subCategories = $categories;
        return $this;
    }

    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(Category $category): self
    {
        $this->subCategories->add($category);
        return $this;
    }
}
