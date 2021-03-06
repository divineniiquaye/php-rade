<?php

declare(strict_types=1);

/*
 * This file is part of DivineNii opensource projects.
 *
 * PHP version 7.4 and above required
 *
 * @author    Divine Niiquaye Ibok <divineibok@gmail.com>
 * @copyright 2019 DivineNii (https://divinenii.com/)
 * @license   https://opensource.org/licenses/BSD-3-Clause License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rade\Event;

use Psr\Http\Message\ResponseInterface;

/**
 * Allows to create a response for a request.
 *
 * Call setResponse() to set the response that will be returned for the
 * current request. The propagation of this event is stopped as soon as a
 * response is set.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class RequestEvent extends KernelEvent
{
    private ?ResponseInterface $response = null;

    /**
     * Returns the response object.
     *
     * @return null|ResponseInterface
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    /**
     * Sets a response and stops event propagation.
     */
    public function setResponse(ResponseInterface $response): void
    {
        $this->response = $response;

        $this->stopPropagation();
    }

    /**
     * Returns whether a response was set.
     *
     * @return bool Whether a response was set
     */
    public function hasResponse(): bool
    {
        return null !== $this->response;
    }

    /**
     * Returns the request type the kernel is currently processing.
     *
     * @return int One of Application::MASTER_REQUEST and Application::SUB_REQUEST
     */
    public function getRequestType(): int
    {
        return $this->getApplication()->getRequestType();
    }

    /**
     * Checks if this is a master request.
     *
     * @return bool True if the request is a master request
     */
    public function isMasterRequest(): bool
    {
        return \Rade\Application::MASTER_REQUEST === $this->getRequestType();
    }
}
