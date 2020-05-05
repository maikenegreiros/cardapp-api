<?php
namespace Tests\Unit\Model\Entities\Items\Categories;

use PHPUnit\Framework\TestCase;
use Model\Entities\Items\Categories\Category;
use Model\Entities\Items\Categories\Collection as CategoryCollection;

class CategoryTest extends TestCase {

    public function testGetCategoryTitle()
    {
        $title = "Massas";
        $category = new Category($title);

        $this->assertEquals($title, $category->getTitle());
    }

    public function testSetSubcategory()
    {
        $title = "Massas";
        $category = new Category($title);

        $subCategoriesCollection = $this->createStub(CategoryCollection::class);

        $category->setSubCategories($subCategoriesCollection);

        $this->assertEquals($subCategoriesCollection, $category->getSubCategories());
    }

    public function testAddSubcategory()
    {
        $title = "Massas";
        $category = new Category($title);

        $subcategory = new Category("Pizzas");
        $subcategory2 = new Category("Macarrãos");

        $category->addSubCategory($subcategory);
        $category->addSubCategory($subcategory2);

        $this->assertEquals(
            $subcategory->getTitle(),
            $category->getSubCategories()->getAll()[0]->getTitle()
        );
        $this->assertEquals(
            $subcategory2->getTitle(),
            $category->getSubCategories()->getAll()[1]->getTitle()
        );
    }
}
