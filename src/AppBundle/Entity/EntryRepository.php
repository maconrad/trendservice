<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EntryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntryRepository extends EntityRepository
{
    
    /*
     * Finds an entry by type including its additional Textes
     *  normally they would be loaded lazily when accessed.
     *  Loads all additonal Textes
     */
    public function findByTypeIncludingEntryTexts($type)
    {
        //join means no lazy loading -> Entry and EntryText are loaded
        // at the same query, no proxy object
        $query = $this->getEntityManager()
        ->createQuery(
            'SELECT e, eT FROM AppBundle:Entry e
            JOIN e.texts eT
            WHERE e.type = :type'
        )->setParameter('type', $type);
    
        try {
            return $query->getResult();
        } 
        catch (\Doctrine\ORM\NoResultException $e){
            return null;
        } 
    }
    
     /*
     * Finds an entry by type including its additional Textes
     *  normally they would be loaded lazily when accessed.
     *  Loads all additonal Textes
     */
    public function findByTypeIncludingEntryTextsBySubtype($type, $subtype)
    {
        //join means no lazy loading -> Entry and EntryText are loaded
        // at the same query, no proxy object
        $query = $this->getEntityManager()
        ->createQuery(
            'SELECT e, eT FROM AppBundle:Entry e
            JOIN e.texts eT
            WHERE e.type = :type AND eT.type = :subtype'
        )->setParameter('type', $type)
         ->setParameter('subtype', $subtype);
    
        try {
            return $query->getResult();
        } 
        catch (\Doctrine\ORM\NoResultException $e){
            return null;
        } 
    }
    
}
