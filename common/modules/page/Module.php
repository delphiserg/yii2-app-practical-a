<?php

namespace common\modules\page;

class Module extends \yii\base\Module implements \yii\base\BootstrapInterface
{

    /**
     *
     * @var type 
     */
    public $controllerNamespace = 'common\modules\page\controllers';

    /**
     *
     * @var type 
     */
    public $frontendLayout = '@frontend/views/layouts/main.php';

    /**
     * 
     * @var type 
     */
    public $backendLayout = '@backend/views/layouts/main.php';

    public function init()
    {
        parent::init();
    }

    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
                [
                    'page/<controller:(manage)>' => 'page/<controller>',
                    'page/<id:\w+>' => 'page',
                ]
        );
    }

}
