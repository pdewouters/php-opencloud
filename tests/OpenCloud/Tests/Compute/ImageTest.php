<?php
/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 * @author Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Tests\Compute;

use OpenCloud\Compute\Resource\Image;

class ImageTest extends \OpenCloud\Tests\OpenCloudTestCase
{

    private $service;

    public function __construct()
    {
        $this->service = $this->getClient()->computeService('cloudServersOpenStack', 'DFW', 'publicURL');
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function test___construct()
    {
        new Image($this->service, 'XXXXXX');
    }

    public function test_good_image()
    {
        $image = new Image($this->service);
        $this->assertEquals(null, $image->status);
        $this->assertEquals('OpenCloud\Common\Metadata', get_class($image->getMetadata()));
    }

    /**
     * @expectedException \OpenCloud\Common\Exceptions\JsonError
     */
    public function test_bad_json()
    {
        new Image($this->service, 'BADJSON');
    }

    /**
     * @expectedException \OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreate()
    {
        $image = $this->service->image();
        $image->create();
    }

    /**
     * @expectedException \OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdate()
    {
        $image = $this->service->image();
        $image->update();
    }

}
