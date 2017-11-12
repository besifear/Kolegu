<template>
	<div class="col-md-9 col-sm-8 col-xs-6" id="search">
	          <div class="input-group">
	              <input v-model="query" v-on:keyup="search" debounce="500" id = "search-input" class="form-control"  
	              autocomplete="off" type="text" placeholder="Kërko" name="word">
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
		created(){
	       	this.index = window.search.initIndex(this.indexname);
		}
	}
</script>