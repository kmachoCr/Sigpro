<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserRepository extends Controller {


    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getUserByCredentials($credentials) {
        $connection = $this->em->getConnection();
        $user = $credentials['username'];
        $password = md5($credentials['password']);
        $statement = $connection->prepare("SELECT * FROM dbo.userID where login = '$user' and pass = '$password'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

}
