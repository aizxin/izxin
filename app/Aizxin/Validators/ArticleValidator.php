<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ArticleValidator extends LaravelValidator {

   /**
    *  [$rules 角色规则]
    *  @var [type]
    */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => ['required','unique:articles'],
            'category_id' => ['required','numeric'],
            'img' => ['required'],
            'content_mark' => ['required'],
            'intro' => ['required'],
            'status' => ['required'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => ['required'],
            'category_id' => ['required','numeric'],
            'img' => ['required'],
            'intro' => ['required'],
            'content_mark' => ['required'],
            'status' => ['required'],
        ],
    ];
    /**
     *  [$messages 角色错误信息]
     *  @var [type]
     */
    protected $messages = [
        'title.required' => '文章标题必填项',
        'title.unique' => '文章标题已经存在',
        'status.required' => '状态必选项',
        'category_id.required' => '分类必选项',
        'category_id.numeric' => '分类必须数字',
        'img.required' => '封面必选项',
        'content_mark.required' => '文章内容必填',
        'intro.required' => '文章简介必填',
	];
}