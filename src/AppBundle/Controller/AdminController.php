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
use AppBundle\Entity\GeneralText;
use AppBundle\Form\Type\EntryType;
use AppBundle\Form\Type\GeneralTextType;
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
        //$logger = $this->get('logger');
        
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
        
        return $this->handleEntry($em, $entry, $originalSubEntries, $request);
    }
    
    /**
     * @Route("/admin/entry/new", name="adminNewEntry")
     */
    public function newEntryAction(Request $request)
    {
        $entry = new Entry();

        //Get Entity Manager
        $em = $this->getDoctrine()->getManager();
        
        //no existing subentries on new entry
        $originalSubEntries = new ArrayCollection();

        return $this->handleEntry($em, $entry, $originalSubEntries, $request);
    }
    
    /**
     * Handles the transmission of the form regardless of update/new
     *  for en Entry
     * 
     * @param DoctrineEntityManager $em
     * @param Entry $entry
     * @param ArrayCollection $originalSubEntries
     * @param Requst $request
     * @return type
     */
    private function handleEntry($em, Entry $entry, ArrayCollection $originalSubEntries, 
            Request $request)
    {
        $form = $this->createForm(new EntryType(),$entry);
        
        //When initialy loading the page handleRequest recognizes thas
        // the form was not submitted and does nothing
        $form->handleRequest($request);
        
        //Is valid returns false if the form was not submitted
        // +asserts are checked
        // TODO Insert Asserts
        if($form->isValid())
        {
            //check if entry does not contain subentry anymore
            // needed when editing an existing entry to update subitems that were removed
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
                'id' => $entry->getId(),
                '_locale' => $request->getLocale(),
            ));
        }
        
        //If we didn't already update the entry, we are going to display it
        //TODO: Create form class with restrictions
        return $this->render('AppBundle:admin:adminEntry.html.twig', array(
                /*'translations' => $translations,*/
                'entry' => $entry,
                'form' => $form->createView(),
            ));
    }
        
    /**
     * @Route("/admin/generalText/edit/{_locale}/{id}", name="adminEditGeneralText", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function editGeneralTextAction($id, Request $request)
    {
        //Param given is not really the id but the title, 
        // but to handle things in a general way with twig its called id
        $title = $id;
        //Get Entity Manager
        $em = $this->getDoctrine()->getManager();
        /* @var $repo EntryRepository */
        $repo = $em->getRepository('AppBundle:GeneralText');
        /* @var $item GeneralText */
        $item = $repo->findOneByTitle($title);
        
        if (!$item) {
            return new Response("no entry found for".$title);
        }
        
        return $this->handleGeneralText($em, $item, $request);
    }
    
    /**
     * @Route("/admin/generalText/new", name="adminNewGeneralText")
     */
    public function newGeneralTextAction(Request $request)
    {
        /* @var $item GeneralText */
        $item = new GeneralText();
        //Get Entity Manager
        $em = $this->getDoctrine()->getManager();
        
        return $this->handleGeneralText($em, $item, $request);
        
    }
    
    /**
     * Handles the transmission of the form regardless of update/new
     *  for a GeneralText
     * 
     * @param DoctrineEntityManager $em
     * @param GeneralText $item
     * @param Request $request
     * @return a Form where we can enter the information for a new GeneralText
     */
    private function handleGeneralText($em, GeneralText $item, Request $request)
    {
        $form = $this->createForm(new GeneralTextType(),$item);
        $form->handleRequest($request);
        if($form->isValid())
        {
            //Save our new item
            $em->persist($item);
            $em->flush();

            // redirect back to some edit page
            return $this->redirectToRoute('adminEditGeneralText', array(
                'id' => $item->getTitle(),
                '_locale' => $request->getLocale(),
            ));
        }
        
        //If we didn't already update the item, we are going to display it
        return $this->render('AppBundle:admin:adminGeneralText.html.twig', array(
                'form' => $form->createView(),
            ));
    }
    
}
