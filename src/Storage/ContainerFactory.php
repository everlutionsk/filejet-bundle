<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Storage;

use Everlution\FileJet\Config\StorageImpl;

class ContainerFactory
{
    public function createContainer(array $config): StorageContainer
    {
        $configurations = [];
        foreach ($config as $storage) {
            $configurations[$storage['name']] = new StorageImpl(
                $storage['id'],
                $storage['api_key'],
                $storage['public_url']
            );
        }

        return new StorageContainerImpl($configurations);
    }
}
