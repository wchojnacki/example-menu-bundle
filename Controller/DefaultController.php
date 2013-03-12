<?php

namespace Wchojnacki\ExampleMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * Finds and displays a Menu entity.
     *
     * @Route("/text/{slug}", name="frontend_menu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WchojnackiExampleMenuBundle:Menu')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        return array(
            'entity' => $entity
        );
    }
}
