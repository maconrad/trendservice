<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request as Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\GeneralText as GeneralText;
use Monolog\Logger;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}/home", name="home", requirements={"_locale" = "en|de|fr|nl"})
     */
    public function indexAction($_locale)
    {
        //$locale = $request->getLocale();
        return $this->render('AppBundle:Default:home.html.twig');
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
     * @Route("/app/example", name="homepage")
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

        /*
        $article->setTitle('Titel in de');
        $article->setContent('Inhalt in de');
        $article->setTranslatableLocale('de'); // change locale
        $em->persist($article);
        $em->flush();
        */
        
        $article = $em->find('AppBundle\Entity\GeneralText', 1 /*article id*/);
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
