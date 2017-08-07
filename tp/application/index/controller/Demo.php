<?php
namespace app\index\controller;


use think\Controller;//引入控制器
use think\Request;//引入request
use app\index\model\Kao;//引入模型层
use app\index\model\Upload;//引入模型层
header("content-type:text/html;charset=UTF-8");//防乱码
class Demo extends Controller
{
    //表单页面
    public function index(){

      return view("demo/index");
      // $this->success('新增成功','Index/show');
    }    

       //添加
    public function insert()
    {
        
        $Request=Request::instance();//调用Request中instance方法
        $data=$Request->post();//接值
        // print_r($data);
        $kao=new Kao();//实例化model
        $kao=new Upload();//实例化model
        
        $result=$kao->insertData($data);//执行添加语句
        if($result)
        {   
            return Redirect('demo/show');
            //echo "<script>alert('新增成功');localtion.href='{:url('Index/show')}'</script>";
            //$this->success('新增成功','Index/show');
        }else{
            $this->error('新增失败');
        }

    }
   //展示
   public function show()
   {
     $kao = new Kao();//实例化model
     $goods_info = $kao->show();//执行查询
     return view('demo/show',['goods_info'=>$goods_info]);
   }
   //删除
   // public function delete()
   // {
	  //  $Request=Request::instance();
	  //  $id=$Request->get('id');
	  //  $user=new User;
	  //  $result=$user->deleteData($id);
	  //  if($result)
	  //  {
	  //   return Redirect('Index/show');
	  //  }else{
	  //   $this->error('删除失败');
	  //  }
   // }
   // //修改页面
   // public function update()
   // {
	  //   $Request=Request::instance();
	  //   $id=$Request->get('id');
	  //   $user=new User;
	  //   $res=$user->findData($id);//查询单条
	  //   //print_r($res);die;
	  //   return view('update',['res'=>$res]);
   // }
   // //执行修改
   // public function save()
   // {
	  //   $Request=Request::instance();
	  //   $id=$Request->post('uid');
	  //   $Request=Request::instance();
	  //   $data=$Request->post();//接修改之后的数据
	  //   $user=new User;
	  //   $result=$user->updateData($data,$id);//修该语句
	  //   if($result)
	  //   {
	  //   return Redirect('Index/show');
	  //   }else{
	  //       $this->error('修改失败');
	  //   }


   // }

}
