<?php
namespace DevFighters\Symfony\Database\Type;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

class TinyintType extends IntegerType {

    const TINYINT = 'tinyint'; // Nom unique du type

    public function getName():string {
        return self::TINYINT;
    }
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return 'TINYINT'.(!empty($fieldDeclaration['unsigned']) ? ' UNSIGNED' : '');
    }

    /** Avoid rewriting migrations */
    public function requiresSQLCommentHint(AbstractPlatform $platform) {
        return true;
    }


}
