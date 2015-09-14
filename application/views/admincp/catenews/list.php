<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default"> 
            <table class="table table-bordered table-striped">
                <?php if ($list_catenews <> null): ?>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên danh mục</th>
                            <th>Tình trạng</th> 
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_catenews as $value): ?>
                            <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->catenewsname ?></td>
                                <td><?php echo $value->catenewsnameroot ?></td>
                                <td><?php if ($value->active == 1): ?>
                                        Đang hoạt động
                                    <?php else: ?>
                                        Đã dừng
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admincp/del_catenews/' . trim($value->id)); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a data-toggle="modal" role="button" href="<?php echo site_url('admincp/catenews/' . trim($value->id)); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php else: ?>
                    <?php echo $this->lang->line('no_result'); ?>
                <?php endif; ?>
            </table>
        </div>
    </div>

</div>


<?php if(isset($id)):?>
<?php foreach($catedetails as $values):?>
<div class="row">
    <?php echo form_open_multipart('admincp/catenews/'.$id); ?>
    <div class="col-md-8">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"> 
                <div class="form-group">
                    <label><?php echo $this->lang->line('catename'); ?></label>
                    <input name="catename" type="text" value="<?php echo $values->catenewsname?>"   class="form-control">
                </div>
   
                <div class="form-group">
                    <label><?php echo $this->lang->line('cateactive'); ?></label>
                    <select name="active" id="cateactive" class="form-control">
                        <option value="0" <?php if($values->active == 0):?> selected="selected"<?php endif;?> > Unactive</option>
                        <option value="1" <?php if($values->active == 1):?> selected="selected"<?php endif;?>  >Active</option>
                    </select>
                </div>

            </div> 
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submitedit" type="submit"><i class="fa fa-save"></i> 
                <?php echo $this->lang->line('save'); ?>
            </button> 
        </div>
    </div> 
</div>

<?php echo form_close(); ?>
<?php endforeach;?>

<?php else:?>
<div class="row">
    <?php echo form_open_multipart('admincp/catenews'); ?>
    <div class="col-md-8">
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"> 
                <div class="form-group">
                    <label><?php echo $this->lang->line('catename'); ?></label>
                    <input name="catename" type="text"   class="form-control">
                </div>
   
                <div class="form-group">
                    <label><?php echo $this->lang->line('cateactive'); ?></label>
                    <select name="active" id="cateactive" class="form-control">
                        <option value="0" > Unactive</option>
                        <option value="1" selected="selected">Active</option>
                    </select>
                </div>

            </div> 
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" name="btt_submit" type="submit"><i class="fa fa-save"></i> 
                <?php echo $this->lang->line('save'); ?>
            </button> 
        </div>
    </div> 
</div>

<?php echo form_close(); ?>

<?php endif;?>