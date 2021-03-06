<?php

namespace OpenCloud\Tests\CloudMonitoring;

use OpenCloud\Tests\OpenCloudTestCase;

class AgentTokenTest extends OpenCloudTestCase
{

    const TOKEN_ID = 'someId';

    public function __construct()
    {
        $this->service = $this->getClient()->cloudMonitoringService('cloudMonitoring', 'DFW', 'publicURL');
        $this->resource = $this->service->resource('AgentToken');
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Agenttoken',
            $this->resource
        );
    }
    
    public function testUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/agent_tokens',
            $this->resource->url()
        );
    }
    
    public function testCollection()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
    }
    
    public function testGet()
    {
        $this->resource->refresh(self::TOKEN_ID);
        
        $this->assertEquals($this->resource->getId(), self::TOKEN_ID);
        $this->assertEquals($this->resource->getLabel(), 'aLabel');
    }
    
}