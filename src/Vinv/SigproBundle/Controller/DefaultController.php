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
     * @Route("/home/", name="home")
     * @Template()
     */
    public function indexAction() {
        $session = $this->get('session');
        $user = $session->get('user');

        $userService = $this->get("unit.service");
        $dist = $userService->getProjectsByUnit("115");
        var_dump($dist);
        return array('name' => $user["Nombre"]);
    }

    

    /**
     * @Route("/index/{name}", name="index")
     * @Template()
     */
    public function loginAction($name) {
        $investigador = new Userid();
        $investigador->setNombre($name);

        return array('name' => $investigador->getNombre());
    }

    /**
     * @Route("/loginUser", name="loginUser")
     * @Method({"POST"})
     */
    public function loginUserAction() {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();


        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $investigador = new Userid();

        $userService = $this->get("user.service");
        $user = $userService->getUserByCredentials(array('username' => $username, 'password' => $password));
        $session = $this->get('session');

// set and get session attributes


        if ($user) {
            $session->set('user', $user[0]);
            return $this->redirect($this->generateUrl('home'));
        } else {
            return $this->redirect($this->generateUrl('home'));
        }
    }

}
