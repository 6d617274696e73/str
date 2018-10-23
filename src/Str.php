<?php

namespace Tattvika\Str;

class Str
{

	/**
	 * String
	 * 
	 * @var string
	 */
	protected $string;

	/**
	 * Lookup array to translate string in latin characters
	 * 
	 * @var array
	 */
	protected $latin = [
		"lv" => [
			"Ā" => "A", "ā" => "a",
			"Č" => "C", "č" => "c",
			"Ē" => "E", "ē" => "e",
			"Ģ" => "G", "ģ" => "g",
			"Ī" => "I", "ī" => "i",
			"Ķ" => "K", "ķ" => "k",
			"Ļ" => "L", "ļ" => "l",
			"Ņ" => "N", "ņ" => "n",
			"Ō" => "O", "ō" => "o",		
			"Ŗ" => "R", "ŗ" => "r",		
			"Š" => "S", "š" => "s",
			"Ū" => "U", "ū" => "u",
			"Ž" => "Z", "ž" => "z",
		],
	];

	/**
	 * Lookup array to translate string phonetically
	 * 
	 * @var array
	 */
	protected $phonetic = [
		"lv" => [
			"Ā" => "AA", "ā" => "aa",
			"Č" => "CH", "č" => "ch",
			"Ē" => "EE", "ē" => "ee",
			"Ģ" => "GJ", "ģ" => "gj",
			"Ī" => "II", "ī" => "ii",
			"Ķ" => "KJ", "ķ" => "kj",
			"Ļ" => "LJ", "ļ" => "lj",
			"Ņ" => "NJ", "ņ" => "nj",
			"Ō" => "OO", "ō" => "oo",
			"Ŗ" => "RR", "ŗ" => "rr",	
			"Š" => "SH", "š" => "sh",
			"Ū" => "UU", "ū" => "uu",
			"Ž" => "ZH", "ž" => "zh",
		],
	];

    /**
     * Create new string instance
     *
     * @return void
     */
    public function __construct($string)
    {
    	$this->string = $string;
    }

    /**
     * Wrapper for constructor
     * 
     * @param  string
     * @return object
     */
    public static function create($string)
    {
    	return new static($string);
    }

    /**
     * Get string propery
     * 
     * @return string
     */
    public function get()
    {
        return $this->string;
    }

    /**
     * Translates original string to latin characters
     *
     * @param  string $language
     * @return object
     */
    public function latin($language = null)
    {
    	$this->string = $this->replace($this->latin, $language, $this->string);

    	return $this;
    }

    /**
     * Translates original string to phonetic characters
     *
     * @param  string $language
     * @return object
     */
    public function phonetic($language = null)
    {
    	$this->string = $this->replace($this->phonetic, $language,$this->string);
    	
    	return $this;
    }

    /**
     * Create slug from string
     * 
     * @param  string $symbol
     * @return object
     */
    public function slug($symbol = null)
    {
    	// Trim before replace whitespace with $symbol
    	$string = trim($this->string);
    	$symbol = $symbol ?: '-';
    	
    	// Replace all whitespace with $symbol
    	$this->string = preg_replace('/\s+/', $symbol, $string);

    	return $this;
    }

    /**
     * Lowercase string
     * 
     * @return object
     */
    public function lowercase()
    {
    	$this->string = strtolower($this->string);

        return $this;
    }

    /**
     * Uppercase string
     * 
     * @return object
     */
    public function uppercase()
    {
    	$this->string = strtoupper($this->string);

        return $this;
    }

    /**
     * Replace string based on array and language. If language
     * is null it take first key in array.
     * 
     * @param  array $array
     * @param  string $language
     * @param  string $string
     * @return string
     */
    public function replace($array, $language, $string)
    {

    	$array = is_null($language) ? $array[key($array)] : $array[$language];
    	
	$string = str_replace(array_keys($array), array_values($array), $string);

        return $string;
    }

}
