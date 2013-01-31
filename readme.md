# FuelPHP Package for SpecifyLocale

This package output the specified locale.


***

## Configuration
1. Copy packages/specifylocale/config/specifylocale.php to under app/config directory.
2. Edit specifylocale.php that copied.

## Enable SpecifyLocale package.
### In app/config/config.php

```
'always_load' => array(
	'packages' => array(
		'specifylocale',
		...
```

or

### In your code
```
Package::load('specifylocale');
```

## Usage

### AcceptLanguage

Outputs a single "SpecifyLocales" or "DefaultLanguage" from the configuration file to get the Agent::languages() of FuelPHP
```
SpecifyLocale::AcceptLanguage()
// result en_US
```

### AcceptLocale

Outputs a single "SpecifyLocales" or "DefaultLocale" from the configuration file to get the Agent::languages() of FuelPHP
```
SpecifyLocale::AcceptLocale()
// result eng
```
