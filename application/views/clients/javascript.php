<?php defined('BASEPATH') or die('Restricted direct access')?>
<script>
main_id_address = "<?php echo $address->ID?>";
<?php //Langauge?>
submit = "<?php echo LTEXT('_global_save_submitbutton')?>";
search = "<?php echo LTEXT('_search_addresses')?>";
add = "<?php echo LTEXT('_global_add')?>";
update = "<?php echo LTEXT('_global_update')?>";
want_to_remove_add_addrs = "<?php echo LTEXT('_want_to_remove_add_addrs')?>";
want_to_remove_add_data = "<?php echo LTEXT('_want_to_remove_add_data')?>";
want_to_remove_contact = "<?php echo LTEXT('_want_to_remove_contact')?>";
want_to_remove_incharge = "<?php echo LTEXT('_want_to_remove_incharge')?>";
want_to_remove_search_profile = "<?php echo LTEXT('_want_to_remove_search_profile') ?>";
want_to_remove_additional_task = "<?php echo LTEXT('_want_to_remove_additional_task')?>";
want_to_remove_contacthistory = "<?php echo LTEXT('_want_to_remove_contacthistory')?>";
<?php //Additional address?>
target_url_add = "<?php echo base_url('clients/add_address_ajax')?>";
target_url_search = "<?php echo base_url('clients/search_addresses_ajax')?>";
target_url_add_confirm = "<?php echo base_url('clients/add_address_confirm_ajax')?>";
target_url_add_confirm_post = "<?php echo base_url('clients/add_address_post_ajax')?>";
target_update_addresses = "<?php echo base_url('clients/update_additional_addresses_ajax')?>";
target_remove_additional_address = "<?php echo base_url('clients/remove_additional_address_ajax')?>";
target_edit_additional_address = "<?php echo base_url('clients/edit_additional_address_ajax')?>";
target_update_data = "<?php echo base_url('clients/update_additional_data_ajax')?>";
target_url_add_data = "<?php echo base_url('clients/add_data_ajax')?>";
target_remove_additional_data = "<?php echo base_url('clients/remove_additional_data_ajax')?>";
target_url_edit_data ="<?php echo base_url('clients/edit_data_ajax')?>";
target_url_add_contact = "<?php echo base_url('clients/add_contact_ajax')?>";
target_update_contact = "<?php echo base_url('clients/update_additional_contact_ajax')?>";
target_remove_additional_contact = "<?php echo base_url('clients/remove_additional_contact_ajax')?>";
target_url_edit_contact = "<?php echo base_url('clients/edit_contact_ajax')?>";
target_url_add_incharge = "<?php echo base_url('clients/add_incharge_ajax')?>";
target_update_incahrge = "<?php echo base_url('clients/update_additional_incharge_ajax')?>";
target_remove_additional_incharge = "<?php echo base_url('clients/remove_additional_incharge_ajax')?>";
target_url_edit_incharge = "<?php echo base_url('clients/edit_incharge_ajax')?>";
target_url_search_profile = "<?php echo base_url('clients/search_profile_ajax')?>";
target_update_search_profile = "<?php echo base_url('clients/update_search_profile_ajax')?>";
target_remove_search_profile = "<?php echo base_url('clients/remove_search_profile_ajax')?>";
target_load_profiles = "<?php echo base_url('clients/load_profiles_ajax')?>";
target_url_add_task = "<?php echo base_url('clients/add_task_ajax')?>";
target_update_add_task = "<?php echo base_url('clients/update_add_task_ajax') ?>";
target_remove_additional_task = "<?php echo base_url('clients/remove_add_task_ajax')?>";
target_url_edit_task = "<?php echo base_url('clients/edit_task_ajax')?>";
target_url_add_contacthistory = "<?php echo base_url('clients/add_contacthistory_ajax')?>";
target_update_add_contacthistory = "<?php echo base_url('clients/update_contacthistory_ajax') ?>";
target_remove_contacthistory = "<?php echo base_url('clients/remove_contacthistory')?>";
target_url_edit_contacthistory = "<?php echo base_url('clients/edit_contacthistory_ajax')?>";

$(document).on('click','.add-address-btn',function(){
    $.ajax({url: target_url_add, success: function(result){
        $("#add-address-target").html(result);
        $("#add-address-modal").modal("show");
        $("#search-addresses-btn").html(submit);
        reset_classes();
        $("#search-addresses-btn").addClass('search-addresses-btn');
    }});
});
serialized_data='';
$(document).on('click','.search-addresses-btn',function(){
	serialized_data = $('#search-address-form').serialize();
    $.ajax({  type:'POST',url: target_url_search+'/'+1,data : serialized_data, success: function(result){
    	reset_classes();
        $('#add-address-target').html(result);
		$("#search-addresses-btn").addClass('add-address-btn');
        $("#search-addresses-btn").html(search);
    }});
});
$(document).on('click','.left-page-btn',function(){
	if($(this).hasClass('disabled'))
	{
		return;
	}
	page = parseInt($(this).attr('data-page'))-1;
	$.ajax({  type:'POST',url: target_url_search+'/'+page,data : serialized_data, success: function(result){
    	reset_classes();
        $('#add-address-target').html(result);
		$("#search-addresses-btn").addClass('add-address-btn');
        $("#search-addresses-btn").html(search);
    }});
});
$(document).on('click','.right-page-btn',function(){
	if($(this).hasClass('disabled'))
	{
		return;
	}
	page = parseInt($(this).attr('data-page'))+1;
    $.ajax({  type:'POST',url: target_url_search+'/'+page,data : serialized_data, success: function(result){
    	reset_classes();
        $('#add-address-target').html(result);
		$("#search-addresses-btn").addClass('add-address-btn');
        $("#search-addresses-btn").html(search);
    }});
});
$(document).on('click','.select-address-btn',function(){
	id_address = $(this).attr('data-id_address');
	$.ajax({  url: target_url_add_confirm+'/'+id_address, success: function(result){
		$('#add-address-target').html(result);
		reset_classes();
		$("#search-addresses-btn").addClass('add-address-btn');
		$("#add-address-confirm-btn").removeClass('hide');
    }});
});
$(document).on('click','#add-address-confirm-btn',function(){
	serialized_data = $('#add-address-confirm-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
	serialized_data['id_address']=main_id_address;
	$.ajax({  type:'POST',url: target_url_add_confirm_post,data : serialized_data, success: function(result){
		$('#add-address-target').html(result);
		reset_classes();
		$("#search-addresses-btn").addClass('add-address-btn');
		$.ajax({  url: target_update_addresses+'/'+main_id_address, success: function(result){
			$('#target-additional-address').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-address',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_add_addrs))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_additional_address+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-address').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-address',function(event){
	event.preventDefault();
	id = $(this).attr('data-id_address');
	$.ajax({url: target_edit_additional_address+'/'+id+'/'+main_id_address, success: function(result){
        $("#add-address-target").html(result);
        $("#add-address-modal").modal("show");
        reset_classes();
        $("#search-addresses-btn").addClass('add-address-btn');
        $("#search-addresses-btn").html(search);
        $("#edit-address-confirm-btn").removeClass('hide');
    }});
});
$(document).on('click','#edit-address-confirm-btn',function(event){
	event.preventDefault();
	alert('awsome');
});	
function reset_classes()
{
	$("#search-addresses-btn").removeClass('search-addresses-btn').removeClass('add-address-btn');
    if(!$('#add-address-confirm-btn').hasClass('hide'))
    {
    	$('#add-address-confirm-btn').addClass('hide');
    }
    if(!$('#edit-address-confirm-btn').hasClass('hide'))
    {
    	$('#edit-address-confirm-btn').addClass('hide');
    }
}
$(document).on('click','.add-data-btn',function(){
    $.ajax({url: target_url_add_data, success: function(result){
        $("#add-data-target").html(result);
        if(!$('#post-data-btn').hasClass('post-data-btn'))
        {
        	$('#post-data-btn').addClass('post-data-btn');
        }
        $('#post-data-btn').removeClass('post-data-update-btn');
        $('#post-data-btn').html(submit);
        $("#add-data-modal").modal("show");
    }});
});
$(document).on('click','.post-data-btn',function(){
	serialized_data = $('#add-data-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_add_data, success: function(result){
        $("#add-data-target").html(result);
        $.ajax({  url: target_update_data+'/'+main_id_address, success: function(result){
			$('#target-additional-data').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-data',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_add_data))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_additional_data+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-data').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-data',function(){
	id = $(this).attr('data-id_address');
    $.ajax({url: target_url_edit_data+'/'+id, success: function(result){
        $("#add-data-target").html(result);
        if(!$('#post-data-btn').hasClass('post-data-update-btn'))
        {
        	$('#post-data-btn').addClass('post-data-update-btn');
        }
        $('#post-data-btn').removeClass('post-data-btn');
        $('#post-data-btn').html(update);
        $("#add-data-modal").modal("show");
    }});
});
$(document).on('click','.post-data-update-btn',function(){
	id = $('#hidden-data-id').val();
	serialized_data = $('#add-data-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_edit_data+'/'+id, success: function(result){
        $("#add-data-target").html(result);
        $.ajax({  url: target_update_data+'/'+main_id_address, success: function(result){
			$('#target-additional-data').html(result);
	    }});
    }});
});
$(document).on('click','.add-contact-btn',function(){
    $.ajax({url: target_url_add_contact, success: function(result){
        $("#add-contact-target").html(result);
        if(!$('#post-contact-btn').hasClass('post-contact-btn'))
        {
        	$('#post-contact-btn').addClass('post-contact-btn');
        }
        $('#post-contact-btn').removeClass('post-contact-update-btn');
        $('#post-contact-btn').html(submit);
        $("#add-contact-modal").modal("show");
    }});
});
$(document).on('click','.post-contact-btn',function(){
	serialized_data = $('#add-contact-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_add_contact, success: function(result){
        $("#add-contact-target").html(result);
        $.ajax({  url: target_update_contact+'/'+main_id_address, success: function(result){
			$('#target-additional-contact').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-contact',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_contact))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_additional_contact+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-contact').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-contact',function(){
	id = $(this).attr('data-id_address');
    $.ajax({url: target_url_edit_contact+'/'+id, success: function(result){
        $("#add-contact-target").html(result);
        if(!$('#post-contact-btn').hasClass('post-contact-update-btn'))
        {
        	$('#post-contact-btn').addClass('post-contact-update-btn');
        }
        $('#post-contact-btn').removeClass('post-contact-btn');
        $('#post-contact-btn').html(update);
        $("#add-contact-modal").modal("show");
    }});
});
$(document).on('click','.post-contact-update-btn',function(){
	id = $('#hidden-contact-id').val();
	serialized_data = $('#add-contact-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_edit_contact+'/'+id, success: function(result){
        $("#add-contact-target").html(result);
        $.ajax({  url: target_update_contact+'/'+main_id_address, success: function(result){
			$('#target-additional-contact').html(result);
	    }});
    }});
});
$(document).on('click','.add-incharge-btn',function(){
    $.ajax({url: target_url_add_incharge, success: function(result){
        $("#add-incharge-target").html(result);
        if(!$('#post-incharge-btn').hasClass('post-incharge-btn'))
        {
        	$('#post-incharge-btn').addClass('post-incharge-btn');
        }
        $('#post-incharge-btn').removeClass('post-incharge-update-btn');
        $('#post-incharge-btn').html(submit);
        $("#add-incharge-modal").modal("show");
    }});
});
$(document).on('click','.post-incharge-btn',function(){
	serialized_data = $('#add-incharge-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_add_incharge, success: function(result){
        $("#add-incharge-target").html(result);
        $.ajax({  url: target_update_incahrge+'/'+main_id_address, success: function(result){
			$('#target-additional-incharge').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-incharge',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_incharge))
	{
		id = $(this).attr('data-id_incharge');
		$.ajax({  url: target_remove_additional_incharge+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-incharge').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-incharge',function(){
	id = $(this).attr('data-id_incharge');
    $.ajax({url: target_url_edit_incharge+'/'+id, success: function(result){
        $("#add-incharge-target").html(result);
        if(!$('#post-incharge-btn').hasClass('post-incharge-update-btn'))
        {
        	$('#post-incharge-btn').addClass('post-incharge-update-btn');
        }
        $('#post-incharge-btn').removeClass('post-incharge-btn');
        $('#post-incharge-btn').html(update);
        $("#add-incharge-modal").modal("show");
    }});
});
$(document).on('click','.post-incharge-update-btn',function(){
	id = $('#hidden-incharge-id').val();
	serialized_data = $('#add-incharge-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_edit_incharge+'/'+id, success: function(result){
        $("#add-incharge-target").html(result);
        $.ajax({  url: target_update_incahrge+'/'+main_id_address, success: function(result){
			$('#target-additional-incharge').html(result);
	    }});
    }});
});
$(document).on('click','.search-profile-btn',function(){
    $.ajax({url: target_url_search_profile, success: function(result){
        $("#search-profile-target").html(result);
        $("#search-profile-modal").modal("show");
    }});
});
$(document).on('click','.post-search-profile-btn',function(){
	serialized_data = $('#search-profile-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_search_profile, success: function(result){
        $("#search-profile-target").html(result);
        $.ajax({  url: target_update_search_profile+'/'+main_id_address, success: function(result){
			$('#target-search-profile').html(result);
	    }});
    }});
});
$(document).on('click','.remove-search-profile',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_search_profile))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_search_profile+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-search-profile').html(result);
	    }});
	}
});
$(document).on('click','.load-profiles',function(event){
	event.preventDefault();
	id = $(this).attr('data-id_address');
	$.ajax({  url: target_load_profiles+'/'+id+'/'+main_id_address, success: function(result){
		$('#target-search-profile').html(result);
    }});
});
$(document).on('click','.add-task-btn',function(){
    $.ajax({url: target_url_add_task, success: function(result){
        $("#add-task-target").html(result);
        $( '.mydatepicker' ).datepicker({
        	 dateFormat: "yy-mm-dd"
        });
        if(!$('#post-task-btn').hasClass('post-task-btn'))
        {
        	$('#post-task-btn').addClass('post-task-btn');
        }
        $('#post-task-btn').removeClass('post-task-update-btn');
        $('#post-task-btn').html(submit);
        $("#add-task-modal").modal("show");
    }});
});
$(document).on('click','.post-task-btn',function(){
	serialized_data = $('#add-task-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_add_task, success: function(result){
        $("#add-task-target").html(result);
        $( '.mydatepicker' ).datepicker({
       	 dateFormat: "yy-mm-dd"
       });
        $.ajax({  url: target_update_add_task+'/'+main_id_address, success: function(result){
			$('#target-additional-task').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-task',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_additional_task))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_additional_task+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-task').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-task',function(){
	id = $(this).attr('data-id_address');
    $.ajax({url: target_url_edit_task+'/'+id, success: function(result){
        $("#add-task-target").html(result);
        $( '.mydatepicker' ).datepicker({
        	 dateFormat: "yy-mm-dd"
        });
        if(!$('#post-task-btn').hasClass('post-task-update-btn'))
        {
        	$('#post-task-btn').addClass('post-task-update-btn');
        }
        $('#post-task-btn').removeClass('post-task-btn');
        $('#post-task-btn').html(update);
        $("#add-task-modal").modal("show");
    }});
});
$(document).on('click','.post-task-update-btn',function(){
	id = $('#hidden-task-id').val();
	serialized_data = $('#add-task-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_edit_task+'/'+id, success: function(result){
        $("#add-task-target").html(result);
        $.ajax({  url: target_update_add_task+'/'+main_id_address, success: function(result){
			$('#target-additional-task').html(result);
	    }});
    }});
});
$(document).on('click','.add-contacthistory-btn',function(){
    $.ajax({url: target_url_add_contacthistory, success: function(result){
        $("#add-contacthistory-target").html(result);
        if(!$('#post-contactistory-btn').hasClass('post-contacthistory-btn'))
        {
        	$('#post-contacthistory-btn').addClass('post-contacthistory-btn');
        }
        $('#post-contacthistory-btn').removeClass('post-contacthistory-update-btn');
        $('#post-contacthistory-btn').html(submit);
        $("#add-contacthistory-modal").modal("show");
    }});
});
$(document).on('click','.post-contacthistory-btn',function(){
	serialized_data = $('#add-contacthistory-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_add_contacthistory, success: function(result){
        $("#add-contacthistory-target").html(result);
        $.ajax({  url: target_update_add_contacthistory+'/'+main_id_address, success: function(result){
			$('#target-additional-contacthistory').html(result);
	    }});
    }});
});
$(document).on('click','.remove-additional-contacthistory',function(event){
	event.preventDefault();
	if(confirm(want_to_remove_contacthistory))
	{
		id = $(this).attr('data-id_address');
		$.ajax({  url: target_remove_contacthistory+'/'+id+'/'+main_id_address, success: function(result){
			$('#target-additional-contacthistory').html(result);
	    }});
	}
});
$(document).on('click','.edit-additional-contacthistory',function(){
	id = $(this).attr('data-id_address');
    $.ajax({url: target_url_edit_contacthistory+'/'+id, success: function(result){
        $("#add-contacthistory-target").html(result);
        if(!$('#post-contacthistory-btn').hasClass('post-contacthistory-update-btn'))
        {
        	$('#post-contacthistory-btn').addClass('post-contacthistory-update-btn');
        }
        $('#post-contacthistory-btn').removeClass('post-contacthistory-btn');
        $('#post-contacthistory-btn').html(update);
        $("#add-contacthistory-modal").modal("show");
    }});
});
$(document).on('click','.post-contacthistory-update-btn',function(){
	id = $('#hidden-contacthistory-id').val();
	serialized_data = $('#add-contacthistory-form').serializeArray();
	serialized_data.push({name: "id_address",value:  main_id_address});
    $.ajax({type : 'POST' ,data : serialized_data,url: target_url_edit_contacthistory+'/'+id, success: function(result){
        $("#add-contacthistory-target").html(result);
        $.ajax({  url: target_update_add_contacthistory+'/'+main_id_address, success: function(result){
			$('#target-additional-contacthistory').html(result);
	    }});
    }});
});
</script>