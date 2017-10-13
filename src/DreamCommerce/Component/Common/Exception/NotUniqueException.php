<?php

/*
 * (c) 2017 DreamCommerce
 *
 * @package DreamCommerce\Component\Common
 * @author Michał Korus <michal.korus@dreamcommerce.com>
 * @link https://www.dreamcommerce.com
 */

declare(strict_types=1);

namespace DreamCommerce\Component\Common\Exception;

use Exception;
use Throwable;

class NotUniqueException extends Exception implements ContextInterface
{
    use ContextTrait;

    const CODE_PARAMETER_DEFINED = 10;

    /**
     * @var string
     */
    protected $parameterName;

    /**
     * @param string|null $parameterName
     * @param Throwable $previousException
     * @return NotUniqueException
     */
    public static function forParameter(string $parameterName = null, Throwable $previousException = null): NotUniqueException
    {
        $exception = new static('The parameter must be unique', static::CODE_PARAMETER_DEFINED, $previousException);
        $exception->parameterName = $parameterName;

        return $exception;
    }

    /**
     * @return string|null
     */
    public function getParameterName(): ?string
    {
        return $this->parameterName;
    }
}
