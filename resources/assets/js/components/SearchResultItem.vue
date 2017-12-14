<template>
	<li>
		<article>	
			<a v-bind:href= "generateLink">
	    		<hr style="clear: both;">
				<h6 v-html="item._highlightResult.title.value"></h6>	
			</a>
		</article>
	</li>
</template>

<script>
	export default{
		props:{
			item: {}
		},
		computed: {
			generateLink(){
				return '/questions/'+ this.item.id;
			}
		}
	}
</script>