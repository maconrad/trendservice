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
 * @ORM\Table("subEntry")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SubEntryRepository")
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\Translation\SubEntryTranslation")
 */
class SubEntry {
    
    /**
     * @ORM\Id 
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer") 
     */
    private $id;
    
    /**
     * @ORM\Column(name="type", type="string", length=256)
     */
    private $type;
    
    /**
     * Translatabe content 
     * 
     * @Gedmo\Translatable
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    
    /**
     * @ORM\Column(name="contentNoTrans", type="text")
     */
    private $contentNoTrans;
    
    /**
     *
     * @var Entry
     * 
     * @ORM\ManyToOne(targetEntity="Entry", inversedBy="subEntries")
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
     * @return SubEntry
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
     * Set content that is translatable
     *
     * @param string $content
     * @return SubEntry
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content that is translatable
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Set contentNoTrans that is not translatable
     *
     * @param string $contentNoTrans
     * @return SubEntry
     */
    public function setContentNoTrans($contentNoTrans)
    {
        $this->contentNoTrans = contentNoTrans;

        return $this;
    }

    /**
     * Get contentNoTrans that is not translatable
     *
     * @return string 
     */
    public function getContentNoTrans()
    {
        return $this->contentNoTrans;
    }

    /**
     * Set entry
     *
     * @param Entry $entry
     * @return SubEntry
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
