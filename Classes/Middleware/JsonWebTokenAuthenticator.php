<?php

namespace DWenzel\JwtAuth\Middleware;

use DWenzel\JwtAuth\Service\TokenValidatorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2020 Dirk Wenzel
 *  All rights reserved
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the text file GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class JsonWebTokenAuthentication
 */
class JsonWebTokenAuthenticator implements MiddlewareInterface
{
    /**
     * @var TokenValidatorInterface
     */
    protected $validator;

    protected $configuration;

    public function __construct(TokenValidatorInterface $validator = null)
    {
        $this->validator = $validator ?? GeneralUtility::makeInstance(TokenValidatorInterface::class);
    }

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($request->getHeader())
        // TODO: Implement process() method.
    }
}