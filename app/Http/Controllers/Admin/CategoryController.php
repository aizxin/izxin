<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\CategoryService;

class CategoryController extends Controller
{
    /**
     *  [$service 服务]
     *  @var [type]
     */
    protected $service;

    /**
     *  [__construct 注入]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-15T00:12:46+0800
     *  @param    AuthService              $service [description]
     */
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    /**
     *  [index 菜单信息]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->service->findByParent();
        }
        return view('admin.category.index');
    }
    public function show($id){
    }
    public function create()
    {
    }
    /**
     *  [store 分类添加]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-22T22:59:02+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    public function edit($id)
    {
    }
    public function destroy($id)
    {

    }
    public function update(Request $request,$id)
    {
    }
    public function role(Request $request)
    {
    }
}
