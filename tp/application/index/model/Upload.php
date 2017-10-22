<?php
namespace app\index\model;



use think\Db;//引入Db
use think\Model;//引入Model

use think\File;      // 使用文件上传类
use think\Validate;  // 使用文件上传验证


class uploads extends Model
{
    //上传
     public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
     }


    // <form action="/index/index/upload" enctype="multipart/form-data" method="post">
    // <input type="file" name="image[]" /> <br> 
    // <input type="file" name="image[]" /> <br> 
    // <input type="file" name="image[]" /> <br> 
    // <input type="submit" value="上传" /> 
    // </form> 

       //多文件上传
       public function uploadAll(){
            // 获取表单上传文件
            $files = request()->file('image');
            foreach($files as $file){
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension(); 
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename(); 
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }    
            } 

       }


 }