<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Service;

use Everlution\FileJet\FileImpl;
use Everlution\FileJet\Url\UrlProvider as FileJetUrlProvider;
use Everlution\FileJetBundle\Model\File;
use Everlution\FileJetBundle\Storage\StorageContainer;

class UrlProvider
{
    /** @var FileJetUrlProvider */
    private $urlProvider;
    /** @var StorageContainer */
    private $storageContainer;

    public function __construct(FileJetUrlProvider $urlProvider, StorageContainer $storageContainer)
    {
        $this->urlProvider = $urlProvider;
        $this->storageContainer = $storageContainer;
    }

    public function generateFileUrl(File $file, ?string $mutation): string
    {
        $storage = $this->storageContainer->getByName($file->getStorageName());
        $mutations = $this->getMutations($file, $mutation);

        return $this->urlProvider->toUrl(
            new FileImpl($file->getIdentifier(), $mutations),
            $storage
        );
    }

    private function getMutations(File $file, ?string $mutation): string
    {
        $mutations = array_filter(
            [$file->getMutation(), $mutation],
            function (?string $mutation) {
                return false === empty($mutation);
            }
        );

        return implode(',', $mutations);
    }
}
