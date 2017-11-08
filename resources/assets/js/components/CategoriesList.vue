<template>
    <div class= "row">
      <div v-show = "notEmpty(selectedCategories)">
            <div class="row">
                <h1>Selected Categories:</h1>
                <div>
                    <category-item v-for="category in selectedCategories" v-bind:key="category.id" 
                	v-on:move-category="degradeCategory( category )">
                       	{{category.name}} 
                    </category-item>
                </div>
            </div>
      </div>

      <hr v-show = "notEmpty( selectedCategories )" />

      <div v-show = "notEmpty(remainingCategories)">
        <div class="row">
          <h1>Available Categories:</h1>
            <div id>
                <category-item v-for=" category in remainingCategories " v-bind:key="category.id" 
            	v-on:move-category="promoteCategory( category )">
                    {{category.name}}
                </category-item>
            </div>
        </div>
      </div>

        </div>
</template>

<script>
    export default {
        data: function() {
            return{
                selectedCategories: [], 
                remainingCategories: [],
                bussyCategories: []
            }
        },
        methods: {
            notEmpty( categories ){
                return categories.length != 0;
            },
            promoteCategory( category ){

               	if ( this.categoryIsFree( category.id ) ){ 
	               	this.bussyCategories.push( category.id ); 
	                this.promoteOrDegradeCategoryAjaxRequest( category.id );
	                this.remainingCategories.splice( this.remainingCategories.indexOf( category ) , 1  );
	                this.selectedCategories.push( category ); 
                }
            },
            degradeCategory( category ){
               	if ( this.categoryIsFree( category.id ) ){ 
	               	this.bussyCategories.push( category.id ); 
	                this.promoteOrDegradeCategoryAjaxRequest( category.id );
	                this.selectedCategories.splice( this.selectedCategories.indexOf( category ) , 1  );
	                this.remainingCategories.push( category );
           		} 
            },
            categoryIsFree( category ){
            	return this.bussyCategories.indexOf( category ) == -1;
            },
            promoteOrDegradeCategoryAjaxRequest(categoryId){
               	var csrfToken = $("[name='_token']").first().val();
                var url = '/Kategorite/'+categoryId;
               	var component = this; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        "_token": csrfToken
                    },
                    success: function (data) {
                    	component.bussyCategories.splice( component.bussyCategories.indexOf( categoryId ), 1 );
                    },
                    error: function (ts) {
                        alert(ts.responseText);
                    }
                });
            }
        },
        mounted() {

            var csrfToken = $("[name='_token']").first().val();
            var selectedCategories = this.selectedCategories;
            var remainingCategories = this.remainingCategories;

            $.ajax({
                type: "POST",
                url: '/getUserCategories',
                data: {
                    "_token": csrfToken
                },
                success: function (data) {
                    $.each(data['selectedCategories'],function(index, value){
                        selectedCategories.push( value );
                    });

                    $.each(data['remainingCategories'],function(index, value){
                        remainingCategories.push( value );
                    });
                },
                error: function (ts) {
                    alert(ts.responseText);
                }
            });
        }
    }
</script>