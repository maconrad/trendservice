<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Entry;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * Allows an entry to store any number of additional text fields.
 *  Those fields can further be identified by using the type.
 *  Fields are also translatable.
 *
 * @author mconrad
 * @ORM\Table("entryText")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\EntryTextRepository")
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\EntryTextTranslation")
 */
class EntryText {
    
    /**
     * @ORM\Id 
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer") 
     */
    private $id;
    
    /**
     * @ORM\Column(name="title", type="string", length=256)
     */
    private $type;
    
    /**
     * @Gedmo\Translatable
     * @ORM\Column(name="text", type="text")
     */
    private $text;
    
    /**
     *
     * @var Entry
     * 
     * @ORM\ManyToOne(targetEntity="Entry", inversedBy="texts")
     * @ORM\JoinColumn(name="entry_id", referencedColumnName="id") 
     */
    protected $entry;
    

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
     * Set type
     *
     * @param string $type
     * @return EntryText
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return EntryText
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set entry
     *
     * @param Entry $entry
     * @return EntryText
     */
    public function setEntry(Entry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return Entry 
     */
    public function getEntry()
    {
        return $this->entry;
    }
}
