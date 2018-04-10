<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Storage;

use Everlution\FileJet\Config\Storage;

interface StorageContainer
{
    /**
     * @param string $name
     * @return Storage
     * @throws \InvalidArgumentException
     */
    public function getByName(string $name): Storage;
}
