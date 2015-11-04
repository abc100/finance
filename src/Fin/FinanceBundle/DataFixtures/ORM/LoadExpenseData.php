<?php

namespace Fin\FinanceBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Fin\FinanceBundle\Entity\Expense;
 
class LoadExpenseData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $first = new Expense();
    $first->setName('Beer with friends');
    $first->setSum(200);
    $first->setDescription('It was very good!');
    $first->setExpenseItem($em->merge($this->getReference('expense-item-beer')));
 
    $second = new Expense();
    $second->setName('Petrol 10 l');
    $second->setSum(180);
    $second->setDescription('OKKO');
    $second->setExpenseItem($em->merge($this->getReference('expense-item-petrol')));
    
    $third = new Expense();
    $third->setName('Mobil Super 2000 1 l');
    $third->setSum(150);
    $third->setDescription('Wrong type of oil');
    $third->setExpenseItem($em->merge($this->getReference('expense-item-motor-oil')));
 
    $fourth = new Expense();
    $fourth->setName('New jeans');
    $fourth->setSum('500');
    $fourth->setExpenseItem($em->merge($this->getReference('expense-item-jeans')));
 
    $em->persist($first);
    $em->persist($second);
    $em->persist($third);
    $em->persist($fourth);
 
    $em->flush();
  }
 
  public function getOrder()
  {
    return 3; // the order in which fixtures will be loaded
  }
}

