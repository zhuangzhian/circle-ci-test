<?php


namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Request;

class Staff extends Controller
{
    public function index()
    {
        $data = Db::table('staff')->paginate(10);
        $this->assign('list',$data);
        return $this->fetch();
    }
    public function staff_add()
    {
        return view();
    }
    //添加新员工
    public function staff_add_check()
    {
        $name = input('get.name');
        $age = input('get.age');
        $id = input('get.id_number');
        $telephone = input('get.telephone');
        $address = input('address');
        $sex = input('get.sex');

//        dump($name);
//        dump($age);
//        dump($id);
//        dump($telephone);
//        dump($address);
//        dump($state);

        $data = [
            'staff_name'=>$name,
            'staff_age'=>$age,
            'staff_tele'=>$telephone,
            'staff_id_num'=>$id,
            'staff_address'=>$address,
            'staff_sex'=>$sex
        ];
        if (Db::table('staff')->where('staff_tele',$telephone)->select())
        {
            $this->error('号码已存在');
        }else if(Db::table('staff')->where('staff_tele',$telephone)->select())
        {
            $this->error('身份证号已存在');
        }else if(Db::table('staff')->insert($data))
        {
            $this->success('添加成功','../staff');

        }else{
            $this->error('添加失败:');

        }
    }


    //显示单个员工数据
    public function staff_query(Request $request)
    {
        $id =Request::instance()->param('id');
        $res = Db::table('staff')->where('staff_id',$id)->select();
        if (!empty($res))
        {
            $res->assign('res',$res);
        }else{
            echo '1';
        }
    }
    //修改员工数据
    public function staff_edit()
    {
        $id = input('get.id');
        dump('id');
        if(Db::table('staff')->where($id)->select())
        {
            $data = Db::table('staff')->where('$id')->select();
            $this->assign('data',$data);
            return $this->fetch();
        }else
        {
            $this->error('服务器出现故障');
        }
    }
    //删除员工
    public function staff_delete(Request $request)
    {
        $id =$request->post('id');
        Db::table('staff')->where('staff_id',$id)->delete;
    }

}