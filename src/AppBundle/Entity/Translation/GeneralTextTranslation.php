<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;

/**
 * Description of GeneralTextTranslation
 *
 * @author mconrad
 *
 * @ORM\Table(name="generalText_translations", indexes={
 *      @ORM\Index(name="generalText_translation_idx", columns={"locale", "object_class", "field", "foreign_key"})
 * })
 * @ORM\Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 */
class GeneralTextTranslation extends AbstractTranslation
{
    /**
     * All required columns are mapped through inherited superclass
     */
}
