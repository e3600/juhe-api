<?php

namespace JuheApi\Common;

use JuheApi\BasicService\ServiceContainer;

/**
 * Class Application.
 */
class Application extends ServiceContainer
{
    public function __construct(array $config = [], array $prepends = [], string $id = null)
    {
        parent::__construct($config, '', false);
    }
    
    /**
     * @var array
     */
    protected $providers = [
        'Response' => Response\ServiceProvider::class,
    ];
}
