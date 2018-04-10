<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Service;

use Everlution\FileJet\Management\UploadRequest;
use Everlution\FileJet\Management\UploadResponse;
use Everlution\FileJetBundle\Model\File;

interface StorageManager
{
    public function explicitUpload(UploadRequest $request, string $storageName): UploadResponse;

    public function uniqueUpload(UploadRequest $request, string $storageName): UploadResponse;

    public function delete(File $file): void;
}
