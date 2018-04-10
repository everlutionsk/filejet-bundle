<?php

declare(strict_types=1);

namespace Everlution\FileJetBundle\Twig;

use Everlution\FileJetBundle\Service\UrlProvider;

class UrlProviderExtension extends \Twig_Extension
{
    /** @var UrlProvider */
    private $urlProvider;

    public function __construct(UrlProvider $urlProvider)
    {
        $this->urlProvider = $urlProvider;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'file_url', [$this->urlProvider, 'generateFileUrl']
            )
        ];
    }
}
