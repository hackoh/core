<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Core;

/**
 * View class tests
 *
 * @group Core
 * @group View
 */
class Test_View extends TestCase
{

	public function data_provider()
	{
		return array(
			array(
				array('foo' => 'bar', '__data' => 'data'),
			)
		);
	}

	/**
	 * Tests View::render()
	 *
	 * @test
	 */
	public function test_render()
	{
		$test = \View::forge('tests/hello')->render();

		$expected = 'hello!';
		$this->assertEquals($expected, $test);
	}

	/**
	 * Tests View::render()
	 *
	 * @test
	 * @dataProvider data_provider
	 */
	public function test_render_with_data($data)
	{
		$test = \View::forge('tests/foo', $data)->render();

		$expected = 'bar';
		$this->assertEquals($expected, $test);
	}

	/**
	 * Tests View::render()
	 *
	 * @test
	 * @dataProvider data_provider
	 */
	public function test_render_with_data_deep($data)
	{
		$test = \View::forge('tests/deep', $data)->render();

		$expected = 'bar|bar';
		$this->assertEquals($expected, $test);
	}
}
