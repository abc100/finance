<?php

namespace Fin\FinanceBundle\Entity;

/**
 * Income
 */
class Income
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
     * @var \Fin\FinanceBundle\Entity\IncomeItem
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
     * @return Income
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
     * @return Income
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
     * @return Income
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
     * @return Income
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
     * @return Income
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
     * @param \Fin\FinanceBundle\Entity\IncomeItem $expenseItem
     *
     * @return Income
     */
    public function setExpenseItem(\Fin\FinanceBundle\Entity\IncomeItem $expenseItem = null)
    {
        $this->expense_item = $expenseItem;

        return $this;
    }

    /**
     * Get expenseItem
     *
     * @return \Fin\FinanceBundle\Entity\IncomeItem
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
