<?php

namespace CodexShaper\DBM\Database\Types\Mysql;

use CodexShaper\DBM\Database\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class LongTextType extends Type
{
    const NAME = 'longtext';

    /**
     * Register longtext type.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'longtext';
    }
}
