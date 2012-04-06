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
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Resources;

/**
 * QueryTablesResult
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueryTablesResult
{
    /**
     * @var string 
     */
    private $_nextTableName;
    
    /**
     * @var array
     */
    private $_tables;
    
    /**
     * Creates new QueryTablesResult object
     * 
     * @param array $headers The HTTP response headers
     * @param array $entries The table entriess
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult 
     */
    public static function create($headers, $entries)
    {
        $result  = new QueryTablesResult();
        $headers = Utilities::keysToLower($headers);
        
        $result->setNextTableName(
            Utilities::tryGetValue(
                $headers, Resources::X_MS_CONTINUATION_NEXTTABLENAME
            )
        );
        $result->setTables($entries);
        
        return $result;
    }
    
    /**
     * Gets nextTableName
     * 
     * @return string
     */
    public function getNextTableName()
    {
        return $this->_nextTableName;
    }
    
    /**
     * Sets nextTableName
     * 
     * @param string $nextTableName value
     * 
     * @return none
     */
    public function setNextTableName($nextTableName)
    {
        $this->_nextTableName = $nextTableName;
    }
    
    /**
     * Gets tables
     * 
     * @return array
     */
    public function getTables()
    {
        return $this->_tables;
    }
    
    /**
     * Sets tables
     * 
     * @param array $tables value
     * 
     * @return none
     */
    public function setTables($tables)
    {
        $this->_tables = $tables;
    }
}

?>