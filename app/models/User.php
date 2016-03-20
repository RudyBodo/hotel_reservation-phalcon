<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $fullname;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var integer
     */
    public $phone_number;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var integer
     */
    public $points;

    /**
     *
     * @var string
     */
    public $created_time;

    /**
     *
     * @var string
     */
    public $lastlogin_time;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public  function initialize()
    {
        $this->hasMany("id", "UserRoles", "user_id" );
        $this->hasMany("id", "Profile", "user_id");
    }

    public function beforeSave()
    {
     $this->created_time = date('Y-m-d H:i:s');
    }

    public function beforeUpdate()
    {
        $this->lastlogin_time = date('Y-m-d H:i:s');
    }

    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
