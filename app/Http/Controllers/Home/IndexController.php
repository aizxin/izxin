<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;
class IndexController extends Controller
{
    public function index()
    {
        // dd(md5('<{wk517???}>'));
        $base64 = "data:image/jpeg;base64,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";
        // 构建鉴权对象
        $auth = new Auth(env('QINIU_AXXESS_KEY'), env('QINIU_SECRET_KEY'));
        // 生成上传 Token
        $token = $auth->uploadToken(env('QINIU_BUCKET'));
        // // 上传到七牛后保存的文件名
        $key = md5(time()).'.png';
        // // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 上传文件到七牛
        list($ret, $err) = $uploadMgr->putFile($token, $key, $base64);
        if ($err !== null) {
            return false;
        } else {
            return "http://".env('QINIU_DOMAINS_DEFAULT')."/".$ret['key'];
        }
        // return view('welcome');
    }
}
