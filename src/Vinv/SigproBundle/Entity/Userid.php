<?php

namespace Vinv\SigproBundle\Entity;


/**
 * Userid
 */
class Userid {

    private $iduser;
    private $login;
    private $pass;
    private $nombre;
    private $cedula;
    private $roleid;
    private $email;
    private $sobrenombre;

    function __construct() {
        
    }

    function getIduser() {
        return $this->iduser;
    }

    function getLogin() {
        return $this->login;
    }

    function getPass() {
        return $this->pass;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getRoleid() {
        return $this->roleid;
    }

    function getEmail() {
        return $this->email;
    }

    function getSobrenombre() {
        return $this->sobrenombre;
    }

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setRoleid($roleid) {
        $this->roleid = $roleid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSobrenombre($sobrenombre) {
        $this->sobrenombre = $sobrenombre;
    }

}
