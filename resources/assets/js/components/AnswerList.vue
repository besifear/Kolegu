<template>
	<div>	
		<answer-item v-for="answer in answersList" v-bind:key="answer.id"></answer-item>	
	</div>
</template>

<script>
	export default{
		
		props: {
			questionid: ""
		},
		data(){
			return {
				answersList: [] 
			}
		},
		mounted(){
			var answersList = this.answersList;
            var csrfToken = $("[name='_token']").first().val();

            $.ajax({
                type: "POST",
                url: '/getQuestionAnswers/' + this.questionid,
                data: {
                    "_token": csrfToken
                },
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
