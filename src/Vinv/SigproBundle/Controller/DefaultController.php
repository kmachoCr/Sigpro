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
     * @Route("/loginUser", name="loginUser")
     * @Method({"POST"})
     */
    public function loginUserAction() {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();


        $username = $request->request->get('username');
        $password = $request->request->get('password');

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

}
