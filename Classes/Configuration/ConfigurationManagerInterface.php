<?php
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

namespace DWenzel\JwtAuth\Configuration;


/**
 * Class ConfigurationManager
 */
interface ConfigurationManagerInterface
{
    public const CONFIGURATION_TYPE_SETTINGS = 'settings';

    public const VALID_CONFIGURATION_TYPES = [
        self::CONFIGURATION_TYPE_SETTINGS
    ];

    /**
     * @param string $type
     * @return array
     */
    public function get(string $type): array;

    /**
     * Sets the configuration.
     * @param string $type Any valid configuration type constant
     * @param array $configuration Configuration array
     */
    public function set(string $type, array $configuration): void;

    /**
     * Returns TRUE if a certain feature, identified by $featureName
     * should be activated
     *
     * @param string $featureName
     * @return bool
     */
    public function isFeatureEnabled($featureName): bool;
}