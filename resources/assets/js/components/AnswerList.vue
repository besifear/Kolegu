<template>
	<div>	
		<answer-item v-for="answer in answersList" 
					 v-bind:answer="answer"
					 v-bind:creator="answer.creator"
					 v-bind:question_id="question_id" 
					 v-bind:is_my_question="is_my_question"
					 v-bind:best_answer_id="modifiable_best_answer_id"
					 v-bind:key="answer.id"
					 v-on:best-answer="addOrRemoveBestAnswer( answer )"
					 v-on:voted="addMyVote"></answer-item>	
	</div>
</template>

<script>
	export default{
		
		props: [
			'best_answer_id',	
			'question_id',
			'is_my_question',
			'question_author_id'
		],
		data(){
			return {
				answersList: [],
				modifiable_best_answer_id : this.best_answer_id
			}
		},
		methods:{
			addMyVote( answer, vote ){
				var csrfToken = $("[name='_token']").first().val();
				var originalAnswer = this.answersList.find( function( answerItem ){
					return answerItem.id == answer.id;
				});
		
				if ( vote == 1 && answer.my_up_vote == 1){
					// If the user is removing his upvote
					console.log( 'the user is removing his upvote' );	
					originalAnswer.my_up_vote = 0;
					originalAnswer.answer_up_votes--; 
				}else if ( vote ==1 && answer.my_up_vote == 0 && answer.my_down_vote == 0){
					//  If the user is making the upvote	
					console.log( 'the user is making the upvote');	
					originalAnswer.my_up_vote = 1;
					originalAnswer.answer_up_votes++; 
				}else if ( vote ==1 && answer.my_up_vote == 0 && answer.my_down_vote == 1){
					// If the user is converting his/her downvote to an upvote
					console.log( 'the user is converting his/her downvote to an upvote' );	
					originalAnswer.my_up_vote = 1;
					originalAnswer.answer_up_votes ++;
					
					originalAnswer.my_down_vote = 0;
					originalAnswer.answer_down_votes --;	
				}else if ( vote == 0 && answer.my_down_vote == 1){
					//If the user is removing his downvote
					console.log( 'the user is removing his downvote' );
					originalAnswer.my_down_vote = 0;
					originalAnswer.answer_down_votes--;
				}else if ( vote == 0 && answer.my_up_vote == 0 && answer.my_down_vote == 0){
					// If the user is making a downVote
					console.log( 'the user is making a downVote' );
					originalAnswer.my_down_vote = 1;
					originalAnswer.answer_down_votes++;
				}else if ( vote ==0 && answer.my_up_vote == 1 && answer.my_down_vote == 0){
					//If the user is converting his/her upvote to a downvote	
					console.log( 'the user is converting his/her upvote to a downvote' );
					originalAnswer.my_down_vote = 1;
					originalAnswer.answer_down_votes ++;

					originalAnswer.my_up_vote = 0;
					originalAnswer.answer_up_votes--;
				}

				$.ajax({
	                type: "post",
	                url: '/answer-vote',
	                data: {
	            		"_token": csrfToken,
	            		"answer_id": answer.id,
	            		"vote": vote,
	            		"question_author_id": this.question_author_id
	                },
	                success: function (data) {
	                },
	                error: function (ts) {
	                	if ( ts.responseText.includes('"error":"Unauthenticated."') ){
	                		window.location = "/login";	
	                	}else{
	                    	alert(ts.responseText);
	                	}
	                }
	            });				
			},
			addOrRemoveBestAnswer( answer ){
            	var suppliedAnswerId;
            	var best_answer_id = this.modifiable_best_answer_id;
            	// Checks if this answer already is the best answer.
            	if ( best_answer_id == answer.id ){
        			suppliedAnswerId = 'remove-best-answer';
            	}else{
            		suppliedAnswerId = answer.id;
            	}
            	
            	// If yes removes it as best answer
            	// If no adds it as best answer
            	if ( suppliedAnswerId == 'remove-best-answer' ){
            		this.modifiable_best_answer_id = null;
            	}else{
            		this.modifiable_best_answer_id = suppliedAnswerId;
            	}

            	var csrfToken = $("[name='_token']").first().val();
				$.ajax({
	                type: "post",
	                url: '/questions/' + this.question_id,
	                data: {
	            		"_token": csrfToken,
	            		"answer_id": suppliedAnswerId,
	               		"_method": 'PUT' 
	                },
	                success: function (data) {
	                	// The reason the same modification is made before and on success of the ajax 
	                	// request is to have a better User Experience and it's left here in case
	                	// the request is returning some error
	                	console.log( data );
	                	if ( suppliedAnswerId == 'remove-best-answer' ){
	                		this.modifiable_best_answer_id = null;
	                	}else{
	                		this.modifiable_best_answer_id = suppliedAnswerId;
	                	}	
	                }.bind(this),
	                error: function (ts) {
	                    alert(ts.responseText);
	                }
	            });
			}
		},
		mounted(){
			var answersList = this.answersList;

            $.ajax({
                type: "GET",
                url: '/getQuestionAnswers/' + this.question_id,
                success: function (data) {
                	console.log( data );
                   	$.each( data, function( index, value ){
               			answersList.push( value );
                   	} );
                },
                error: function (ts) {
                    alert(ts.responseText);
                }
            });
		}

	}
</script>
