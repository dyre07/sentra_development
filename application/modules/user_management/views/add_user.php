<div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add User</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="<?php echo base_url('user_management/add_process')?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                      <?php if($error != ' '){?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error;?></strong>
                    </div><?php }?>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Full Name</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="fullname" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Phone</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="phone">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" required="required" type="password" name="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Privilege</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="privilege">
                          <option>Choose option</option>
                            <?php if(!empty($privilege)){
                                foreach($privilege as $row){?>
                                    <option value="<?php echo $row['id_privilege']?>"><?php echo $row['privilege'];?></option>
                            <?php }
                            }?>
                        </select>
                      </div>
                    </div>                      
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Browse&hellip; <input type="file" style="display: none;" name="foto">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-7">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
