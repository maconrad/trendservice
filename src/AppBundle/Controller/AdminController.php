<?php


namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request as Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\EntryRepository;
use AppBundle\Entity\Entry;
use AppBundle\Entity\EntryText;
use AppBundle\Form\Type\EntryType;
use Monolog\Logger;

/**
 * Description of AdminController
 *
 * @author mconrad
 */
class AdminController extends Controller {
    
    /**
     * @Route("/admin", name="adminHome")
     */
    public function indexAction()
    {
        return $this->redirectToRoute('homepage');
    }
    
    /**
     * @Route("/admin/entry/edit/{_locale}/{id}", name="adminEditSingleEntry", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function editAction($id, Request $request)
    {
        /* @var $logger Logger */
        $logger = $this->get('logger');
        
        $em = $this->getDoctrine()->getManager();
            
        /* @var $repo EntryRepository */
        $repo = $em->getRepository('AppBundle:Entry');
        /* @var $entry Entry */
        $entry = $repo->findOneById($id);
        
        $form = $this->createForm(new EntryType(),$entry);
        
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            //form processing
        }
        
        if(is_null($entry))
        {
            return new Response("no entry found for".$id);
            //TODO return 404
        }
        else{
            //TODO: Create form class with restrictions and collections
            return $this->render('AppBundle:admin:adminEditSingle.html.twig', array(
                    /*'translations' => $translations,*/
                    'entry' => $entry,
                    'form' => $form->createView(),
                ));
        }
        
    }
    
}
