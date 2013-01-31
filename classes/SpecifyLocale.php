<?php

namespace SpecifyLocale;

class SpecifyLocale
{

	protected static $DefaultLanguage = false;

	protected static $DefaultLocale = false;

	protected static $SpecifyLocales = array();

	protected static $Agentlanguages = array();

	/**
	 * Init, config loading.
	 */
	public static function _init()
	{
		\Config::load('specifylocale', true, false, true);
		static::$DefaultLanguage = \Config::get('specifylocale.DefaultLanguage');
		static::$DefaultLocale = \Config::get('specifylocale.DefaultLocale');
		static::$SpecifyLocales = \Config::get('specifylocale.SpecifyLocales');
		static::$Agentlanguages = \Agent::languages();
	}

	/**
	 * Specify Accept Language
	 *
	 * @return string
	 */
	public static function AcceptLanguage()
	{
		$SpecifyLocales = static::getSpecifyLocales();

		$Language = static::$DefaultLanguage;
		foreach (static::$Agentlanguages as $key => $value)
		{
			if ($SpecifyLanguage = \Arr::filter_prefixed(static::getSpecifyLanguages(), $value))
			{
				$Language = array_shift($SpecifyLanguage);
				break;
			}
		}
		return $Language;
	}

	/**
	 * Specify Accept Locale
	 *
	 * @return string
	 */
	public static function AcceptLocale()
	{
		$SpecifyLocales = static::getSpecifyLocales();

		$Locale = static::$DefaultLocale;
		foreach (static::$Agentlanguages as $key => $value)
		{
			if ($SpecifyLocale = \Arr::filter_prefixed(static::$SpecifyLocales, $value))
			{
				$Locale = array_shift($SpecifyLocale);
				break;
			}
		}
		return $Locale;
	}

	/**
	 * Get Specify Languages
	 *
	 * @return array
	 */
	private static function getSpecifyLanguages()
	{
		foreach (static::$SpecifyLocales as $key => $value)
		{
			$Arr[$key] = $key;
		}
		return array_change_key_case($Arr, CASE_LOWER);
	}

	/**
	 * Get Specify Locales
	 *
	 * @return array
	 */
	private static function getSpecifyLocales()
	{
		foreach (array_change_key_case(static::$SpecifyLocales, CASE_LOWER) as $key => $value)
		{
			$Arr[str_replace('_', '-', $key)] = $value;
		}
		return $Arr;
	}

}
