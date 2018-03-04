<template>
  <div> 
    <ul v-bind:id="generateListId"  class = "event-list answer answer-container clearfix" style="list-style: none;">
      <p v-if="best_answer_id == answer.id"> Best Answer </p> 
      <li v-bind:class = "{ 'add-best-answer': (best_answer_id != answer.id),
      'remove-best-answer': (best_answer_id == answer.id)}" >
      <ul class="event-list answer">
        <li> 
          <div class="social">
            <ul>
              <li v-if="is_my_question == 1" class="softgreen" style="width:33%;">
                <a>
                  <button 
                  v-bind:id="generateButtonId" 
                  v-on:click="$emit('best-answer')">
                  <span class="glyphicon glyphicon-ok">
                  </span>
                </button>
              </a> 
            </li>
            <li v-on:click="voteRequest( 1 )" 
                v-bind:class="{aqua: answer.my_up_vote == 1 }" 
                class="facebook" 
                style="width:33%;">
              <a>
                <span class="glyphicon glyphicon-chevron-up"></span>
                <br>
                <small>{{answer.answer_up_votes}}</small>
              </a>
            </li>
            <li v-on:click="voteRequest( 0 )"
                v-bind:class="{ lava: answer.my_down_vote == 1 }" 
                class="twitter"  
                style="width:33%;">
              <a>
                <span class="glyphicon glyphicon-chevron-down"></span>
                <br>
                <small>{{answer.answer_down_votes}}</small>
              </a>
            </li>
          </ul>
        </div>
        <div class="info answerinfo">
          <p class="desc" v-html="answer.content"></p>
          <ul style="width: auto; float: left;" class="pull-right">
            <li><p style="font-size: 9pt;">Posted {{answer.diff_for_humans}}  by <a>{{ creator.username }}</a></p></li>
          </ul>
        </div>
   </li>
  </ul>
</li>
</ul>
<hr>
</div>
</template>

<script>
export default {
  props:[
  "answer",
  "creator",
  "is_my_question",
  "best_answer_id"
  ],
  data(){
    return {
    }
  }, 
  mounted(){
  },
  computed:{
    generateListId(){
      if ( this.isTheBestAnswer() ){
        return 'best-answer-container';
      }else{
        return '';
      }
    },
    generateButtonId(){
      if ( this.isTheBestAnswer() ){
        return 'removecorrectanswer';
      }else{
        return 'addcorrectanswer';
      }
    }
  },
  methods:{
    voteRequest( voteValue ){
      this.$emit('voted', this.answer, voteValue);
    },
    isTheBestAnswer(){
      return this.best_answer_id == this.answer.id;
    }
  }
}
</script>