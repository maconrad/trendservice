<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\GeneralText as GeneralText;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $article = new GeneralText;
        /*
        $article->setTitle('my title in en');
        $article->setContent('my content in en');
        
        $em->persist($article);
        $em->flush();

 
        $article->setTitle('Titel in de');
        $article->setContent('Inhalt in de');
        $article->setTranslatableLocale('de'); // change locale
        $em->persist($article);
        $em->flush();
        */
        
        $article = $em->find('AppBundle\Entity\GeneralText', 1 /*article id*/);
        $repository = $em->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($article);
        
        //$article->setTranslatableLocale('en');
        $em->refresh($article);

        return $this->render('AppBundle::layout.html.twig', array(
            'translations' => $translations,
            'article' => $article,
        ));
        //return $this->render('default/index.html.twig');
    }
}
