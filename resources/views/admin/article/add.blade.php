@extends('layouts.admin') @section('style')
<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
<link rel="stylesheet" type="text/css" href="/assets/plugins/editor/css/editormd.min.css">
<style>
    .input {
        width: 500px;
    }
    .bootstrap-select.form-control:not([class*="span"]) {
        width: 500px;
    }
</style>
@endsection @section('content')
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">文章管理</a></li>
        <li><a href="javascript:;">文章列表</a></li>
        <li class="active">文章添加</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">文章管理<small>...</small></h1>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">文章添加</h4>
                </div>
                <div class="panel-body" id="addArticle">
                    <validator name="nodeValidation">
                        <form class="form-horizontal" novalidate method="POST">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ">文章分类:</label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker input" id="parent_id" data-size="10" v-model="article.parent_id" data-live-search="true" data-style="btn-white">
                                        <option value="0">文章分类</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章标题:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="article.name" name="name" v-validate:name="{ required: true}" class="form-control input" placeholder="文章标题">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章封面:</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="{{asset('assets/img/no-image.png')}}" alt="" /> </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                          <div>
                                              <span class="btn purple btn-file">
                                                    <span class="fileinput-new">
                                                        <button type="button" class="btn btn-primary start">
                                                            <i class="fa fa-upload"></i>
                                                            <span>上传图片</span>
                                                        </button>
                                                    </span>
                                                    <span class="fileinput-exists">
                                                        <button type="reset" class="btn btn-warning cancel">
                                                            <i class="fa fa-ban"></i>
                                                            <span>更新图片</span>
                                                        </button>
                                                     </span>
                                                    <input type="file" name="img">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    <button type="button" class="btn btn-danger delete">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span>图片删除</span>
                                                    </button>
                                                </a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">简要描述:</label>
                                    <div class="col-md-9">
                                        <textarea v-model="article.description" name="description" class="form-control input" v-validate:description="{ required: true}" id="message" name="message" rows="4" data-parsley-range="[20,200]"
                                            placeholder="这里填写当前文章的简要描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章排序:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="article.sort" name="sort" class="form-control input" placeholder="排序号" v-validate:sort="{ required: true}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章状态</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" v-model="article.is_menu"  data-render="switchery" data-theme="default"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章内容</label>
                                    <div class="col-md-9">
                                        <div id="editor"><textarea style="display: none;"></textarea></div>
                                    </div>
                                </div>
                                @permission('admin.article.store')
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button @click="addArticle()" :disabled="$nodeValidation.invalid" type="button" class="btn btn-success btn-lg m-r-5" style="width: 100px">保 存</button>
                                    </div>
                                </div>
                                @endpermission
                                <div class="form-group" v-if="msg">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="alert alert-danger fade in m-b-15">
                                            <strong>Error!</strong>
                                            <span v-text="msg">.</span>
                                            <span class="close" data-dismiss="alert">×</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </validator>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
    <!-- ================== Vue JS ================== -->
    <script src="/layer/layer.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/editor/js/editormd.min.js')}}" type="text/javascript"></script>
    <!-- ================== END vue JS ================== -->
    <script>
    	$(document).ready(function() {
    		App.init();
            FormPlugins.init();
            FormSliderSwitcher.init();
    	});
         $(function() {
            var editor = editormd('editor',{
              width   : "100%",
              height  : 640,
              syncScrolling : "single",
              toolbarAutoFixed: false,
              gotoLine:false,
              emoji:true,
              saveHTMLToTextarea:true,
              path    : "{{asset('assets/plugins/editor/lib')}}/",
              imageUpload : true,
              imageUploadURL : '/admin/article/upload'
            });
        });
        new Vue({
            http: {
                root: '/root',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            },
            el: '#addArticle',
            data: {
                article:{},
                msg:''
            },
            created: function (){
            },
            methods: {
                addArticle: function() {
                    this.article.parent_id = $("#parent_id").val();
                    this.article.is_menu = this.article.is_menu?1:0;
                    if(this.article.id != undefined && this.article.id > 0){
                        this.updateNode(this.article);
                    }else{
                        this.createNode(this.article);
                    }
                },
                createNode: function (data){
                    this.$http.post("{{url('/admin/permission')}}",data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "{{url('/admin/permission/index')}}";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                },
                updateNode: function (data){
                    this.$http.put("{{url('/admin/permission/')}}/"+data.id,data).then(function (response){
                        if(response.data.code == 400){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 422){
                            this.msg = response.data.message
                        }
                        if(response.data.code == 200){
                            var ii = layer.load();
                            //此处用setTimeout演示ajax的回调
                            setTimeout(function(){
                                layer.close(ii);
                                window.location.href = "{{url('/admin/permission/index')}}";
                            }, 3000);
                        }
                    }, function (response) {
                        console.log(response)
                    });
                }
            }
        });
    </script>
@endsection