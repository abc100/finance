<?php

namespace Fin\FinanceBundle\Entity;

/**
 * Expense
 */
class Expense
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
     * @var string
     */
    private $sum;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Fin\FinanceBundle\Entity\ExpenseItem
     */
    private $expense_item;


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
     * @return Expense
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
     * Set sum
     *
     * @param string $sum
     *
     * @return Expense
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return string
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Expense
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Expense
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Expense
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set expenseItem
     *
     * @param \Fin\FinanceBundle\Entity\ExpenseItem $expenseItem
     *
     * @return Expense
     */
    public function setExpenseItem(\Fin\FinanceBundle\Entity\ExpenseItem $expenseItem = null)
    {
        $this->expense_item = $expenseItem;

        return $this;
    }

    /**
     * Get expenseItem
     *
     * @return \Fin\FinanceBundle\Entity\ExpenseItem
     */
    public function getExpenseItem()
    {
        return $this->expense_item;
    }
    
    public function setCreatedAtValue() {
        if(!$this->getCreatedAt()) {
            $this->created_at = new \DateTime();
        }
    }
    
    public function setUpdatedAtValue() {
        $this->updated_at = new \DateTime();
    }
}
