<?php
namespace DevFighters\Symfony\Database\Type;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class MediumintType extends Type {

    const MEDIUMINT = 'mediumint'; // Nom unique du type

    public function getName():string {
        return self::MEDIUMINT;
    }
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return 'MEDIUMINT'.(!empty($fieldDeclaration['unsigned']) ? ' UNSIGNED' : '');
    }
    public function requiresSQLCommentHint(AbstractPlatform $platform) {
        return true;
    }

}
