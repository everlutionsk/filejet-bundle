<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Storage;

use Everlution\FileJet\Config\Storage;

class StorageContainerImpl implements StorageContainer
{
    /** @var Storage[] */
    private $storages = [];

    public function __construct(array $storages)
    {

        foreach ($storages as $name => $storage) {
            $this->addStorage($name, $storage);
        }
    }

    public function getByName(string $name): Storage
    {
        if (false === array_key_exists($name, $this->storages)) {
            throw new \InvalidArgumentException("Storage with name [$name] does not exist!");
        }

        return $this->storages[$name];
    }

    private function addStorage(string $name, Storage $storage): void
    {
        $this->storages[$name] = $storage;
    }
}
