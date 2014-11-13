<?php
class DesignHelper
{
    private $_jsHeader = array();
    private $_jsFooter = array();
    private $_less = array(
        'style.less'
    );

    /**
     * @var DesignHelper
     */
    private static $_o;

    private $_srcDir = '/design/src';
    private $_compiledDir = '/assets/compiled';

    private function __construct()
    {
        /**
         * @var CWebApplication $app
         */
        $app = Yii::app();
        $app->clientScript->registerCoreScript('jquery');
    }

    private function __clone()
    {}

    private function __wakeup()
    {}

    public static function o()
    {
        if (is_null(self::$_o)) {
            self::$_o = new DesignHelper();
        }

        return self::$_o;
    }

    public function addJsHeader($file)
    {
        if (!in_array($file, $this->_jsHeader)) {
            $this->_jsHeader[] = $file;
        }

        return $this;
    }

    public function addJsFooter($file)
    {
        if (!in_array($file, $this->_jsFooter)) {
            $this->_jsFooter[] = $file;
        }

        return $this;
    }

    public function addLess($file)
    {
        if (!in_array($file, $this->_less)) {
            $this->_less[] = $file;
        }

        return $this;
    }

    public function getJsHeaderFile()
    {
        return $this->_makeJs('header', $this->_jsHeader);
    }

    public function getJsFooterFile()
    {
        return $this->_makeJs('footer', $this->_jsFooter);
    }

    private function _makeJs($prefix, $files = array())
    {
        if (empty($files)) {
            return false;
        }

        if (!file_exists(Yii::app()->basePath . '/../' . $this->_compiledDir)) {
            mkdir(Yii::app()->basePath . '/../' . $this->_compiledDir, 0777, true);
            chmod(Yii::app()->basePath . '/../' . $this->_compiledDir, 0777);
        }
        $resultFilename = $prefix . '-' . md5(json_encode($files)) . '.js';
        if (file_exists(Yii::app()->basePath . '/..' . $this->_compiledDir . '/' . $resultFilename) && !Yii::app()->params['debug']) {
            return $resultFilename;
        }

        $errors = array();
        $jsCode = '// Built ' . date('Y-m-d H:i:s') . PHP_EOL;
        foreach ($files as $file) {
            $filePath = Yii::app()->basePath . '/../' . $this->_srcDir . '/js/' . $file;

            if (!file_exists($filePath)) {
                $errors[] = $file . ' not found!';
            } else {
                $jsCode .= '// ' . $file . PHP_EOL . file_get_contents($filePath) . PHP_EOL . PHP_EOL;
            }
        }

        if (!empty($errors)) {
            $errorComment = '// Errors: ' . PHP_EOL;

            foreach ($errors as $error) {
                $errorComment .= '// ' . $error . PHP_EOL;
            }

            $jsCode = $errorComment . PHP_EOL . $jsCode;
        }

        $file = fopen(Yii::app()->basePath . '/../' . $this->_compiledDir . '/' .  $resultFilename, 'w+');
        fputs($file, $jsCode);
        fclose($file);
        chmod(Yii::app()->basePath . '/../' . $this->_compiledDir . '/' .  $resultFilename, 0777);

        return $resultFilename;
    }

    public function getCssFile()
    {
        if (empty($this->_less)) {
            return false;
        }

        // Проверим, нет ли уже сохранённой версии
        $resultFilename = 'style-' . md5(json_encode($this->_less)) . '.css';

        // Если файл найден, а debug отключен - возвращаем путь
        if (file_exists(Yii::app()->basePath . '/..' . $this->_compiledDir . '/' . $resultFilename) && !Yii::app()->params['debug']) {
            return $resultFilename;
        }

        // Такой набор стилей ещё не компилировался, начинаем собирать
        $less = new lessc();

        // Если дебаг отключен, используем сжатие кода
        if (!Yii::app()->params['debug']) {
            $less->setFormatter('compressed');
        } else {
            $less->setPreserveComments(true);
        }

        $cssCode = '';
        foreach ($this->_less as $file) {
            $cssCode .= $less->compileFile(Yii::app()->basePath . '/..' . $this->_srcDir . '/less/' . $file) . PHP_EOL;
        }

        $file = fopen(Yii::app()->basePath . '/..' . $this->_compiledDir . '/' . $resultFilename, 'w+');
        fputs($file, $cssCode);
        fclose($file);
        chmod(Yii::app()->basePath . '/..' . $this->_compiledDir . '/' . $resultFilename, 0777);

        return $resultFilename;
    }
}