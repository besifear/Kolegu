<template>
	<div class="col-md-9 col-sm-8 col-xs-6" id="search">
	          <div class="input-group">
	              <input id = "search-input" v-model="query" v-on:keydown.enter="addQuestion"
	              		 class="form-control"autocomplete="off"
	               		 type="text" placeholder="Kërko" name="word" />
	              <div class="input-group-btn">
	                  <button v-html="searchBarAction"
	                  		  style="height: 34px;" 
	                  		  class="btn btn-default"
	                  		  v-on:click="addQuestion">
	                  </button>
	              </div>
	          </div>
	</div>
</template>
<script>
	export default{
		props:{
			indexname: ""
		},
		data(){
			return {
				index: {},
				query: "",
				results: []
			}
		},
		methods: {
			addQuestion(){
				if( this.results.length === 0 ){
					window.location = "/questions/create?t=" + this.query ;	
				}	
			}	
		},
		computed:{
			searchBarAction(){
				if ( this.results.length === 0 && this.query.length > 2 ){
					return `Shtro Pyetjen <i class="glyphicon glyphicon-flash"></i>`;
				}else{
					return `<i class="glyphicon glyphicon-search"></i>`;
				} 
			}
		},
		mounted(){
	       	this.index = window.search.initIndex(this.indexname);
	       		var autocomplete = require('autocomplete.js');
	       	  	autocomplete('#search-input', { hint: false }, [
			    {
			      source: autocomplete.sources.hits( this.index, { hitsPerPage: 5 }),
			      displayKey: 'title',
			      templates: {
			        suggestion: function(suggestion) {
							this.results.push( suggestion );	
						return `<article class="search-result-item">
									<p> ` +suggestion._highlightResult.title.value + `</p>	
								</article> `;
			        }.bind( this )
			      }
			    }
			  ]).on('autocomplete:selected', function(event, suggestion, dataset) {
			    window.location="/questions/"+ suggestion.id;
			  }).on('autocomplete:empty', function(){
			  	this.results.splice(0, this.results.length );
			  }.bind( this ));
		}
	}
</script>