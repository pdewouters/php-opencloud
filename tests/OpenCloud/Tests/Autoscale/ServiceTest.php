<?php
/**
 * @copyright Copyright 2012-2013 Rackspace US, Inc. 
      See COPYING for licensing information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   1.5.9
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Tests\Autoscale;

use OpenCloud\Tests\OpenCloudTestCase;

class ServiceTest extends OpenCloudTestCase 
{
    
    private $service;
    
    public function __construct()
    {
        $this->service = $this->getClient()->autoscaleService('autoscale', 'DFW', 'publicURL'); 
    }
    
    public function test__construct()
    {
        $this->getClient()->autoscaleService('autoscale', 'DFW');
        $this->assertInstanceOf(
            'OpenCloud\Autoscale\Resource\Group', 
            $this->service->resource('Group')
        );
    }
    
    public function testResources()
    {
        $this->assertNotEmpty($this->service->getResources());
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\UnrecognizedServiceError
     */
    public function testFindingResourceNamespaceFailsIfNotExists()
    {
        $this->service->resource('FooBar');
    }
    
}