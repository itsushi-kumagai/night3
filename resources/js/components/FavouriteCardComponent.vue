<template>
    <div>
        <button v-if="show" @click.prevent="unsave()" class="heart"><i class="fas fa-heart fa-2x" style="color: #F70661;"></i></button>
        <button v-else @click.prevent="save()" class="heart"><i class="fas fa-heart fa-2x" style="color: white;"></i></button>
    </div>
</template>

<script>
    export default {
        props:['postid','favourited'],

        data(){
            return{
                'show':true//もしアプリケーションが正常にsentされたら application sent successfully
            }
        },

        mounted() {
           this.show = this.postFavourited ? true:false;//もしtrueなら、上のボタンが返される
        },

        computed: {
            postFavourited(){
                return this.favourited
            }
        },

        methods:{
            save(){
                //alert("ok") okって出たらok
                axios.post('/save/'+this.postid).then(response=>this.show=true).catch(error=>alert('error'))//もしsaveしたらsaveボタンは消す
            },
            unsave(){
                axios.post('/unsave/'+this.postid).then(response=>this.show=false).catch(error=>alert('error'))//unsave押したら、もう一回saveボタン見せる
            }
        }
    }
</script>


