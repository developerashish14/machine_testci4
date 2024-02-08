<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<link href="<?= base_url('assets'); ?>/style.css" rel="stylesheet">
<script src="<?= base_url('assets'); ?>/script.js"></script>
  

</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>					
					</div>
				</div>
			</div>
			<table id ="table" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Full Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Address</th>
						<th>DOB</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach($user_info as $info){ ?>
                         <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                           <td><?= $info->full_name; ?></td>
                            <td><?= $info->phone; ?></td>
                            <td><?= $info->email; ?></td>
                            <td><?= $info->address; ?></td>
                            <td><?= $info->dob; ?></td>
                            <td><?= $info->gender; ?></td>
                            <td><?= (isset($info->image) && !empty($info->image)) ? "<img style='height:150px;width:150px;' src='".base_url('images/').$info->image."'>" : 'N/A'; ?></td>
                            <td>
                            <a href="#viewEmployeeModal" class="view" data-id="<?=$info->id; ?>" data-full_name="<?=$info->full_name; ?>" data-phone="<?=$info->phone; ?>" data-email="<?=$info->email; ?>" data-address="<?=$info->address; ?>" data-dob="<?=$info->dob; ?>" data-gender="<?=$info->gender; ?>" data-image="images/<?=$info->image; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#128065;</i></a>
                           
                                <a href="#editEmployeeModal" class="edit" data-id="<?=$info->id; ?>" data-full_name="<?=$info->full_name; ?>" data-phone="<?=$info->phone; ?>" data-email="<?=$info->email; ?>" data-address="<?=$info->address; ?>" data-dob="<?=$info->dob; ?>" data-gender="<?=$info->gender; ?>" data-image="<?=$info->image; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                
                                <a href="#deleteEmployeeModal" class="delete" data-id="<?=$info->id; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        <?php /*    
                            <td id="slide-<?=$sld->id?>"><?= ($sld->status == 'D')?'<a href="#" data-id="'.$sld->id.'" data-status="'.$sld->status.'" class="change-status badge badge-primary">ACTIVE</a>':'<a href="#" data-id="'.$sld->id.'" data-status="'.$sld->status.'" class="change-status badge badge-danger">DEACTIVE</a>'; ?></td>
                            <td><a class="edit-slider badge badge-primary" href="#" data-toggle="modal" data-target="#editSlider" data-imgid="<?=$sld->img?>" data-top="<?= $sld->top_line; ?>" data-bottom="<?= $sld->bottom_text ;?>" data-link_button="<?= $sld->link_button; ?>" data-form_button="<?= $sld->form_button; ?>" data-form_type="<?= $sld->form_type; ?>" data-url_ref="<?= $sld->url_ref; ?>" data-img_src="<?=web_url();?>images/<?= $images[$sld->img]->location; ?>" data-slideid="<?= $sld->id; ?>" >Edit</a></td>
                        */
                            ?>
                        </tr>
                    <?php } ?>
				
					
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="form-submission" method="post" action="<?= site_url('user/add_user')?>">
								
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Full Name</label>
						<input name="full_name" type="text" class="form-control">
					</div>
                    <div class="form-group">
						<label>Phone</label>
						<input type="number" class="form-control" name="phone">
					</div>	
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" >
					</div>
                    <div class="form-group">
						<label>DOB</label>
						<input type="date" name="dob" class="form-control" >
					</div>
                    <div class="form-group">
						<label>Gender</label>
                        <br>
						Male : <input type="radio" name="gender" id="male" value="Male"><br>
                        Female :<input type="radio" name="gender"  id="female" value="Female">
					</div>
                    <div class="form-group">
						<label>Image</label>
						<input type="file" name="user_image" class="form-control" >
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="address"></textarea>
					</div>
									
				</div>
				<div class="modal-footer">
                <input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
					
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="viewEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
          				
				<div class="modal-header">						
					<h4 class="modal-title">View Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<table>
                            <tbody>
                                <tr>
                                    <td>Full Name :</td><td id="full_name"></td>
                                </tr>
                                <tr>
                                    <td>Phone :</td><td id="phone"></td>
                                </tr>
                                <tr>
                                    <td>Email :</td><td id="email"></td>
                                </tr>
                                <tr>
                                    <td>Address :</td><td id="address"></td>
                                </tr>
                                <tr>
                                    <td>Dob :</td><td id="dob"></td>
                                </tr>
                                <tr>
                                    <td>Gender :</td><td id="gender"></td>
                                </tr>
                                <tr>
                                    <td>Image :</td><td><img src="" style='height:150px;width:150px;' id="user_image" title="">
										</td>
                                </tr>
                                
                            </tbody>
                        </table>
						
					</div>
                   
									
				</div>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
		<div class="modal-content">
            <form class="form-submission" method="post" action="<?= site_url('user/update_user')?>">
								
				<div class="modal-header">						
					<h4 class="modal-title">Update Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Full Name</label>
						<input name="edt_full_name" type="text" class="form-control">
					</div>
                    <div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="edt_phone">
					</div>	
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="edt_email" class="form-control" >
					</div>
                    <div class="form-group">
						<label>DOB</label>
						<input type="date" name="edt_dob" class="form-control" >
					</div>
                    <div class="form-group">
						<label>Gender</label>
                        <br>
						Male : <input type="radio" name="edt_gender" id="male" value="Male"><br>
                        Female :<input type="radio" name="edt_gender"  id="female" value="Female">
					</div>
                    <div class="form-group">
						<label>Image</label>
						<input type="file" name="user_image" class="form-control" >
                        <input type="hidden" name="edt_old_user_image" class="form-control" >
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="edt_address"></textarea>
					</div>
									
				</div>
				<div class="modal-footer">
                <input type="hidden" name="edt_id" >
                <input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
					
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="form-submit" method="post" action="<?= site_url('user/delUser')?>">
			
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
                    <input type="hidden" name="del_id" >
                    <input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
                    
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
<script>

function update_token2(result)
{
    csrf_token = result.error_token.cname;
    csrf_hash = result.error_token.cvalue;
}
$(document).ready(function(){
    $("#table").dataTable();
    $('.delete').on('click',function(){
        var id = $(this).data('id');
        $('input[name=del_id]').attr('value',id);
    });
    $('.view').on('click',function(){
        var full_name = $(this).data('full_name');
        var phone = $(this).data('phone');
        var email = $(this).data('email');
        var address = $(this).data('address');
        var dob = $(this).data('dob');
        var gender = $(this).data('gender');
        var image = $(this).data('image');
      
        $('#full_name').html(full_name);
        $('#phone').html(phone);
        $('#email').html(email);
        $('#address').html(address);
        $('#dob').html(dob);
        $('#gender').html(gender);
        $('#user_image').attr('src',image);
    });
    $('.edit').on('click',function(){
        var id = $(this).data('id');
        var full_name = $(this).data('full_name');
        var phone = $(this).data('phone');
        var email = $(this).data('email');
        var address = $(this).data('address');
        var dob = $(this).data('dob');
        var gender = $(this).data('gender');
        var image = $(this).data('image');
        $('input[name=edt_id]').attr('value',id);
        $('input[name=edt_full_name]').attr('value',full_name);
        $('input[name=edt_phone]').attr('value',phone);
        $('input[name=edt_email]').attr('value',email);
        $('textarea[name=edt_address]').val(address);
        $('input[name=edt_dob]').attr('value',dob);
        $('input:radio[name="edt_gender"]').filter('[value="'+gender+'"]').attr('checked', true);
        $('input[name=edt_old_user_image]').attr('value',image);
    });
    
  
        $('.form-submit').submit(function(e){
            
            e.preventDefault();
            var frm = $(this);
            var form_btn = $(frm).find('input[type="submit"]');
            var form_result_div = '#form-result';
            $(form_result_div).remove();

            frm.find('.frm-error').remove();
            $('#toast-erromsg').html(null).hide();
            frm.find('.border-danger').removeClass('border-danger');
            $('.preloader').show();
            var csrf = frm.find('#csrf-token').val();
            //--------

            if(csrf && csrf.length > 5) 
            {
                $.ajax({
                    url: frm.attr('action'),
                    data: new FormData(this),
                    type: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(result){
                        update_token2(result);
                        $('input[name='+ csrf_token +']').attr('value',csrf_hash);
                        if(result.success == true){
                            if(result.rlink){
                                window.location.href = result.rlink;
                            }else if(result.alert){
                                frm.before(result.alert);
                            }else if(result.alert1){
                                frm.before(result.alert1);
                                frm.remove();
                            }else{
                                location.reload();
                            }
                        }
                        else if(result.val == true){
                            $.each(result.message, function(key,value){
                                var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
                                if(value.length > 2){
                                    if(result.border == true){
                                        inpt.addClass('border-danger').after(value);
                                        //alert(value);
                                        $('#toast-erromsg').show().append(value);

                                    }else{
                                        inpt.addClass('border-danger').before(value);
                                    }
                                }
                            });
                            setTimeout(function(){
                                $('#toast-erromsg').fadeOut(600)
                            }, 3500);
                        }else{
                            
                            form_btn.before('<div id="form-result" class="alert alert-danger" role="alert" ></div>');
            
                            $(form_result_div).html(result.message.refrence).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                        }
                        $('.preloader').hide();
                    }
                });
            }
            else
            {
                $('.preloader').hide();
                $('#toast-erromsg').show().append('CSRF Required');
                setTimeout(function(){
                    $('#toast-erromsg').fadeOut(600)
                }, 3500);
            }
        });
  
    
   

    $(".form-submission").validate({
        rules: {
            full_name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength:10,
                digits:true,
            },
            address: {
                required: true,
                minlength: 3
            },
            radio: "required",
        },
        messages: {
            full_name:{
                    require:"Please enter your Full Name",
                    minlength: "Your password must be at least 3 characters    long"
            },
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please provide a Phone",
                minlength: "Your password must be at least 10 characters long",
                maxlength: "Your password must be at least 10 characters long",
                digits: "Please enter only digits.",
            },
            address:{
                    require:"Please enter your Address",
                    minlength: "Your password must be at least 5 characters    long"
            },
            gender:{
                radio: "This is a required field"
            },
        },
        submitHandler: function(form) {
            $('.form-submit').submit(function(e){
            
                e.preventDefault();
                var frm = $(this);
                var form_btn = $(frm).find('input[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();

                frm.find('.frm-error').remove();
                $('#toast-erromsg').html(null).hide();
                frm.find('.border-danger').removeClass('border-danger');
                $('.preloader').show();
                var csrf = frm.find('#csrf-token').val();
                //--------

                if(csrf && csrf.length > 5) 
                {
                    $.ajax({
                        url: frm.attr('action'),
                        data: new FormData(this),
                        type: 'post',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(result){
                            update_token2(result);
                            $('input[name='+ csrf_token +']').attr('value',csrf_hash);
                            if(result.success == true){
                                if(result.rlink){
                                    window.location.href = result.rlink;
                                }else if(result.alert){
                                    frm.before(result.alert);
                                }else if(result.alert1){
                                    frm.before(result.alert1);
                                    frm.remove();
                                }else{
                                    location.reload();
                                }
                            }
                            else if(result.val == true){
                                $.each(result.message, function(key,value){
                                    var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
                                    if(value.length > 2){
                                        if(result.border == true){
                                            inpt.addClass('border-danger').after(value);
                                            //alert(value);
                                            $('#toast-erromsg').show().append(value);

                                        }else{
                                            inpt.addClass('border-danger').before(value);
                                        }
                                    }
                                });
                                setTimeout(function(){
                                    $('#toast-erromsg').fadeOut(600)
                                }, 3500);
                            }else{
                                
                                form_btn.before('<div id="form-result" class="alert alert-danger" role="alert" ></div>');
                
                                $(form_result_div).html(result.message.refrence).fadeIn('slow');
                                setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            }
                            $('.preloader').hide();
                        }
                    });
                }
                else
                {
                    $('.preloader').hide();
                    $('#toast-erromsg').show().append('CSRF Required');
                    setTimeout(function(){
                        $('#toast-erromsg').fadeOut(600)
                    }, 3500);
                }
            });
        }
    });
   
   
});


</script>
</html>