<template>
    <div class= "row">
      <div v-show = "notEmpty(selectedCategories)">
            <div class="row">
                <h1>Selected Categories:</h1>
                <div id="selected-categories-list">
                    <category-item v-for=" category in selectedCategories "
                    v-bind:key="category.id" v-bind:category= "category">
                        <div v-on:click="degradeCategory(category)"  class="btn btn-primary btn-block
                        open-modal moving-category selected-category" >{{category.name}}</div>
                    </category-item>
                </div>
            </div>
      </div>

      <hr v-show = "notEmpty( selectedCategories )" />

      <div v-show = "notEmpty(remainingCategories)">
        <div class="row">
          <h1>Available Categories:</h1>
            <div id="available-categories-list">
                <category-item v-for=" category in remainingCategories "
                v-bind:key="category.id" v-bind:category= "category">
                    <div v-on:click="promoteCategory(category)" class="btn btn-primary btn-block
                    open-modal moving-category selected-category" >   {{category.name}}</div>
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
                remainingCategories: []
            }
        },
        methods: {
            notEmpty( categories ){
                return categories.length != 0;
            },
            promoteCategory( category ){
                this.promoteOrDegradeCategoryAjaxRequest( category.id );
                this.remainingCategories.splice( this.remainingCategories.indexOf( category ) , 1  );
                this.selectedCategories.push( category );
            },
            degradeCategory( category ){
                this.promoteOrDegradeCategoryAjaxRequest( category.id );
                this.selectedCategories.splice( this.selectedCategories.indexOf( category ) , 1  );
                this.remainingCategories.push( category );
            },
            promoteOrDegradeCategoryAjaxRequest(categoryId){
                var csrfToken = $("[name='_token']").first().val();
                var url = '/Kategorite/'+categoryId;

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        "_token": csrfToken
                    },
                    success: function (data) {
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