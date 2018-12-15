$(document).ready(function(){
	/*code add*/
	$(document).on("click",".createing",function(){
    /*code for validation*/
    $('#username').parent().find('.error_message').addClass('hide');
    $('#username').parent().find('.error_message').html('');
    $('#username').css('border','1px solid grey');
    $('#datepicker').parent().find('.error_message').addClass('hide');
    $('#datepicker').parent().find('.error_message').html('');
    $('#datepicker').css('border','1px solid grey');
    $('#agecountnew').parent().find('.error_message').addClass('hide');
    $('#agecountnew').parent().find('.error_message').html('');
    $('#agecountnew').css('border','1px solid grey');
    $('#departmentnew').parent().find('.error_message').addClass('hide');
    $('#departmentnew').parent().find('.error_message').html('');
    $('#departmentnew').css('border','1px solid grey');
    $('#designationnw').parent().find('.error_message').addClass('hide');
    $('#designationnw').parent().find('.error_message').html('');
    $('#designationnw').css('border','1px solid grey');
    $('#salary').parent().find('.error_message').addClass('hide');
    $('#salary').parent().find('.error_message').html('');
    $('#salary').css('border','1px solid grey');
    $('#images').parent().find('.error_message').addClass('hide');
    $('#images').parent().find('.error_message').html('');
    $('#images').css('border','1px solid grey');
    /*end*/
    /*Select sum(salary) from table_name where month in (select max(month) from table_name group by empid)*/

		$.ajaxSetup({
    	headers: {
     	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
   	});
   		var formdata = new FormData($('#alldata')[0]);
   		//var formdata= $("#alldata").serialize();
   		jQuery.ajax({
      	url: '',
      	data:formdata,
      	type:"POST",
      	cache:false,
      	contentType: false,
    	  processData:false,
      	dataType:"json",  
      	success: function(response){
        if(response.success == 0){
          $.each(response.successmsg, function(key, value) {
          if(key == 'name'){
          $('#username').parent().find('.error_message').removeClass('hide');
          $('#username').parent().find('.error_message').html('').html(value);
          $('#username').css('border','1px solid red');
          }
          
          if(key == 'date_of_birth'){
            $('#datepicker').parent().find('.error_message').removeClass('hide');
            $('#datepicker').parent().find('.error_message').html('').html(value);
            $('#datepicker').css('border','1px solid red');
          }
          if(key == 'agecount'){
            
            $('#agecountnew').parent().find('.error_message').removeClass('hide');
            $('#agecountnew').parent().find('.error_message').html('').html(value);
            $('#agecountnew').css('border','1px solid red');
          }
          if(key == 'department'){
            
            $('#departmentnew').parent().find('.error_message').removeClass('hide');
            $('#departmentnew').parent().find('.error_message').html('').html(value);
            $('#departmentnew').css('border','1px solid red');
          }
          if(key == 'designation'){
            
            $('#designationnw').parent().find('.error_message').removeClass('hide');
            $('#designationnw').parent().find('.error_message').html('').html(value);
            $('#designationnw').css('border','1px solid red');
          }
          if(key == 'salarynew'){
            
            $('#salary').parent().find('.error_message').removeClass('hide');
            $('#salary').parent().find('.error_message').html('').html(value);
            $('#salary').css('border','1px solid red');
          }
          if(key == 'image'){
            $('#images').parent().find('.error_message').removeClass('hide');
            $('#images').parent().find('.error_message').html('').html(value);
            $('#images').css('border','1px solid red');
          }
          });
    }
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      if(response.success==1){
      jQuery.ajax({
      url: 'fetchalldata',
      type:"POST",
      cache:false,
      dataType:"json",  
      success: function(response){
        if(response.success==1){
          var baseurl=window.location.origin;
          var str="";
           str+="<table style='width:100%'><tr><th>name</th><th>image</th><th>department</th><th>designation</th><th>Age</th><th>salary</th></tr>"
          $.each(response.data, function (index, value) {
             str+="<tr><td>"+value.name+"</td><td><img class='imageuser' src='"+baseurl+"/stucarepractice/public/image/"+value.image+"'></td><td>"+value.department+"</td><td>"+value.designation+"</td><td>"+value.agecount+"</td><td>"+value.salary+"</td></tr>";
          //console.log(value);
        
});            
 str+="</table>"; 
 str+="<label>name:</label><input type='text' name='name' id='namenew'>";

          $(".fetchalldata").append(str);
          
        }      
      }
     });
          }
          
          // if(response.success==1){
          //   console.log();
          // }
          
      	}
     }); 

	});
	/*end*/
	$('.leave_response').on('change', function() {
    var departmentid = $(this).val();
    $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
     if(departmentid != ''){
   	 jQuery.ajax({
      url: 'department',
      data:{departmentid:departmentid},
      type:"POST",
      cache:false,
      dataType:"json",  
      success: function(response){
      	if(response.success==1){
          $.each(response.data, function (index, value) {

            $("#designationnw").val(value.designation);
          });
        }    
      }
     }); 
    }
});
/*$(document).on("click",".createing",function(){
	
})*/
 $( "#datepicker" ).datepicker();
});

/*code for search name wise in jquery*/
$(document).ready(function(){
$(document).on('blur',"#namenew",function(){
  var name=$(this).val();
  
  //var name=$("#namenew").val();
  if(name!=""){
    $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
    jQuery.ajax({
      url: 'namesearch',
      data:{name:name},
      type:"POST",
      cache:false,
      dataType:"json",  
      success: function(response){
        if(response.success==1){
          var baseurl=window.location.origin;
          $.each(response.data, function (index, value) {
            var searchdata="";
          searchdata+="<div><label>name:</label><span>"+value.name+"</span></div><div><label>dob:</label><span>"+value.dob+"</span></div><div><label>age:</label><span>"+value.agecount+"</span></div></div><label>designation:</label><span>"+value.designation+"</span><div><label>department:</label><span>"+value.department+"</span><div><div><label>salary:</label><span>"+value.salary+"</span><div><label>image:</label><span><img class='myuserpic' src='"+baseurl+"/stucarepractice/public/image/"+value.image+"'></span></div>";
          $(".usersearch").append(searchdata);
          });
          
        }else{
          $(".usersearch").append("<h4>no data found</h4>");
        }
             
      }
     });

  }
})
});
/*end*/

function myFunction(event){
	
	//alert($(event).val());
	var dob=$(event).val().split('/');
	var monthThen = dob[0];
	var dayThen = dob[1];
	var yearThen = dob[2];
	var today = new Date();
	var birthday = new Date(yearThen, monthThen-1, dayThen);
   	var differenceInMilisecond = today.valueOf() - birthday.valueOf();
	var year_age = Math.floor(differenceInMilisecond / 31536000000);
    var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
	if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
            alert("Happy B'day!!!");
    }
    var month_age = Math.floor(day_age/30);
    var day_age = day_age % 30;
    //alert("day"+day_age+"month"+month_age+"year"+year_age);
     $("#agecountnew").val("you are"+" "+year_age+ " year "+" " +month_age+ "  month "+" " +day_age+ " day ");
	//$("#agecount").val(date);
}

/*ajax call after select data from dropdown*/

/*end*/
