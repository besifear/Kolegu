<template>
	<div class="col-md-9 col-sm-8 col-xs-6" id="search">
	          <div class="input-group">
	              <input id = "search-input" v-model="query" class="form-control"autocomplete="off"
	               type="text" placeholder="Kërko" name="word">
	              <div class="input-group-btn">
	                  <button style="height: 34px;" class="btn btn-default" type="submit">
	                  	<i class="glyphicon glyphicon-search"></i>
	                  </button>
	              </div>
	          </div>

	          <div id="livesearchcontainer">
	         	<ul v-show="hasSearchResult" id="search-result-list" class="search-result-list" style="list-style: none;">
	         		<li><h4> Pyetje </h4></li>
					<search-result-item v-for="item in items" v-bind:key="item.id" v-bind:item="item">
					</search-result-item>
                </ul>
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
				query: "",
				items: [],
				index: {}
			}
		},
		methods:{
			search(){
			   	if( this.query.length == 0 ){
			   		this.items= [];	
			   	}else{
			   		this.index.search( this.query, function( error, results ){
		           		this.items = results.hits;
		        	}.bind(this));
			   	} 
	        }

		},
		computed: {
			hasSearchResult(){
				return this.items.length
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
						return `<article>
									<p> ` +suggestion._highlightResult.title.value + `</p>	
								</article> `;
			        }
			      }
			    }
			  ]).on('autocomplete:selected', function(event, suggestion, dataset) {
			    window.location="/questions/"+ suggestion.id;
			  });
		}
	}
</script>