<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;

/**
 * Description of EntryTextTranslation
 *
 * @author mconrad
 *
 * @ORM\Table(name="subEntry_translations", indexes={
 *      @ORM\Index(name="subEntry_translation_idx", columns={"locale", "object_class", "field", "foreign_key"})
 * })
 * @ORM\Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 */
class SubEntryTranslation extends AbstractTranslation {
    /**
     * All required columns are mapped through inherited superclass
    */
}