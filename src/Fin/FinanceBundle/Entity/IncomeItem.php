<?php

namespace Fin\FinanceBundle\Entity;

/**
 * IncomeItem
 */
class IncomeItem
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
     * @var \Fin\FinanceBundle\Entity\IncomeItemCategory
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
     * @return IncomeItem
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
     * @param \Fin\FinanceBundle\Entity\IncomeItemCategory $expenseItemCategory
     *
     * @return IncomeItem
     */
    public function setExpenseItemCategory(\Fin\FinanceBundle\Entity\IncomeItemCategory $expenseItemCategory = null)
    {
        $this->expense_item_category = $expenseItemCategory;

        return $this;
    }

    /**
     * Get expenseItemCategory
     *
     * @return \Fin\FinanceBundle\Entity\IncomeItemCategory
     */
    public function getExpenseItemCategory()
    {
        return $this->expense_item_category;
    }
}
