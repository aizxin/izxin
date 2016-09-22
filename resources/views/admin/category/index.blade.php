@extends('layouts.admin')
@section('style')
<link href="/assets/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet">
@endsection
@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">文章管理</a></li>
        <!--<li><a href="javascript:;">文章列表</a></li>-->
        <li class="active">分类列表</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">文章管理<small>...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row" id="category">
        <!-- begin col-12 -->
        <div class="col-md-12 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">分类列表</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Default</h2>
                            <div class="dd" id="nestable3">
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" data-id="13">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">Item 13
                                            <div class="pull-right action-buttons">
                                                <a href="javascript:;" data-pid="13" class="btn-xs createMenu" data-toggle="tooltip"data-original-title="添加"  data-placement="top"><i class="fa fa-plus"></i>
                                                </a>
                                                <a href="javascript:;" data-href="url" class="btn-xs editMenu" data-toggle="tooltip"data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:;" class="btn-xs destoryMenu" data-id="13" data-original-title="删除"data-toggle="tooltip"  data-placement="top"><i class="fa fa-trash"></i><form action="" method="POST" name="delete_item" style="display:none"><input type="hidden"name="_method" value="delete"><input type="hidden" name="_token" value=""></form></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dd-item dd3-item" data-id="14">
                                        <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                                    </li>
                                    <li class="dd-item dd3-item" data-id="15">
                                        <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item" data-id="16">
                                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="17">
                                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="18">
                                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1>菜单</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- #modal-dialog -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
@endsection @section('my-js')
<script src="/layer/layer.js"></script>
<script src="/assets/js/ui-modal-notification.demo.min.js"></script>
<script src="/assets/plugins/jquery-nestable/jquery.nestable.js"></script>
<script>
    $(document).ready(function() {
        App.init();
        Notification.init();
    });
    $('#nestable3').nestable({
        group: 1
    })
var vn = new Vue({
        el: '#category',
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        },
        data: {
        },
        created: function () {
        },
        methods: {
        }
    });
</script> @endsection