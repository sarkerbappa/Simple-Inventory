@extends('admin.templates.default')
@section('content')
<section class="content">
    <?php if (Session::get('add_success_massege')) { ?>
        <div class="bs-example col-md-9">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo Session::get('add_success_massege'); ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">

        <!-- right column -->
        <div class="col-md-11">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'categorySave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Category Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::text('category_name', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Category Name')); ?>
                            <span class="text-red"><?php echo $errors->first('category_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Category Description <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('category_description', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Category Description')); ?>
                            <span class="text-red"><?php echo $errors->first('category_description'); ?></span>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <?php echo Form::submit('Submit', array('class' => 'btn btn-info pull-right inside_body_submit')) ?>
                </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
            <?php echo Form::close(); ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-----------------------------Category Display grid------------------------------------------------> 

    <div class="row">
        <div class="col-xs-11">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Title</th>
                                <th>Category Description</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allcategory as $category_single) { ?>
                                <tr>
                                    <td style="max-width:100px;"> <?php echo $category_single->Category_Name; ?> </td>
                                    <td style="max-width:150px;"><?php echo $category_single->Category_Description;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary ">Action</button>
                                            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@editCategory', [$category_single->Category_ID]) ?>">Edit</a></li>
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@deleteCategory', [$category_single->Category_ID]) ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Category Title</th>
                                <th>Category Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop
