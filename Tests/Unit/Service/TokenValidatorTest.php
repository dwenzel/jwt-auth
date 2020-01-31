<?php

namespace DWenzel\JwtAuth\Tests\Unit\Service;

use DWenzel\JwtAuth\Service\TokenValidator;
use PHPUnit\Framework\TestCase;

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
 * Class TokenValidatorTest
 */
class TokenValidatorTest extends TestCase
{
    /**
     * @var TokenValidator
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new TokenValidator();
    }

    public function testIsValidReturnsFalseForEmptyToken()
    {
        $token = '';
        $this->assertFalse(
            $this->subject->isValid($token)
        );
    }
}