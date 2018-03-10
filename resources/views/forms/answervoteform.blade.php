<form id="voteAnswer-form"   method="POST" style="display: none;">
    <input type="hidden" id= "answer_id" name="answer_id" />
   	<input type="hidden" id = "vote" name="vote" /> 
   	<input type="hidden" id = "question_author_id" name = "question_author_id" /> 
    {{ csrf_field() }}
</form>