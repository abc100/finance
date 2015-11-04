<?php

namespace Fin\FinanceBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Fin\FinanceBundle\Entity\ExpenseItem;
 
class LoadExpenseItemData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $beer = new ExpenseItem();
    $beer->setName('Beer');
    $beer->setExpenseItemCategory($em->merge($this->getReference('expense-item-category-food')));
 
    $petrol = new ExpenseItem();
    $petrol->setName('Petrol');
    $petrol->setExpenseItemCategory($em->merge($this->getReference('expense-item-category-car')));
    
    $motor_oil = new ExpenseItem();
    $motor_oil->setName('Motor Oil');
    $motor_oil->setExpenseItemCategory($em->merge($this->getReference('expense-item-category-car')));
 
    $jeans = new ExpenseItem();
    $jeans->setName('Jeans');
    $jeans->setExpenseItemCategory($em->merge($this->getReference('expense-item-category-clothes')));
 
    $em->persist($beer);
    $em->persist($petrol);
    $em->persist($motor_oil);
    $em->persist($jeans);
 
    $em->flush();
 
    $this->addReference('expense-item-beer', $beer);
    $this->addReference('expense-item-petrol', $petrol);
    $this->addReference('expense-item-motor-oil', $motor_oil);
    $this->addReference('expense-item-jeans', $jeans);
  }
 
  public function getOrder()
  {
    return 2; // the order in which fixtures will be loaded
  }
}

