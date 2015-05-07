<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraint as Assert;

use AppBundle\Entity\EntryText;

/**
 * Entry 
 *  Can hold any type of entry. General container for data that can
 *  and should be translated
 *
 * @ORM\Table("entry")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\EntryRepository")
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\EntryTranslation")
 */
class Entry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * 
     * @ORM\Column(name="title", type="string", length=255)
     * @Gedmo\Translatable
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Gedmo\Translatable
     */
    private $content;
    
    /**
     * @var string - Defines what type the entry is. An
     *  Example usage would be that we have a type home_thumbnail
     *  so we can use it in twig to only render this part
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagePath", type="string", length=255)
     */
    private $imagePath;

    /**
     * @var string
     *
     * @ORM\Column(name="imageDescription", type="string", length=255)
     * @Gedmo\Translatable
     */
    private $imageDescription;
    
    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="buttonText", type="string", length=255)
     * @Gedmo\Translatable
     */
    private $buttonText;
    
    /**
     *
     * @var EntryText
     * 
     * Holds a collection of additonal text entries.
     * 
     * @ORM\OneToMany(targetEntity="EntryText", mappedBy="entry", fetch="EAGER")
     */
    private $texts;

     /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Entry
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set Type
     *
     * @param string $type
     * @return Entry
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get Type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return Entry
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }
    
    /**
     * Set imageDescription
     *
     * @param string $imageDescription
     * @return Entry
     */
    public function setImageDescription($imageDescription)
    {
        $this->imageDescription = $imageDescription;
        return $this;
    }

    /**
     * Get imageDescription
     *
     * @return string 
     */
    public function getImageDescription()
    {
        return $this->imageDescription;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Entry
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Entry
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set buttonText
     *
     * @param string $buttonText
     * @return Entry
     */
    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    /**
     * Get buttonText
     *
     * @return string 
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }
    
    
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the locale
     * 
     * @param type $locale
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
    
    public function __toString()
    {
        return "ButtonText: " . $this->buttonText .
                "Content: " . $this->content . 
                "Icon: " . $this->icon . 
                "ImageDscr: " . $this->imageDescription . 
                "ImagePath: " . $this->imagePath . 
                "Route: " . $this->route .
                "Title: " . $this->title;
    }
    
    public function __construct() {
        $this->texts = new ArrayCollection();
    }
    

    /**
     * Add texts
     *
     * @param EntryText $texts
     * @return Entry
     */
    public function addText(EntryText $texts)
    {
        $this->texts[] = $texts;

        return $this;
    }

    /**
     * Remove texts
     *
     * @param EntryText $texts
     */
    public function removeText(EntryText $texts)
    {
        $this->texts->removeElement($texts);
    }

    /**
     * Get texts
     *
     * @return Collection 
     */
    public function getTexts()
    {
        return $this->texts;
    }
}
