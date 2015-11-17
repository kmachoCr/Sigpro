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
     * @Route("/home/{name}")
     * @Template()
     */
    public function indexAction($name) {
        return array('name' => $name);
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
        $investigador->setNombre("sasa");
        echo $investigador->getNombre();
        $user = null; //$em->getRepository('VinvSigproBundle:Userid')->getUser(array('username' => $username, 'password' => $password));
        if ($user) {
            $session->set('user', $user);
        } else {
            echo "asasasa";
        }
        
        return $this->redirect($this->generateUrl('index', array('name' => "asasa")));
    }

}
