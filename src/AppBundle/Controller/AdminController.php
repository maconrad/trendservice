<?php


namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request as Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Entity\EntryRepository;
use AppBundle\Entity\Entry;
use AppBundle\Entity\SubEntry;
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
    public function editEntryAction($id, Request $request)
    {
        /* @var $logger Logger */
        $logger = $this->get('logger');
        
        //Get Entity Manager
        $em = $this->getDoctrine()->getManager();
        /* @var $repo EntryRepository */
        $repo = $em->getRepository('AppBundle:Entry');
        /* @var $entry Entry */
        $entry = $repo->findOneById($id);
        
        if (!$entry) {
            //throw $this->createNotFoundException('No Entry found for id '.$id);
            return new Response("no entry found for".$id);
        }
        
        //Get original subEntries for comparsion
        $originalSubEntries = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($entry->getSubEntries() as $subEntry) {
            $originalSubEntries->add($subEntry);
        }
        
        $form = $this->createForm(new EntryType(),$entry);
        
        //When initialy loading the page handleRequest recognizes thas
        // the form was not submitted and does nothing
        $form->handleRequest($request);
        
        //Is valid returns false if the form was not submitted
        // +asserts are checked
        // TODO Insert Asserts
        if($form->isValid())
        {
             // check if entry does not contain subentry anymore
            foreach ($originalSubEntries as $subEntry) {
                if (false === $entry->getSubEntries()->contains($subEntry)) {
                    // remove subEntry
                    $em->remove($subEntry);
                }
            }
            //Save our changes
            $em->persist($entry);
            $em->flush();

            // redirect back to some edit page
            return $this->redirectToRoute('adminEditSingleEntry', array(
                'id' => $id,
                '_locale' => $request->getLocale(),
            ));
        }
        
        //If we didn't already update the entry, we are going to display it
        //TODO: Create form class with restrictions and collections
        return $this->render('AppBundle:admin:adminEditSingle.html.twig', array(
                /*'translations' => $translations,*/
                'entry' => $entry,
                'form' => $form->createView(),
            ));
    }
    
    /**
     * @Route("/admin/Entry/new", name="adminNewEntry")
     */
    public function newEntryAction(Request $request)
    {
        $entry = new Entry();

        $subEntry1 = new SubEntry();
        
        $entry->getSubEntries()->add($subEntry1);

        $form = $this->createForm(new EntryType(), $entry);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('AppBundle:admin:newEntry.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/admin/generalText/edit/{_locale}/{id}", name="adminEditGeneralText", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function editGeneralTextAction($id, Request $request)
    {
        //TODO
    }
    
    /**
     * @Route("/admin/generalText/new", name="adminNewGeneralText")
     */
    public function newGeneralTextAction(Request $request)
    {
        //TODO
    }
    
}
