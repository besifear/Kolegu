
$(document).ready(function(){

    var url = "/questions/update";
    var csrfToken = $("[name='_token']").first().val();
    var answersContainer = $('#answer-container');
    var bestAnswerContainer = $('#best-answer-container');

    //delete task and remove it from list
    $('.choosing-best-answer').click(function(){
        event.preventDefault();

        var answerButton = $(this);
        var answerId = answerButton.val();
        var answer = $("#answer-"+answerId);
        var questionId = $("[name='question_id']").first().val();
        console.log("answer:" +answerId +"pyetja:" +questionId + "  HTML element answer: "+ answer);
             $.ajax({
                type: "POST",
                url: url + '/' + questionId,
                 data: {
                     "_method": "PUT",
                     "_token": csrfToken,
                     "id": questionId,
                     "answer_id":answerId
                 },
                success: function (data) {
                    if(answer.hasClass('remove-best-answer')){
                        answer.removeClass('remove-best-answer');
                        answer.appendTo(answersContainer);
                        answer.addClass('add-best-answer');

                    }else if( category.hasClass('available-category')){
                        answer.removeClass('add-best-answer');
                        answer.appendTo(bestAnswerContainer);
                        answer.addClass('remove-best-answer');
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