<?php

    class BaseController
    {
        const VIEW_FOLDER_NAME = './MVC/Views';
        const MODEL_FOLDER_NAME = './MVC/Models';

        protected function View($viewPath, array $data = [])
        {
            $viewPath = self::VIEW_FOLDER_NAME.'/'. str_replace('.','/',$viewPath).'.php';
            return require($viewPath);
        }

        protected function LoadModel($modelPath){
            $modelPath = self::MODEL_FOLDER_NAME.'/'. str_replace('.','/',$modelPath).'.php';
            return require($modelPath);
        }
    }
?>