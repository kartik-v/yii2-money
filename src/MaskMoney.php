<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package   yii2-money
 * @version   1.2.3
 */

namespace kartik\money;

use kartik\base\InputWidget;
use Yii;
use yii\helpers\Html;

/**
 * MaskMoney is an input widget styled for Bootstrap 3 based on the jQuery-maskMoney plugin, which offers a simple way
 * to create masks to your currency form fields.
 *
 * Usage example:
 *
 * ~~~
 * use kartik\money\MaskMoney;
 * echo MaskMoney::widget([
 *    'name' => 'currency',
 *    'value' => 122423.18,
 *    'pluginOptions' => [
 *        'prefix' => '$ ',
 *    ],
 * ]);
 * ~~~
 *
 * @see    https://github.com/plentz/jquery-maskmoney
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since  1.0
 */
class MaskMoney extends InputWidget
{
    /**
     * @var string the HTML name attribute for the rendered money text input. Will be auto generated if not set.
     */
    public $displayInputName;

    /**
     * @inheritdoc
     */
    public $pluginName = 'maskMoney';

    /**
     * @var array HTML attributes for the displayed input
     */
    private $_displayOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initPluginOptions();
        $this->_displayOptions = $this->options;
        $this->_displayOptions['id'] .= '-disp';
        if (isset($this->_displayOptions['name'])) {
            unset($this->_displayOptions['name']);
        }
        $this->registerAssets();
        $this->renderInput();
    }

    /**
     * Renders a text input for widget display along with an internal hidden input to validate and save the raw number
     * (float) data.
     */
    protected function renderInput()
    {
        $name = isset($this->displayInputName) ? $this->displayInputName : $this->_displayOptions['id'];
        Html::addCssClass($this->_displayOptions, 'form-control');
        $input = Html::textInput($name, $this->value, $this->_displayOptions);
        $input .= $this->hasModel() ?
            Html::activeHiddenInput($this->model, $this->attribute, $this->options) :
            Html::hiddenInput($this->name, $this->value, $this->options);
        echo $input;
    }

    /**
     * Validates app level formatter settings and sets plugin defaults.
     *
     * @param string $paramFrom the property setting in `Yii::$app->formatter`
     * @param string $paramTo   the setting in jQuery-maskMoney [[pluginOptions]]
     */
    protected function setDefaultFormat($paramFrom, $paramTo)
    {
        $formatter = Yii::$app->formatter;
        if (empty($this->pluginOptions[$paramTo]) && !empty($formatter->$paramFrom)) {
            $this->pluginOptions[$paramTo] = $formatter->$paramFrom;
        }
    }

    /**
     * Initializes default plugin options based on global settings as setup in `Yii::$app->params['maskMoneyOptions']`,
     * else defaults the `decimalSeparator` and `thousandSeparator` from `Yii::$app->formatter` settings.
     */
    protected function initPluginOptions()
    {
        if (!empty(Yii::$app->params['maskMoneyOptions'])) {
            $this->pluginOptions += Yii::$app->params['maskMoneyOptions'];
        } else {
            $this->setDefaultFormat('decimalSeparator', 'decimal');
            $this->setDefaultFormat('thousandSeparator', 'thousands');
        }
    }

    /**
     * Registers the client assets for [[MaskMoney]] widget.
     */
    public function registerAssets()
    {
        $view = $this->getView();
        MaskMoneyAsset::register($view);
        $sid = $this->options['id'];
        $id = 'jQuery("#' . $this->_displayOptions['id'] . '")';
        $idSave = 'jQuery("#' . $sid . '")';
        $plugin = $this->pluginName;
        $this->registerPlugin($plugin, $id);
        $debug = YII_DEBUG ? "\n\tconsole.log('Unmasked Output ({$sid}): ' + out);" : '';
        $js = <<< JS
var val = parseFloat({$idSave}.val());
{$id}.{$plugin}('mask', val);
{$id}.on('change keyup', function (e) {
     if (e.type ==='change' || (e.type === 'keyup' && (e.keyCode == 13 || e.which == 13))) {
         var out = {$id}.{$plugin}('unmasked')[0];
        {$idSave}.val(out).trigger('change');{$debug}
     }
});
JS;
        $view->registerJs($js);
    }

}
