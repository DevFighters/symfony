<?php
namespace DevFighters\Symfony\Database\Type;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

class MediumintType extends IntegerType {

    const MEDIUMINT = 'mediumint'; // Nom unique du type

    public function getName():string {
        return self::MEDIUMINT;
    }
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        $return = ($platform->getSmallIntTypeDeclarationSQL($fieldDeclaration));
        return ( str_replace ('SMALLINT','MEDIUMINT' ,$return));
    }

    /** Avoid rewriting migrations */
    public function requiresSQLCommentHint(AbstractPlatform $platform) {
        return true;
    }

}
