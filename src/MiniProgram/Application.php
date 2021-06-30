<?php

namespace JuheApi\MiniProgram;

use JuheApi\BasicService\ServiceContainer;

/**
 * Class Application.
 */
class Application extends ServiceContainer
{
    // 服务标识
    protected $serverMark = 'MiniProgram';
    
    public function __construct(array $config = [], array $prepends = [], string $id = null)
    {
        parent::__construct($config, $this->serverMark, true);
    }
    
    /**
     * @var array
     */
    protected $providers = [
        'Subscribe' => Subscribe\ServiceProvider::class,
        // 'User'     => User\ServiceProvider::class,
        // 'Menu'     => Menu\ServiceProvider::class,
        // 'Media'    => Media\ServiceProvider::class,
        // 'Qrcode'   => Qrcode\ServiceProvider::class,
        // 'Template' => Template\ServiceProvider::class,
        // 'PayScan'  => PayScan\ServiceProvider::class,
        'Other'    => Other\ServiceProvider::class,
    ];
}
