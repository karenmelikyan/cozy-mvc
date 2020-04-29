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

        $this->db->insert($postData);
    }
}