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
        //TODO Verify if translated
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
    
    /*
     <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <!-- <img src="http://placehold.it/800x500" alt=""> -->
                    {% image '@AppBundle/Resources/public/images/resized_brauhaus2.jpg' %}
                        <img src="{{ asset_url }}" alt="" />
                    {% endimage %}
                    <div class="caption">
                        <h3>{{ icon('glass') }} {{ home.home_brewery }} {# brewery.content #} </h3>
                        <p>Das auf 1600 M.ü.M gelegene Brauhaus mit Blick auf das Bergpanorama rund um Zermatt. Einzigartig.</p>
                        <p>
                            <a href="#" class="btn btn-default">Mehr Informationen</a>
                        </p>
                    </div>
                </div>
            </div> 
     */
    
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
