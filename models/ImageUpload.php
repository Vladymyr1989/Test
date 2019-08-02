<?php
/**
 * Created by PhpStorm.
 * User: vladymyr
 * Date: 2019-06-17
 * Time: 13:17
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model

{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    private function getFolder()
    {
        return \Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExist($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    private function fileExist($currentImage){
        if (!empty($currentImage)&&$currentImage!=null){
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    private function saveImage(){
        $fileName = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $fileName);
        return $fileName;
    }
}