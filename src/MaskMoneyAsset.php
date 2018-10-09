<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-money
 * @version 1.2.3
 */

namespace kartik\money;

use kartik\base\AssetBundle;

/**
 * Asset bundle for the [[MaskMoney]] widget. Includes client assets from
 * [jQuery-maskMoney](https://github.com/plentz/jquery-maskmoney).
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class MaskMoneyAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/jquery.maskMoney']);
        parent::init();
    }
}
