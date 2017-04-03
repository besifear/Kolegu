<!-- Route caktohet nga upvote ose downvote qe klikohet -->
<form id="voteQuestion-form"   method="POST" style="display: none;">
    <input type="hidden" id= "question_id" name="question_id" />

    {{ csrf_field() }}
</form>
