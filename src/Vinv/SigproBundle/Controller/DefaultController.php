<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Vinv\SigproBundle\Entity\Userid;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller {

    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction() {

        return array('home' => true);
    }

    /**
     * @Route("/home/{name}", name="home")
     * @Template()
     */
    public function loginAction($name) {
        $investigador = new Userid();
        $investigador->setNombre($name);

        return array('name' => $investigador->getNombre());
    }

    /**
     * @Route("/logout", name="logout")
     * @Template()
     */
    public function logoutAction() {
        $session = $this->get('session');

        if ($session->has('user')) {
            $session->clear();
        }
        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @Route("/loginUser", name="loginUser")
     * @Method({"POST"})
     */
    public function loginUserAction() {
        $request = $this->get('request');

        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $type = $request->request->get('type');

        $userService = $this->get("user.service");

        $user = $userService->getUserByCredentials(array('username' => $username, 'password' => $password), $type);

        $session = $this->get('session');

        if ($user) {
            $session->set('user', array("user" => $user[0], "type" => $type));

            switch ($type) {
                case "researcher":
                    return $this->redirect($this->generateUrl('researcher_show', array('id' => $user[0]["Cedula"])));

                case "unit":
                    return $this->redirect($this->generateUrl('unit_show', array('id' => $user[0]["unidad"])));

                case "admin":
                    return $this->redirect($this->generateUrl('researchers', array('page' => 1, 'keyword' => "")));
            }
        } else {
            return $this->redirect($this->generateUrl('index'));
        }
    }

    /**
     * @Route("/search", name="search")
     * @Method({"POST"})
     */
    public function SearchAction() {
        $request = $this->get('request');
        $type = $request->request->get('type', 'units');
        $keyword = $request->request->get('keyword', '');
        $url = "";

        switch ($type) {
            case "unit":
                $url = $this->redirect($this->generateUrl('units', array('page' => 1, 'keyword' => $keyword)));
                break;
            case "project":
                $url = $this->redirect($this->generateUrl('projects', array('page' => 1, 'keyword' => $keyword)));
                break;
            case "researcher":
                $url = $this->redirect($this->generateUrl('researchers', array('page' => 1, 'keyword' => $keyword)));
                break;
            default:
                $url = $this->redirect($this->generateUrl('units', array('page' => 1, 'keyword' => $keyword)));
                break;
        }
        return $url;
    }

    public function login() {


        $adServer = "163.178.174.16";

        $adServer = "ldap.ucr.ac.cr";

        $ldap = ldap_connect($adServer);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $ldaprdn = "uid=" . $_POST['username'] . ",ou=people,o=ucr.ac.cr,o=ucr";

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        echo $ldaprdn;

        $bind = @ldap_bind($ldap, $ldaprdn, $password);
        echo gettype($bind);
        if ($bind) {
            $msg = "Valid email address / password";
            echo $msg;
        } else {
            $msg = "Invalid email address / password";
            echo $msg;
            echo ldap_err2str(ldap_errno());
        }
    }

}
