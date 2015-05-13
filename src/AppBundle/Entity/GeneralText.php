<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;

/**
 * Description of GeneralText
 *
 * @author mconrad
 * 
 * @ORM\Table(name="generalText")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GeneralTextRepository")
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\GeneralTextTranslation")
 */
class GeneralText {
    /**
     * @ORM\Id 
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer") 
     */
    private $id;
    
    /**
     * @ORM\Column(name="title", type="string", length=256)
     */
    private $title;
    
    /**
     * @Gedmo\Translatable
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    
     /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
    
}
