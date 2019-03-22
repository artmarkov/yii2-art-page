<?php

namespace artsoft\page\controllers;

use artsoft\controllers\admin\BaseController;

/**
 * Controller implements the CRUD actions for Page model.
 */
class DefaultController extends BaseController
{
    public $modelClass = 'artsoft\page\models\Page';
    public $modelSearchClass = 'artsoft\page\models\search\PageSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}