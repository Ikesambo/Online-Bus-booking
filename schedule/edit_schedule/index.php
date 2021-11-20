<html>  
    <head>  
        <title></title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">EDIT SCHEDULE PAGE</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<div class="table-responsive" id="user_data">
				
			</div>
			<br />
		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>From</label>
					 <select name="first_name" id="first_name" class="form-control" onchange="change()">
					    <option value=""></option>
						<option value="arcadia" id="arcadia" onclick="change()">ARCADIA</option>
						<option value="garankua" id="garankua" onclick="change()">GA-RANKUA</option>
						<option value="south" id="south" onclick="change()">SOSHANGUVE(SOUTH)</option>
					    <option value="north" id="north" onclick="change()">SOSHANGUVE(NORTH)</option>
						<option value="pretoria" id="pretoria" onclick="change()">PRETORIA</option>
					 </select>
					<span id="error_first_name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>To</label>
					 <select name="last_name" id="last_name" class="form-control">
					    <option value=""></option>
						<option value="arcadia" id="sec_arcadia" onclick="change()">ARCADIA</option>
						<option value="garankua" id="sec_garankua" onclick="change()">GA-RANKUA</option>						
						<option value="south" id="sec_south" onclick="change()">SOSHANGUVE(SOUTH)</option>
					    <option value="north" id="sec_north" onclick="change()">SOSHANGUVE(NORTH)</option>
						<option value="pretoria" id="sec_pretoria" onclick="change()">PRETORIA</option>
					 </select> 
                <span id="error_last_name" class="text-danger"></span>					 
				</div>
				<div class="form-group">
					<label>Time</label>
					<input type="time" name="time" id="time" class="form-control" />
					<span id="error_time" class="text-danger"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>
		
    </body>  
</html>  




<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_first_name = '';
		var error_last_name = '';
		if($('#first_name').val() == '')
		{
			error_first_name = 'Campus Name is required';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '#cc0000');
		}
		else
		{
			error_first_name = '';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '');
		}
		if($('#last_name').val() == '')
		{
			error_last_name = 'Campus Names is required';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '#cc0000');
		}
		else
		{
			error_last_name = '';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '');
		}
		if($('#time').val() == '')
		{
			error_time = 'Time is required';
			$('#error_time').text(error_time);
			$('#time').css('border-color', '#cc0000');
		}
		else
		{
			error_time = '';
			$('#error_time').text(error_time);
			$('#time').css('border-color', '');
		}
		
		if(error_first_name != '' || error_last_name != ''||error_time!='')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  

 function change(){
	 
	 var firstName=document.getElementById('first_name').value;
	 var secName=document.getElementById('last_name').value;
	 
	 if(firstName=='south'){
		 
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_south').disabled=true;
	 }
	 if(firstName=='north'){
		 
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_north').disabled=true;
	 }
	 if(firstName=='arcadia'){
		 
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_arcadia').disabled=true;
	 }
	 if(firstName=='garankua'){
	
		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_pretoria').disabled=false;
		 document.getElementById('sec_south').disabled=false;	
		 return document.getElementById('sec_garankua').disabled=true;
	 }
	 if(firstName=='pretoria'){

		 document.getElementById('sec_arcadia').disabled=false;
		 document.getElementById('sec_north').disabled=false;
		 document.getElementById('sec_south').disabled=false;
		 document.getElementById('sec_garankua').disabled=false;
		 return document.getElementById('sec_pretoria').disabled=true;
	 }
	 
 }
</script>