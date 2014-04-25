<?php

namespace Oento\Bundle\TestBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Filesystem\Filesystem;

class DefaultControllerTest extends WebTestCase
{
    public function testHomepage()
    {
        $client = $this->createClient();
        $router = self::$kernel->getContainer()->get('router');
        $router->generate('homepage');

        $crawler = $client->request('GET', $router->generate('homepage'));
        $this->assertTrue($crawler->filter('html:contains("hello")')->count() > 0);
    }

    protected function setUp()
    {
        $fs = new Filesystem();
        $fs->remove(sys_get_temp_dir().'/OentoTestBundle/');
    }

    protected static function createKernel(array $options = array())
    {
        return self::$kernel = new AppKernel(
            isset($options['config']) ? $options['config'] : 'default.yml'
        );
    }

}
