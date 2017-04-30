console.log('hello It\'s me mario');
$(document).ready(function(){

    var url = "/searches";
    var csrfToken = $("[name='_token']").first().val();
    var modalBody = $('#modal-body');
    
    //When the search bar gain's focus it show's the modal
    $('#search-input').on('focus',function(){
    	$('#toggle-modal-button').click();
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
    	$('#close-modal-button').click();
    	$('#search-input').blur();
       }
   });
    
    $('#search-input').on('input',function(){
    	
    	var searchKeyWords = $(this).val();
    	if(searchKeyWords.length == 0){
    		
    		$('#search-modal-content').removeClass('in');
    		
    	}else{
    		$('#search-modal-content').addClass('in');
    		$.ajax({
                type: "GET",
                url: url,
                 data: {
                     "_token": csrfToken,
                     "word": searchKeyWords
                 },
                success: function (data) {
                	if($('#search-result-list').length){
                		$('#search-result-list').remove();
                	}
                	if(data.questions.length == 0 && data.resources.length == 0){
            			$('#search-title').text('Nuk ka rezultat!');
                	}else{	
                	$('#search-title').text('Rezultati kërkimit:');
                	modalBody.append(
                			'<ul id="search-result-list" class="search-result-list">'
                	);
                	
                	var resultList = $('#search-result-list');
                	
                	if(data.questions.length !== 0){
	                	resultList.append('<h4> Pyetje </h4>');
	                	$.each(data.questions, function(key, value){	
	                			resultList.append(
	                    	        	'<li id = "questions-"'+value.id+'" >'+
	                                		'<a href= "/questions/'+value.id+'">'+
		                    	        		'<hr/>' +
		                            			'<h6>'+ value.title +'</h6>' +
		                                		'<hr/>' +
	                                		'</a>' +
	                                	'</li>'	
	            				);
	                	});
                	}
                	if(data.resources.length !== 0){
                		resultList.append('<h4> Resurse </h4>');
                    	$.each(data.resources, function(key, value){	
                    			resultList.append(
                        	        	'<li id = "resources-"'+value.id+'" >'+
	                        	        	'<a href= "/resources/'+value.id+'">'+
	                        	        	'<hr/>' +
	                                			'<h6>'+ value.title +'</h6>' +
	                                    		'<hr/>' +
	                                		'</a>'+
                                		'</li>'	
                				);
                    	});
                	}
                }
                },
                error: function (ts) {
                    console.log(csrfToken);
                    alert(ts.responseText);
                }
            });

    	}
    });
    









    //create new task / update existing task
    // $("#btn-save").click(function (e) {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     })
    //
    //     e.preventDefault();
    //
    //     var formData = {
    //         task: $('#task').val(),
    //         description: $('#description').val(),
    //     }
    //
    //     //used to determine the http verb to use [add=POST], [update=PUT]
    //     var state = $('#btn-save').val();
    //
    //     var type = "POST"; //for creating new resource
    //     var category_id = $('#category_id').val();;
    //     var my_url = url;
    //
    //     if (state == "update"){
    //         type = "PUT"; //for updating existing resource
    //         my_url += '/' + category_id;
    //     }
    //
    //     console.log(formData);
    //
    //     $.ajax({
    //
    //         type: type,
    //         url: my_url,
    //         data: formData,
    //         dataType: 'json',
    //         success: function (data) {
    //             console.log(data);
    //
    //             var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
    //             task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
    //             task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';
    //
    //             if (state == "add"){ //if user added a new record
    //                 $('#tasks-list').append(task);
    //             }else{ //if user updated an existing record
    //
    //                 $("#task" + category_id).replaceWith( task );
    //             }
    //
    //             $('#frmTasks').trigger("reset");
    //
    //             $('#myModal').modal('hide')
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //         }
    //     });
    // });
});
