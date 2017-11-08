<template>
  <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
   		<div v-on:click="$emit('move-category')"  class="btn btn-primary btn-block open-modal" >
   			<slot></slot>
		</div> 
    </a>
  </div>
</template>