<?php

namespace Fin\FinanceBundle\Entity;

/**
 * ExpenseItemCategory
 */
class ExpenseItemCategory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $expense_item;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->expense_item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ExpenseItemCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add expenseItem
     *
     * @param \Fin\FinanceBundle\Entity\ExpenseItem $expenseItem
     *
     * @return ExpenseItemCategory
     */
    public function addExpenseItem(\Fin\FinanceBundle\Entity\ExpenseItem $expenseItem)
    {
        $this->expense_item[] = $expenseItem;

        return $this;
    }

    /**
     * Remove expenseItem
     *
     * @param \Fin\FinanceBundle\Entity\ExpenseItem $expenseItem
     */
    public function removeExpenseItem(\Fin\FinanceBundle\Entity\ExpenseItem $expenseItem)
    {
        $this->expense_item->removeElement($expenseItem);
    }

    /**
     * Get expenseItem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExpenseItem()
    {
        return $this->expense_item;
    }
}
