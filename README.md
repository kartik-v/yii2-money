<h1 align="center">
    <a href="http://demos.krajee.com" title="Krajee Demos" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/krajee-logo-b.png" alt="Krajee Logo"/>
    </a>
    <br>
    yii2-money
    <hr>
    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DTP3NZQ6G2AYU"
       title="Donate via Paypal" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/donate.png" alt="Donate"/>
    </a>
</h1>

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-money/v/stable)](https://packagist.org/packages/kartik-v/yii2-money)
[![License](https://poser.pugx.org/kartik-v/yii2-money/license)](https://packagist.org/packages/kartik-v/yii2-money)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-money/downloads)](https://packagist.org/packages/kartik-v/yii2-money)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-money/d/monthly)](https://packagist.org/packages/kartik-v/yii2-money)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-money/d/daily)](https://packagist.org/packages/kartik-v/yii2-money)

> ### Note
> This extension has been replaced with the [yii2-number](https://github.com/kartik-v/yii2-number) extension since Jan 2018. This extension will not be enhanced further or supported. Recommend to head over to [yii2-number extension docs and demos](http://demos.krajee.com/number) for enhanced number management functionality for Yii2.

An advanced money mask input for Yii Framework 2 based on [jQuery-maskMoney plugin](https://github.com/plentz/jquery-maskmoney). 
The plugin offers a simple way to create masks to your currency form fields. The yii2-money extension includes these additional
enhancements in order to use the maskMoney plugin effectively:

- default styling for Bootstrap 3 and supports Yii Active Field validations
- automatically read a float/decimal and convert it to the money format on field load
- automatically convert back the field to a float/decimal for saving once the mask is changed (maintains an internal hidden field)
- allows global settings of the mask money plugin options via `Yii::$app->params`

### Demo
You can see detailed [documentation](http://demos.krajee.com/money) on usage of the extension.

### Latest Release
The latest version of the extension is release v1.2.2. Refer the [CHANGE LOG](https://github.com/kartik-v/yii2-money/blob/master/CHANGE.md) for details of various releases.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> Note: Check the [composer.json](https://github.com/kartik-v/yii2-money/blob/master/composer.json) for this extension's requirements and dependencies. 
Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-money "dev-master"
```

or add

```
"kartik-v/yii2-money": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Global Settings

You can globally set the plugin options for your money format across the application in the params section of your Yii configuration file. You 
need to set the `maskMoneyOptions` in your Yii application params. For example:

```php
'params' => [
    'maskMoneyOptions' => [
        'prefix' => 'US$ ',
        'suffix' => ' c',
        'affixesStay' => true,
        'thousands' => ',',
        'decimal' => '.',
        'precision' => 2, 
        'allowZero' => false,
        'allowNegative' => false,
    ]
]
```

### Formatter Settings

If you have not setup params like above, the plugin will default the `thousandSeparator` and `decimalSeparator` 
from `Yii::$app->formatter` settings in your configuration file.

```php
'components' => [
    'formatter' => [
        'class' => 'yii\i18n\formatter',
        'thousandSeparator' => ',',
        'decimalSeparator' => '.',
    ]
]
```

### MaskMoney

You can configure the widget as shown below. Any plugin option not passed, will be defaulted from the above two sections (params and formatter).
Note that properties directly set in `pluginOptions` at the widget level as shown below, will override other global settings.

```php
use kartik\money\MaskMoney;
echo MaskMoney::widget([
    'name' => 'currency',
    'value' => 122423.18,
    'pluginOptions' => [
        'prefix' => '$ ',
    ],
]); 
```

## License

**yii2-money** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.