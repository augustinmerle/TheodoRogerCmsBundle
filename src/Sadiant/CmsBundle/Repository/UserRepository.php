<?php

namespace Sadiant\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{    
    const LANGUAGE_FR = 'fr';
    const LANGUAGE_EN = 'en';

    /**
     * Return available languages
     * 
     * @return array
     * @author Vincent Guillon <vincentg@theodo.fr>
     * @since 2011-06-24
     */
    public static function getAvailableLanguages()
    {
        return array(
            self::LANGUAGE_FR => self::LANGUAGE_FR,
            self::LANGUAGE_EN => self::LANGUAGE_EN,
        );
    }
}
