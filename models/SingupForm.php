<?php
/**
 * Created by PhpStorm.
 * User: vladymyr
 * Date: 2019-06-24
 * Time: 09:46
 */

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;


class SingupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $image;

    public function rules()
    {
        return [
            [['name','email','password','image'], 'required'],
            [['name'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email'],
            [['image'], 'file', 'extensions' => 'jpg,png','maxSize' => 1448*1448]
        ];
    }

    public function signup()
    {
        $file = UploadedFile::getInstance($this,'image');
        $this->image = $file;
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->photo = $this->uploadFile($file);
            return $user->create();
        }
    }

    public function uploadFile(UploadedFile $file)
    {
        $this->image = $file;
            return $this->saveImage();
    }

    private function getFolder()
    {
        return \Yii::getAlias('@web') . 'uploads/userphoto/';
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    private function saveImage(){
        $fileName = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $fileName);
        return $fileName;
    }
}