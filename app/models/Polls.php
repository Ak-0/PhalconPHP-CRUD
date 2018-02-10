<?php

class Polls extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="id", type="integer", length=11, nullable=true)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="question", type="string", length=200, nullable=true)
     */
    public $question;

    /**
     *
     * @var integer
     * @Column(column="column_3", type="integer", length=11, nullable=true)
     */
    public $column_3;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("polls");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'polls';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Polls[]|Polls|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Polls|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
