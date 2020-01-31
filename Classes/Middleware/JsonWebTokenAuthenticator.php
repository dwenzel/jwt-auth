<?php

namespace DWenzel\JwtAuth\Middleware;

use DWenzel\JwtAuth\Configuration\ConfigurationManager;
use DWenzel\JwtAuth\Configuration\ConfigurationManagerInterface;
use DWenzel\JwtAuth\Configuration\SettingsInterface;
use DWenzel\JwtAuth\Service\TokenValidator;
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

    public function __construct(ConfigurationManagerInterface $configurationManager = null, TokenValidatorInterface $validator = null)
    {
        $this->validator = $validator ?? GeneralUtility::makeInstance(TokenValidator::class);
        $configurationManager = $configurationManager ?? GeneralUtility::makeInstance(ConfigurationManager::class);
        $this->configuration = $configurationManager->get(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
    }

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $this->extractToken($request);
        if (!$this->validator->isValid($token)){
            return $handler->handle($request);
        }

        // TODO: token is valid: extract user and claims and add
    }

    /**
     * @param ServerRequestInterface $request
     * @return string
     */
    protected function extractToken(ServerRequestInterface $request): string
    {
        // read authorization headers
        $headerName = $this->configuration[SettingsInterface::KEY_HEADER_NAME] ?? SettingsInterface::DEFAULT_AUTHORIZATION_HEADER;
        $headers = $request->getHeader($headerName);

        if (empty($headers)) {
            return '';
        }

        return $this->parseHeaders($headers);
    }

    /**
     * Parses an array of headers
     *
     * @param array $headers
     * @return mixed|string
     */
    protected function parseHeaders(array $headers)
    {
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }

        return '';
    }
}