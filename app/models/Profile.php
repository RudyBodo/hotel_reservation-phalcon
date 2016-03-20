<?php

class Profile extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $birthdate;

    /**
     *
     * @var string
     */
    public $birthplace;

    /**
     *
     * @var string
     */
    public $gender;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initailize()
    {
        $this->belongsTo("user_id", "User", "id");
    }

    public function getSource()
    {
        return 'profile';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Profile[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Profile
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
