<?php
namespace classes\common\system;
use classes\common\helpers\Utils;
use classes\common\system\Texts as Texts;
use ReflectionClass;

class TextsHandler
{
    private $texts;
    private $path;

    public function __construct()
    {
        $this->path=SITE_PATH."content".DS."js".DS."texts".DS;

        $texts=new Texts();
        $reflection = new ReflectionClass($texts);
        $this->texts=json_encode($reflection->getDefaultProperties());
    }

    public function setTextsFile(){
        $languageId = Utils::getCookie("languagePreference");
        if(!empty($languageId) && $languageId!="en"){
            $sourceTexts = file_get_contents($this->path.$languageId.".json");
            $sourceTexts = json_decode($sourceTexts);
            foreach ($sourceTexts as $key=>$value){
                Texts::$$key=$value;
            }
        }
    }

    public function upgrateKeysOfJsonFile(){
        $this->generateFile("default");
        $this->generateFile("en");
    }

    public function createJsonFile($languageKey){
        if(!file_exists($this->path.$languageKey.".json")) {
            if ($languageKey != "en") {
                $texts = json_decode($this->texts);
                foreach ($texts as $key => $value) {
                    $texts->$key = "";
                }
                $this->texts=json_encode($texts);
            }
            $this->generateFile($languageKey);
        }
    }

    public function updateJsonFile($texts,$key){
        if(file_exists($this->path.$key.".json")) {
            $this->texts = json_encode($texts,JSON_UNESCAPED_UNICODE);
            $this->generateFile($key);
        }
    }

    private function generateFile($key){
        $fp=fopen($this->path.$key.".json", "w");
        fwrite($fp, $this->texts);
        fclose($fp);
    }
}