
<div class="col-lg-6">
                      
                        <h1>Add User</h1>

                        <form role="form" name="createuser" id="createuser" action="<?php echo base_url()."admin/user/createuser"?>" method="post" >
                            <div class="form-group has-success">
                                <label  class="control-label" for="inputSuccess">Username</label>
                                <input  name="username" id="input-user" type="text" class="form-control" value="" >
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Password</label>
                                <input name="password" id="input-pass" type="text" class="form-control" value="">
                            </div>

                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Repeat Password</label>
                                <input name="repeat" id="input-pass-repeat" type="text" class="form-control" value="">
                            </div>
                            
                            <input type="submit" name="go" data-role = "false" class="btn btn-default"></input>
                       </form>

</div>