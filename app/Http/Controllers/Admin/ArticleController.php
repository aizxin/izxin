<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\ArticleService;

class ArticleController extends Controller
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
    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }
    /**
     *  [index 网站信息]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            // return $this->service->findByParent();
        }
        return view('admin.article.index');
    }
    public function show($id){
    }
    public function create()
    {
        return view('admin.article.add');
    }
    public function store(Request $request)
    {
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
    /**
     *  [upload markdown 图片上传]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T18:06:06+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function upload(Request $request)
    {
        $response =  $this->service->upload($request);
        return response()->json($response);
    }
}
