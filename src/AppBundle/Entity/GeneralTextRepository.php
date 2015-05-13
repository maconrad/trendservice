<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of GeneralTextRepository
 *
 * @author mconrad
 */
class GeneralTextRepository extends EntityRepository{
    
     /*
     * Finds all General Texts that start with a specific string
     */
    public function findByTitleStartsWith($startString)
    {
        //get all strings that start with a certain substring
        // by using SQL LIKE statement. %var% -> here we only
        // use var% to make sure they all start with this.
        $query = $this->getEntityManager()
        ->createQuery(
            'SELECT g FROM AppBundle:GeneralText g
            WHERE g.title LIKE :str'
        )->setParameter('str', $startString.'%');
    
        try {
            return $query->getResult();
        } 
        catch (\Doctrine\ORM\NoResultException $e){
            return null;
        } 
    }
    
}
