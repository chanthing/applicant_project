<?php
require_once("./AbstractModel.php");
/*
 * Class that implements a simple contact, with two mutable fields: name and email.
 *
 * Database functionality is provided by the AbstractModel superclass.
 */
Class Contact extends AbstractModel
{

    public function __construct() {
	parent::construct("contacts", ["id" => NULL, "name" => NULL, "email" => NULL], 0);
    }

    public function get_name() {
        return $this->_fieldArray["name"];
    }

    public function set_name($name) {
        $this->_fieldArray["name"] = $name;
    }

    public function get_email() {
        return $this->_fieldArray["email"];
    }

    public function set_email($email) {
        $this->_fieldArray["email"] = $email;
    }



}
