var employee 	= new employee();

var employee_data = new FormData();
function employee()
{
	init();

	function init()
	{
		ready_document();

	}

	function ready_document()
	{
		$(document).ready(function()
		{
			add_employee();
        	update_employee();
        	delete_employee();
        	search_submit();
        	submit_employee();
        });
	}
	function add_employee()
	{
		$("body").on('click','.add-employee',function()
		{
			$('.alert').css('display','none');
			$('.name').val($(this).data('')); 
            $('.email').val($(this).data('')); 
			$('.modal-dialog').addClass('modal-md');
            $('.modal-title').html('ADD EMPLOYEE');
            $('.modal-link').val('/employee/add');
            
            $('.modal').modal('show');
            $('.modal-body').css('display','block');
            
        });
	}

	function update_employee()
	{
		$("body").on('click','.update-employee',function()
		{
			$('.alert').css('display','none');
            $('.id').val($(this).data('id')); 
            $('.name').val($(this).data('name')); 
            $('.email').val($(this).data('email')); 
            $('.modal-dialog').addClass('modal-md');
            $('.modal-title').html('UPDATE INFORMATION');
            $('.modal-link').val('/employee/update');
            $('.modal').modal('show');
            $('.modal-body').css('display','block');
            
        });
	}

	

	function delete_employee()
	{
		$("body").on('click','.delete-employee',function()
		{
            $('.id').val($(this).data('id'));
            $('.alert').css('display','none');
            $('.modal-dialog').addClass('modal-sm');
            $('.modal-title').html('ARE YOU SURE YOU WANT TO PROCEED?');
            $('.modal-link').val('/employee/delete');
            $('.modal').modal('show');
            $('.modal-body').css('display','none');
        });
	}

	function search_submit()
	{
		$("body").on('click','.submit-search',function()
		{
            employee_data.append("key", 		$('.search-key').val());

            $.ajax({
				headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},

				url:"/search/submit",
				data:employee_data,
				method: "POST",
				contentType:false,
        	    cache:false,
        	    processData:false,
	            success: function(data)
				{
					$('.table-data').html(data);
				}
			});
        });
	}
    

    function submit_employee()
    {
    	$("body").on('click','.submit-employee',function()
		{
            employee_data.append("name", 		$('.name').val());
            employee_data.append("id", 		    $('.id').val());
            employee_data.append("email", 		$('.email').val());
            employee_data.append("password", 		$('.password').val());
            employee_data.append("action", 		$('.modal-action').val());



            var method  = $('.modal-method').val();
            var link  = $('.modal-link').val();

			$.ajax({
				headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},

				url:link,
				data:employee_data,
				method: "POST",
				contentType:false,
        	    cache:false,
        	    processData:false,
	            success: function(data)
				{
					$('.alert').css('display','block');
					$('.alert').html('<div class="alert alert-warning"><strong>Alert!</strong>'+data+'</div>')
				}
			});
		});
    	
    }
    
    


	
}