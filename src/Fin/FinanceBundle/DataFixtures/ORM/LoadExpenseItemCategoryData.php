<?php

namespace Fin\FinanceBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Fin\FinanceBundle\Entity\ExpenseItemCategory;
 
class LoadExpenseItemCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $food = new ExpenseItemCategory();
    $food->setName('Food');
 
    $car = new ExpenseItemCategory();
    $car->setName('Car');
 
    $clothes = new ExpenseItemCategory();
    $clothes->setName('Clothes');
 
    $em->persist($food);
    $em->persist($car);
    $em->persist($clothes);
 
    $em->flush();
 
    $this->addReference('expense-item-category-food', $food);
    $this->addReference('expense-item-category-car', $car);
    $this->addReference('expense-item-category-clothes', $clothes);
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}

