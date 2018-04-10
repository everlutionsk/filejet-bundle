<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Model;

interface File extends \Everlution\FileJet\File
{
    public function getStorageName(): string;
}
