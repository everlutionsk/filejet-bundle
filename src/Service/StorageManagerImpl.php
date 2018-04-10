<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Service;

use Everlution\FileJet\Management\Deletion;
use Everlution\FileJet\Management\Upload;
use Everlution\FileJet\Management\UploadRequest;
use Everlution\FileJet\Management\UploadResponse;
use Everlution\FileJet\Management\RemoteStorageImpl;
use Everlution\FileJetBundle\Model\File;
use Everlution\FileJetBundle\Storage\StorageContainer;

class StorageManagerImpl implements StorageManager
{
    /** @var StorageContainer */
    private $container;
    /** @var Upload */
    private $upload;
    /** @var Deletion */
    private $deletion;

    public function __construct(StorageContainer $container, Upload $upload, Deletion $deletion)
    {
        $this->container = $container;
        $this->upload = $upload;
        $this->deletion = $deletion;
    }

    public function explicitUpload(UploadRequest $request, string $storageName): UploadResponse
    {
        return $this->upload->explicit($request, $this->toUploadStorage($storageName));
    }

    public function uniqueUpload(UploadRequest $request, string $storageName): UploadResponse
    {
        return $this->upload->unique($request, $this->toUploadStorage($storageName));
    }

    public function delete(File $file): void
    {
        $this->deletion->delete(
            $file->getIdentifier(),
            $this->toUploadStorage($file->getStorageName())
        );
    }

    private function toUploadStorage(string $storageName): RemoteStorageImpl
    {
        $storage = $this->container->getByName($storageName);

        return new RemoteStorageImpl($storage->getId(), $storage->getApiKey());
    }
}
