
<div class = "row">
    <div class = "col-sm-12">
        <div class = "box box-color box-bordered">
            <div class = "box-title">
                <h3>
                    <i class = "fa fa-th-list"></i><?php echo LTEXT('_add_client')?></h3>
            </div>
           
            <div class = "box-content nopadding">
                <?php 
                 if($edit)
                 {
                     $form_url = base_url('clients/edit_client/'.$client->id);
                 }
                 else{
                     $form_url = base_url('clients/add_client');
                 }
                ?>
                <form action = "<?php echo $form_url?>" method = "POST" class = 'form-horizontal form-striped'>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">Name</label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ?  set_value('name',$client->name) :  set_value('name','')?>" name = "name" id = "textfield" placeholder = "Name" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">User Name</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "user_name" id = "textfield" placeholder = "User Name" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">Company</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "company" id = "textfield" placeholder = "Company" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">Email</label>
                        <div class = "col-sm-10">
                            <input type = "email" name = "email" id = "textfield" placeholder = "Email" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">Phone Number</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "phone_number" id = "textfield" placeholder = "Phone Number" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2">Address</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "address" id = "textfield" placeholder = "Address" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "password" class = "control-label col-sm-2">Password</label>
                        <div class = "col-sm-10">
                            <input type = "password" name = "password" id = "password" placeholder = "Password input" class = "form-control">
                        </div>
                    </div>

                    <div class = "form-actions col-sm-offset-2 col-sm-10">
                        <button type = "submit" class = "btn btn-primary">Submit</button>
                        <button type = "button" class = "btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
