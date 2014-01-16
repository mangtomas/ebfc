!function ($) {
  $(function(){
    var $window = $(window);
		//when class to-show is click perform this event
		$('.to-show').click(function(event){
			event.preventDefault();
			var x = $(this).attr('data-show');
			$('#'+x).slideDown('slow');
		});

		//to hide element
		$('.to-hide').click(function(event){
			event.preventDefault();
			var x = $(this).attr('data-hide');
			$('#'+x).slideUp('fast');
		});
		/* start delete action
		*/
		var id = null;
		var temp_id = null;
		$('.delete').click(function(){
			$('#deleteLabel span').html($(this).attr('name'));
					temp_id = this.id;
					_id = temp_id.split('_');
					id = _id[_id.length-1];
					$('#cancel').html('Cancel');
					$('#yesDelete').show();	
		});

		$('#yesDelete').bind('click',function(event){
			event.preventDefault();
			$.post('http://localhost/ebfc/admin/api/action',{_delete:true,row:temp_id,key:id},function(data){
				if(data==1){
						$('#delete').modal('hide');
						$('#delete_'+id).fadeOut();
					}else{
						$('#yesDelete').hide();
						$('#cancel').html('Ok');
						$('#result').fadeIn('slow').addClass('alert alert-error').html('Unable to Delete. This role was use by another user.').css({'margin-botton':'5px!important'});
					}
				});
		});					 

		$('#delete').on('hide',function(){
			$('#result').removeClass('alert alert-error').html('Are you sure do you want to delete?');

		});
		
		 $('.checkall').on('click', function () {
				$(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
		});
		
	/* 	$('.check_item').on('click',function(){
			alert(this.id);
		}); */
		
		$("input[type='checkbox'].check_item").change(function(){
			var a = $("input[type='checkbox'].check_item");
			if(a.length == a.filter(":checked").length){
				$('.checkall').prop('checked', this.checked);
			}else{
				$('.checkall').prop('checked',false);
			}
		});
	})
}(window.jQuery);