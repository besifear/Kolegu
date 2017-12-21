<template>
      <div> 
      <ul class = "event-list answer answer-container clearfix" style="list-style: none;">
      <li class = "add-best-answer" >
        

        <ul class="event-list answer">
        <li>
          <div class="social">
            <ul>
                <li class="softgreen" style="width:33%;">
                    <a>
                      <button type="submit" id="addcorrectanswer">
                          <span class="glyphicon glyphicon-ok">
                          </span>
                      </button>
                    </a> 
                </li>
                        <li v-bind:class="{aqua: answer.my_up_vote == 1 }" class="facebook" style="width:33%;">
                    
                  <a>
                        <span class="glyphicon glyphicon-chevron-up">

                        </span>
                      <br>
                      <small>{{answer.answer_up_votes}}</small>
                  </a>
                  </li>
                        <li v-bind:class="{ lava: answer.my_down_vote = 1 }" class="twitter"  style="width:33%;">

                      <a>
                        <span class="glyphicon glyphicon-chevron-down">

                        </span>
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

            <div class="pull-right">
               <form accept-charset="UTF-8">
                <input value="Fshije" class="btn btn-danger btn-xs" type="submit">
              </form> 
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
    props:{
      answer: {}
    },
    data(){
      return {
        creator: answer.creator
      }
    }
  }
</script>