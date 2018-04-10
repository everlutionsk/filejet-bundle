<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Model;

class FileImpl implements File
{
    /** @var string */
    private $identifier;
    /** @var string */
    private $storageName;
    /** @var null|string */
    private $mutation;

    public function __construct(string $identifier, string $storageName, ?string $mutation)
    {
        $this->identifier = $identifier;
        $this->storageName = $storageName;
        $this->mutation = $mutation;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getStorageName(): string
    {
        return $this->storageName;
    }

    public function getMutation(): ?string
    {
        return $this->mutation;
    }
}
