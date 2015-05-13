<?php


namespace AppBundle\Services;

use Monolog\Logger;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\GeneralTextRepository;

/**
 * Description of TranslationHelper
 *
 * @author mconrad
 */
class TranslationService {
    
    /*
     * Logger
     */
    protected $logger;
    
    /*
     * locale to get certain translations
     */
    protected $locale;
    
    /*
     * Request stack object
     */
    protected $requestStack;
    
    /*
     * Entity Manager
     */
    protected $em;

    
    /**
     * Constructor
     *
     * @param Monolog\Logger $logger    Logger instance
     */
    public function __construct(Logger $logger, RequestStack $requestStack,
            EntityManager $entityManager)
    {
        $this->logger       = $logger;
        $this->requestStack = $requestStack;
        $this->em           = $entityManager;
    }

    /**
     * Returns a key-value array in the form of (requestWord - Translation)
     * 
     * Usage: Used for Text that does not really belong to an object but
     *        also needs to be translated in some way.
     * 
     * @param array(string) $shortWords - Input array of strings
     */
    public function getTranslations($shortWords)
    {
        $request = $this->requestStack->getCurrentRequest();
        $locale = $request->getLocale();
       
        $repoText = $this->em->getRepository('AppBundle:GeneralText');
        $repoTrans = $this->em->getRepository('Gedmo\Translatable\Entity\Translation');
        
        $transis = array();
        foreach ($shortWords as $word) {
            
            /* @var $tmp GeneralText */
            $tmp = $repoText->findOneByTitle($word);
            if (!is_null($tmp)) {
                $translations = $repoTrans->findTranslations($tmp);
                $tmp->setTranslatableLocale($locale);
                $transis[$word] = $tmp->getContent();
            }
            else{
                $this->logger->error("'". $word . "' could not be found in DB, no translation");
            }
            
        }
        
        return $transis;
    }
    
    /**
     * Returns a key-value array in the form of (requestWord - Translation)
     * 
     * Usage: Used for Text that does not really belong to an object but
     *        also needs to be translated in some way.
     * 
     * @param string $startsWith - get All strings that start with a certain string
     */
    public function getAllTranslations($startsWith)
    {
        $request = $this->requestStack->getCurrentRequest();
        $locale = $request->getLocale();
       
        /* @var $repoText GeneralTextRepository */
        $repoText = $this->em->getRepository('AppBundle:GeneralText');
        $repoTrans = $this->em->getRepository('Gedmo\Translatable\Entity\Translation');
        
        $transis = array();
        
        /* @var $generalTexts GeneralText */
        $generalTexts = $repoText->findByTitleStartsWith($startsWith);
        
        foreach ($generalTexts as $generalText) {
            
            if (!is_null($generalText)) {
                $translations = $repoTrans->findTranslations($generalText);
                $generalText->setTranslatableLocale($locale);
                $transis[$generalText->getTitle()] = $generalText->getContent();
            }
            else{
                $this->logger->error("'". $word . "' could not be found in DB, no translation");
            }
            
        }
        
        return $transis;
    }
    
}
