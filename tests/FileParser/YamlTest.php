<?php
namespace Noodlehaus\FileParser\Test;

use Noodlehaus\FileParser\Yaml;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class YamlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Yaml
     */
    protected $yaml;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->yaml = new Yaml();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers                   Noodlehaus\FileParser\Yaml::parse()
     * @expectedException        Noodlehaus\Exception\ParseException
     * @expectedExceptionMessage Error parsing YAML file
     */
    public function testLoadInvalidYaml()
    {
        $this->yaml->parse(__DIR__ . '/../mocks/fail/error.yaml');
    }

    /**
     * @covers Noodlehaus\FileParser\Yaml::parse()
     */
    public function testLoadYaml()
    {
        $actual = $this->yaml->parse(__DIR__ . '/../mocks/pass/config.yaml');
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }

    /**
     * @covers Noodlehaus\FileParser\Yaml::parse()
     */
    public function testLoadYml()
    {
        $actual = $this->yaml->parse(__DIR__ . '/../mocks/pass/config.yml');
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }
}