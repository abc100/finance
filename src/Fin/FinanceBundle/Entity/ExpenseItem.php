<?php

namespace Fin\FinanceBundle\Entity;

/**
 * ExpenseItem
 */
class ExpenseItem
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
     * @var \Fin\FinanceBundle\Entity\ExpenseItemCategory
     */
    private $expense_item_category;


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
     * @return ExpenseItem
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
     * Set expenseItemCategory
     *
     * @param \Fin\FinanceBundle\Entity\ExpenseItemCategory $expenseItemCategory
     *
     * @return ExpenseItem
     */
    public function setExpenseItemCategory(\Fin\FinanceBundle\Entity\ExpenseItemCategory $expenseItemCategory = null)
    {
        $this->expense_item_category = $expenseItemCategory;

        return $this;
    }

    /**
     * Get expenseItemCategory
     *
     * @return \Fin\FinanceBundle\Entity\ExpenseItemCategory
     */
    public function getExpenseItemCategory()
    {
        return $this->expense_item_category;
    }
    
    public function __toString() {
        return $this->getName();
    }
}
