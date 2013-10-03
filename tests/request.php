<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Core;

/**
 * Request class tests
 *
 * @group Core
 * @group Request
 */
class Test_Request extends TestCase
{
	/**
	 * Tests post parameters
	 */
	public function test_post_parameter()
	{
		$_POST = array(
			'foo' => 'bar'
		);
		$class = 'class Controller_Test1 extends \Controller {public function action_test(){return \Response::forge(Input::post("foo"));}}';
		eval($class);
		$body = \Request::forge('test1/test', null, 'POST')->execute()->response()->body();

		$expects = 'bar';

		$this->assertEquals($expects, $body);
	}

	/**
	 * Tests emulating post parameters
	 */
	public function test_emulate_post_parameter()
	{
		$_POST = array(
			'foo' => 'bar'
		);
		$class = 'class Controller_Test2 extends \Controller {public function action_test(){return \Response::forge(Input::post("foo"));}}';
		eval($class);
		$body = \Request::forge('test2/test', null, 'POST', true)->execute(array('foo' => 'test'))->response()->body();

		$expects = 'test';

		$this->assertEquals($expects, $body);
	}

	/**
	 * Tests get parameters
	 */
	public function test_get_parameter()
	{
		$_GET = array(
			'foo' => 'bar'
		);
		$class = 'class Controller_Test3 extends \Controller {public function action_test(){return \Response::forge(Input::get("foo"));}}';
		eval($class);
		$body = \Request::forge('test3/test', null, 'GET')->execute()->response()->body();

		$expects = 'bar';

		$this->assertEquals($expects, $body);
	}

	/**
	 * Tests emulating get parameters
	 */
	public function test_emulate_get_parameter()
	{
		$_GET = array(
			'foo' => 'bar'
		);
		$class = 'class Controller_Test4 extends \Controller {public function action_test(){return \Response::forge(Input::get("foo"));}}';
		eval($class);
		$body = \Request::forge('test4/test?foo=test', null, 'GET', true)->execute()->response()->body();

		$expects = 'test';

		$this->assertEquals($expects, $body);
	}
}