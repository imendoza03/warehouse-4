<?php

namespace Model;

use Service\DBConnector;

class User {
    
    private $id;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $password;
    protected $connection;
    
    public function __construct(){
        
        try {
            $this->connection = DBConnector::getConnection();
        }catch (\PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
            exit(1);
        }
        
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    
    public static function getUsers($username){
        
        $query = "SELECT * FROM user WHERE user_name = :username";
        
        $statement = $this->connection->prepare($query);
        
        $statement->bindValue("user_name", $username);
        
        $statement->exec($statement);
        
        $records = $this->connection->exec($statement);
        
        $result = '';
        if(!empty($records)){
            foreach ($records as $record) {
                $result = $record;
            }
        }
        
        return $result;
        
    }
}