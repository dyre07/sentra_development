          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>User</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 19%">Full Name</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 10%">Phone</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">Privilege</th>
                        <th style="width: 10%">Created By</th>
                        <th style="width: 10%">Date Created</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                      
                    <tbody>
                        <?php 
                            if(!empty($user)){
                                $i = 1;
                                foreach($user as $row){?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><img src="<?php echo base_url('img/user/').$row['foto'];?>" class="avatar" alt="Avatar"><?php echo $row['fullname'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php $status = $row['status'];
                                        if($status == 0){?> <button type="button" class="btn btn-success btn-xs">Active</button></td>
                                <?php }else{?><button type="button" class="btn btn-danger btn-xs">Disabled</button></td><?php }?>
                            <td><?php echo $row['privilege'];?></td>
                            <td><?php echo $row['created_by'];?></td>
                            <td><?php echo $row['created_date'];?></td>
                            <td>
                              <a href="<?php echo base_url('user_management/edit_user/').$row['id_admin']?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="<?php echo base_url('user_management/delete_user/').$row['id_admin'].'/'.$row['foto']?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete this user?')" ><i class="fa fa-trash-o"></i></a>
                            </td>
                          </tr>
                        <?php        }
                            }
                        ?>
                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
              </div>
            </div>
          </div>