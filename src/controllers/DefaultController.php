<?php

namespace fonclub\ocmodulegenerator\controllers;

use fonclub\ocmodulegenerator\models\Generator;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Class DefaultController
 * @author fonclub
 * @created 10.10.2018
 * @package fonclub\ocmodulegenerator\controllers
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     *
     * @return string
     * @throws HttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        $model = new Generator();
        if (\Yii::$app->getRequest()->isPost) {
            $model->load(\Yii::$app->request->post());

            $className = ucfirst($model->name);

            if (stristr($model->name, "_")) {
                $className = '';
                $names     = explode("_", $model->name);
                foreach ($names as $name) {
                    $className .= ucfirst($name);
                }
            }

            $dir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'oc'
                .$model->version.DIRECTORY_SEPARATOR;

            $files = $model->getDirContents($dir);

            foreach ($files as $file) {
                $tmpPath = explode('oc'.$model->version.DIRECTORY_SEPARATOR, $file);

                if (isset($tmpPath[1])) {
                    $path = explode(DIRECTORY_SEPARATOR, $tmpPath[1]);

                    list($fileName, $ext) = explode(".", end($path));

                    $fileName = $model->name.'.'.$ext;

                    foreach ($path as $k => $v) {
                        if ($k == (count($path) - 1)) {
                            unset($path[$k]);
                        }
                    }

                    $path     = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR
                        .$model->name.' oc'.$model->version.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $path);
                    $filePath = $path.DIRECTORY_SEPARATOR.$fileName;

                    $content = $model->renderModuleFile($file,
                        [
                            'moduleName'      => $model->name,
                            'moduleClassName' => $className,
                            'created'         => date("d.m.Y H:i"),
                            'author'          => $model->author,
                            'moduleTitle'     => $model->title,
                        ]
                    );

                    $dirExist = is_dir($path);

                    if(!$dirExist) {
                        $mask   = @umask(0);
                        $dirExist = @mkdir($path, 0755, true);
                        @umask($mask);
                    }

                    if ( ! $dirExist) {
                        \Yii::$app->getSession()->setFlash('error', "Unable to create the directory '$path'.");

                        return $this->redirect(\Yii::$app->getRequest()->getUrl());
                    }

                    if (@file_put_contents($filePath, $content) === false) {
                        \Yii::$app->getSession()->setFlash('error', "Unable to write the file '{$this->path}'.");

                        return $this->redirect(\Yii::$app->getRequest()->getUrl());
                    } else {
                        $mask = @umask(0);
                        @chmod($filePath, 0644);
                        @umask($mask);
                    }
                }
            }

            $modulePath = str_replace('controllers', '', __DIR__) . DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.$model->name.' oc'.$model->version;
            \Yii::$app->getSession()->setFlash('success', "Success, module here - {$modulePath}");

            return $this->redirect(\Yii::$app->getRequest()->getUrl());
        }

        return $this->render('index', ['model' => $model]);
    }
}
