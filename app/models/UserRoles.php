<?php

class UserRoles extends \Phalcon\Mvc\Model
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
    public $role_id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initialize()
    {
     $this->belongsTo("role_id", "Roles", "id");
     $this->belongsTo("user_id", "User", "id");
    }

    public function getSource()
    {
        return 'user_roles';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserRoles[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserRoles
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
