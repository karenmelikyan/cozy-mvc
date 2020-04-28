<?php


class UserModel
{
    private $db;

    /**
     * UserModel constructor.
     */
    public function __construct()
    {
        $this->db = new DBModel('users');
    }

    /**
     * @param array $postData
     * @return string
     */
    public function signUp(array $postData)
    {
        /** password hashing before save data */
        $postData['password'] = password_hash($postData['password'], PASSWORD_DEFAULT);

        /**save data, turn on SESSION,and
        do redirect to other app part */
        $this->db->insert($postData);

    }
}