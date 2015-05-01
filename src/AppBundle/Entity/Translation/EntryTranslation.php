<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;

/**
 * Description of GeneralTextTranslation
 *
 * @author mconrad
 *
 * @ORM\Table(name="entry_translations", indexes={
 *      @ORM\Index(name="entry_translation_idx", columns={"locale", "object_class", "field", "foreign_key"})
 * })
 * @ORM\Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 */
class EntryTranslation extends AbstractTranslation {
    /**
     * All required columns are mapped through inherited superclass
    */
}
