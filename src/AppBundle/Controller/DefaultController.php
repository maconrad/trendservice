<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request as Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\GeneralText as GeneralText;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

use Monolog\Logger;
use AppBundle\Services\TranslationService;
use AppBundle\Entity\EntryRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $locale = $request->getLocale();
        //somehow this did not work, always had a double slash at the end...
        // unfortunately like this we have no verification
        //return $this->redirectToRoute('home');
        return $this->redirect($locale.'/home');
        //return $this->redirectToRoute('homepage');
    }
    
    /**
     * @Route("/{_locale}/home", name="home", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function indexAction($_locale)
    {
        /* @var $logger Logger */
        $logger = $this->get('logger');
        /* @var $x TranslationService */
        $translator = $this->get('my_translator');
        
        //Fixed parts that need to be translated for this Website
        // those were not worth an entry so we put them into general text
        $shortWords = array("home_brewery", "all_brewery", "hello", "world");
        $transis = $translator->getTranslations($shortWords);
        
        $em = $this->getDoctrine()->getManager();
        $entries = array();
        
        
        /* @var $repo EntryRepository */
        $repo = $em->getRepository('AppBundle:Entry');
        $entries = $repo->findByType('home_thumbnail');
        
        $assoc = $repo->findByTypeIncludingEntryTexts('test_assoc');
        //$assoc = $repo->findByTypeIncludingEntryTextsBySubtype('test_assoc','test_sub_assoc2');
        
        return $this->render('AppBundle:Default:home.html.twig', array(
                /*'translations' => $translations,*/
                /*'brewery' => $brewery,*/
                'home' => $transis,
                'entries' => $entries,
                'assoc' => $assoc,
            ));
    }
    
    /**
     * @Route("/{_locale}/beers", name="beers", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function beerAction($_locale)
    {
        /* @var $logger Logger */
        $logger = $this->get('logger');
        /* @var $x TranslationService */
        $translator = $this->get('my_translator');
        
        //Fixed parts that need to be translated for this Website
        // those were not worth an entry so we put them into general text
        $shortWords = array("hello", "world");
        $transis = $translator->getTranslations($shortWords);
        
        $em = $this->getDoctrine()->getManager();
        $entries = array();
        
        
        /* @var $repo EntryRepository */
        $repo = $em->getRepository('AppBundle:Entry');
        $entries = $repo->findByType('beers_entry');
        
        //$assoc = $repo->findByTypeIncludingEntryTexts('test_assoc');
        //$assoc = $repo->findByTypeIncludingEntryTextsBySubtype('test_assoc','test_sub_assoc2');
        
        return $this->render('AppBundle:Default:beers.html.twig', array(
                /*'translations' => $translations,*/
                /*'brewery' => $brewery,*/
                'generaltranslation' => $transis,
                'entries' => $entries,
                //'assoc' => $assoc,
            ));
    }
    
    /**
     * @Route("/{_locale}/about", name="about", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function aboutAction($_locale)
    {
        //$locale = $request->getLocale();
        
        return $this->render('AppBundle:Default:about.html.twig');
    }
    
    /**
     * @Route("/app/example", name="homepageExample")
     */
    public function indexAction2()
    {
        $em = $this->getDoctrine()->getManager();
        /* @var $logger Logger */
        $logger = $this->get('logger');
        
        $article = new GeneralText;
        $logger->error('An error occurred');
        
        /*
        $article = $em->find('AppBundle\Entity\GeneralText', 1);
        
        $article->setTitle('my title in en');
        $article->setContent('my content in en');
        $article->setTranslatableLocale('en'); // change locale
        $em->persist($article);
        $em->flush();
        */

        
        $article = $em->find('AppBundle\Entity\GeneralText', 2 /*article id*/);
        $article->setTitle('home_brewery');
        $article->setContent('Brewery');
        $article->setTranslatableLocale('en'); // change locale
        $em->persist($article);
        $em->flush();
        
        
        $repository = $em->getRepository('Gedmo\Translatable\Entity\Translation');
        if(!is_null($article))
        {
            $translations = $repository->findTranslations($article);
            $article->setTranslatableLocale('en');
            $em->refresh($article);
            
            return $this->render('AppBundle:Default:layout.html.twig', array(
                'translations' => $translations,
                'article' => $article,
            ));
        }
        else {
            $this->render('default/index.html.twig');
        }
        
    }
}
