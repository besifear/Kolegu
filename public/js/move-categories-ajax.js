console.log('hello It\'s me mario');
$(document).ready(function(){

    var url = "/Kategorite";
    var availableCategoriesList = $('#available-categories-list');
    var selectedCategoriesList = $('#selected-categories-list')
    var csrfToken = $("[name='_token']").first().val();

    //delete task and remove it from list
    $('.moving-category').click(function(){
        event.preventDefault();

        var category = $(this);
        var category_id = category.val();
        var categoryElement = $('#category-'+category_id);
             $.ajax({
                type: "POST",
                url: url + '/' + category_id,
                 data: {
                     "_token": csrfToken,
                     "id": category_id
                 },
                success: function (data) {
                    if(category.hasClass('selected-category')){
                        category.removeClass('selected-category');
                        categoryElement.prependTo(availableCategoriesList);
                        category.addClass('available-category');
                    }else if( category.hasClass('available-category')){
                        category.removeClass('available-category');
                        categoryElement.appendTo(selectedCategoriesList);
                        category.addClass('selected-category');
                    }
                },
                error: function (ts) {
                    console.log(csrfToken);
                    alert(ts.responseText);
                }
            });
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