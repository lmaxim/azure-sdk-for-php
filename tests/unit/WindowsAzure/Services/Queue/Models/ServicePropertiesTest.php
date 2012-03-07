<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use \ServicePropertiesTest;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Services\Queue\Models\Logging;
use PEAR2\WindowsAzure\Services\Queue\Models\Metrics;
use PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties;

/**
 * Unit tests for class ServiceProperties
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicePropertiesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = Logging::create($sample['Logging']);
        $metrics = Metrics::create($sample['Metrics']);
        
        // Test
        $result = ServiceProperties::create($sample);
        
        // Assert
        $this->assertEquals($logging, $result->getLogging());
        $this->assertEquals($metrics, $result->getMetrics());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::setLogging
     */
    public function testSetLogging()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = Logging::create($sample['Logging']);
        $result = new ServiceProperties();
        
        // Test
        $result->setLogging($logging);
        
        // Assert
        $this->assertEquals($logging, $result->getLogging());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::getLogging
     */
    public function testGetLogging()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = Logging::create($sample['Logging']);
        $result = new ServiceProperties();
        $result->setLogging($logging);
        
        // Test
        $actual = $result->getLogging($logging);
        
        // Assert
        $this->assertEquals($logging, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::setMetrics
     */
    public function testSetMetrics()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = Metrics::create($sample['Metrics']);
        $result = new ServiceProperties();
        
        // Test
        $result->setMetrics($metrics);
        
        // Assert
        $this->assertEquals($metrics, $result->getMetrics());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::getMetrics
     */
    public function testGetMetrics()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = Metrics::create($sample['Metrics']);
        $result = new ServiceProperties();
        $result->setMetrics($metrics);
        
        // Test
        $actual = $result->getMetrics($metrics);
        
        // Assert
        $this->assertEquals($metrics, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::toArray
     */
    public function testToArray()
    {
        // Setup
        $properties = ServiceProperties::create(TestResources::getServicePropertiesSample());
        $expected = array(
            'Logging' => $properties->getLogging()->toArray(),
            'Metrics' => $properties->getMetrics()->toArray()
        );
        
        // Test
        $actual = $properties->toArray();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties::toXml
     */
    public function testToXml()
    {
        // Setup
        $properties = ServiceProperties::create(TestResources::getServicePropertiesSample());
        
        // Test
        $actual = $properties->toXml();
        
        // Assert
        $actualParsed = PEAR2\WindowsAzure\Utilities::unserialize($actual);
        $actualProperties = \PEAR2\WindowsAzure\Services\Queue\Models\GetServicePropertiesResult::create($actualParsed);
        $this->assertEquals($actualProperties->getValue(), $properties);
    }
}

?>