<?php

namespace DIContainer\tests;

use PHPUnit\Framework\TestCase;
use DIContainer\Reader\SimpleReader;
use DIContainer\Reader\XMLReader;
use DIContainer\Container\Container;
use DIContainer\Mailer\SimpleMailer;

/**
 * Class for check class of objects retrieved from the DI container
 */
class GetInstancesTest extends TestCase
{
	/**
	 * DI container
	 * @var Container
	 */
	protected $container;

	/**
	 * @inheritdoc
	 */
	public function setUp()
	{
		$this->container = new \DIContainer\Container\Container([
			'mailer' => [
				'class' => '\DIContainer\Mailer\SimpleMailer',
				'args' => ['%reader%']
			],
			'html_mailer' => [
				'class' => '\DIContainer\Mailer\HTMLMailer',
				'args' => ['%reader%']
			],
			'reader' => [
				'class' => '\DIContainer\Reader\XMLReader'
			]
		]);
	}

	/**
	 * Test class of a mailer object
	 */
	public function testGetMailer()
	{
		$this->assertInstanceOf(SimpleMailer::class, $this->container->get('mailer'));
	}

	/**
	 * Test class of a reader of a mailer object
	 */
	public function testGetMailerReader()
	{
		$this->assertInstanceOf(XMLReader::class, $this->container->get('mailer')->getReader());
	}

	/**
	 * Test class of a reader object
	 */
	public function testGetReader()
	{
		$this->assertInstanceOf(XMLReader::class, $this->container->get('reader'));
	}

	/**
	 * Test class of a reader object
	 */
	public function testGetReaderAnotherType()
	{
		$this->assertNotInstanceOf(SimpleReader::class, $this->container->get('reader'));
	}
}
