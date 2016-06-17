<?php

namespace Tattvika\Str\Tests;

use Tattvika\Str\Str;
use PHPUnit_Framework_TestCase as PHPUnit;

class StrTest extends PHPUnit
{
	/** @test */
	public function it_is_init_your_class()
	{
		$str = new Str('Some string');

		$this->assertTrue(true);
	}

	/** @test */
	public function its_translate_chars_to_latin()
	{
		$str = Str::create('Jānis');

		$this->assertEquals('Janis', $str->latin()->get());
		$this->assertEquals('Janis', $str->latin("lv")->get());
	}

	/** @test */
	public function its_translate_chars_to_phonetic()
	{
		$str = Str::create('Jānis');

		$this->assertEquals('Jaanis', $str->phonetic()->get());
		$this->assertEquals('Jaanis', $str->phonetic("lv")->get());
	}

	/** @test */
	public function its_create_slug()
	{
		$str = Str::create('Janis Kalnins');

	    $this->assertEquals('Janis-Kalnins', $str->slug()->get());
	    $this->assertEquals('Janis-Kalnins', $str->slug('-')->get());
	}

	/** @test */
	public function its_trim_before_create_slug()
	{
		$str = Str::create("Janis     Kalnins \n");

	    $this->assertEquals('Janis-Kalnins', $str->slug()->get());
	    $this->assertEquals('Janis-Kalnins', $str->slug('-')->get());
	}

	/** @test */
	public function its_make_lowercase_string()
	{
	    $str = Str::create('Janis Kalnins');

	    $this->assertEquals('janis kalnins', $str->lowercase()->get());
	}

	/** @test */
	public function its_make_uppercase_string()
	{
	    $str = Str::create('Janis Kalnins');

	    $this->assertEquals('JANIS KALNINS', $str->uppercase()->get());
	}

}
