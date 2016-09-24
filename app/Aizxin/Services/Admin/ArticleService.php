<?php
namespace Aizxin\Services\Admin;

use Aizxin\Services\CommonService;
use Aizxin\Repositories\Eloquent\Admin\ArticleRepository;
use Aizxin\Validators\ArticleValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use zgldh\QiniuStorage\QiniuStorage;

class ArticleService extends CommonService
{
    /**
     * @var ArticleRepository
     */
    protected $repository;
    /**
     * @var ArticleValidator
     */
    protected $validator;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:33:33+0800
     *  @param    ArticleRepository           $repository [description]
     *  @param    ArticleValidator            $validator  [description]
     */
    public function __construct(ArticleRepository $repository, ArticleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    /**
     *  [uploadImage 上传图片到七牛]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T17:52:15+0800
     *  @param    [type]                   $file [description]
     *  @return   [type]                         [description]
     */
    private function uploadImage($file)
    {
        $disk = QiniuStorage::disk('qiniu');
        $fileName = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
        $bool = $disk->put(config('admin.globals.imagePath').$fileName,file_get_contents($file->getRealPath()));
        \Log::info($file->getRealPath());
        if ($bool) {
            $path = $disk->downloadUrl(config('admin.globals.imagePath').$fileName);
            return $path;
        }
        return '';
    }
    /**
     *  [upload markdown 图片上传]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-23T17:52:30+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     *  上传的后台只需要返回一个 JSON 数据，结构如下：
     {
        success : 0 | 1,           // 0 表示上传失败，1 表示上传成功
        message : "提示的信息，上传成功或上传失败及错误信息等。",
        url     : "图片地址"        // 上传成功时才返回
     }
     */
    public function upload($request)
    {
        if ($request->hasFile('editormd-image-file')) {
            $path = $this->uploadImage($request->file('editormd-image-file'));
            return response()->json([
                'success' => 1,
                'message' => '上传成功',
                'url' => strval($path)
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => '失败成功',
            'url' => '',
        ]);
    }
}