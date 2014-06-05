yii2-money
==========

An advanced money mask input for Yii Framework 2 based on [jQuery-maskMoney plugin](https://github.com/plentz/jquery-maskmoney). 
The plugin offers a simple way to create masks to your currency form fields. The yii2-money extension includes these additional
enhancements in order to use the maskMoney plugin effectively:

- default styling for Bootstrap 3 and supports Yii Active Field validations
- automatically read a float/decimal and convert it to the format on field load
- automatically convert back the field to a float/decimal once the mask is changed
- allows global settings of the mask money plugin options via `Yii::$app->params`

> NOTE: This extension depends on the [kartik-v/yii2-widgets](https://github.com/kartik-v/yii2-widgets) extension which in turn depends on the 
[yiisoft/yii2-bootstrap](https://github.com/yiisoft/yii2/tree/master/extensions/bootstrap) extension. Check the 
[composer.json](https://github.com/kartik-v/yii2-money/blob/master/composer.json) for this extension's requirements and dependencies. 
Note: Yii 2 framework is still in active development, and until a fully stable Yii2 release, your core yii2-bootstrap packages (and its dependencies) 
may be updated when you install or update this extension. You may need to lock your composer package versions for your specific app, and test 
for extension break if you do not wish to auto update dependencies.

### Demo
You can see detailed [documentation](http://demos.krajee.com/money) on usage of the extension.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

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
Note that properties directly set in `pluginOptions` at the widget level below, will override other global settings.

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