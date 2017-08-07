<?php
namespace app\index\model;



use think\Db;//引入Db
use think\Model;//引入Model



class Kao extends Model
{

	protected $table='kao';//表名


	//增加
	 function insertData($data)
	{

	  return Db::table($this->table)->insertGetId($data);
	  // return Db::table($this->table)->save($data);
	}
	//查询
	function show()
	{
	return Db::table($this->table)->select();    
	}
	//删除
	function deleteData($id)
	{
	return Db::table($this->table)->where('uid','=',$id)->delete();    
	}
	//查询单条
	function findData($id)
	{
	return Db::table($this->table)->where('uid','=',$id)->find();    
	}

	//修改
	function updateData($data,$id)
	{
	return Db::table($this->table)->where('uid','=',$id)->update($data);    
	}
}
?>