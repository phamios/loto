 <div class="col-lg-12">
                        <h2>List user</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Imei</th>
                                        <th>Username</th>
                                        <th>Created</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_user as $item): ?>
                                    <tr>
                                        <td><?php echo $item->id;?></td>
                                        <td><?php echo $item->userimei;?></td>
                                        <td><?php echo $item->username;?></td>
                                        <td><?php echo $item->createdate;?></td>
                                        <td><button id="changeactive" type="button" class="btn btn-primary"><?php echo $item->status;?></button></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            
                            <ul class="pagination pagination-sm no-margin pull-left">
                                <?php for($i=0;$i<$number_page;$i++) :?>
                                    <li <?php if($i == $cur_page) echo 'class="active"'?>><a href="<?php echo base_url('admin/user/?page=').$i ;?>"><?php echo $i+1?></a></li>
                                    <?php endfor;?>
                              </ul>
                       </div>
</div>