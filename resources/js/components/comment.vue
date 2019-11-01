<template >
<div>
    <div class="reply-comment" >
        <div class="user-comment">
                <!-- <div class="user" v-if="comment.user.profile.image && comment.user.profile.image.length > 0">
                    <span v-for="item in comment" v-bind:key="item.id">
                        <img :src="'/uploads/' + item.user.profile.image">
                        <img src="/uploads/{filename}"> 
                    </span>
                </div> -->
                <div else class="user" >
                    <avatar :username="comment.user.name" :size="40"></avatar>
                </div>
            <div class="user-name">
                <span class="comment-name"><a :href=" '/user/' + 'profile' +'/'+ comment.user.id + '/'  ">{{ comment.user.name }}</a></span>
                <p>{{ comment.body }}</p>
            </div>
        </div>
    </div>
    <div class="reply">
        <button @click="addingReply = !addingReply" class="reply-button" :class="{ 'red' : !addingReply, 'black' : addingReply }">
            {{ addingReply ? 'Cancel' : 'Add Reply'}}
        </button>
    </div>
    <div class="user-reply-area" v-if="addingReply">
        <div class="reply-comment">
            <!--<img src="../people/person3.jpg" alt="" >-->
            <div  v-if="!auth">
                
                <input v-model='body' type="text">
                <button @click="addReply" class="comment-button">Reply</button>
            </div>
        </div>
    </div>
     <replies ref='replies' :comment="comment"></replies>
</div>
</template>

<script>
import Avatar from 'vue-avatar'
import Replies from './replies.vue'
export default {
    components: {
        Avatar,
        Replies
    },
    data() {
        return {
            body: '',
            addingReply: false,
            auth: '',
            item: '',
            index: ''
        }
    },
    props: {
        comment: {
            required: true,
            default: () => ({})
        },
        post: {
            required: true,
            default: () => ({})
        }
    },
    methods: {
        addReply() {
            if(! this.body) return
            axios.post(`/comments/${this.post.id}`, {
                comment_id: this.comment.id,
                body: this.body
            }).then(({data})=> {
                this.body = ''
                this.addingReply = false
                this.$refs.replies.addReply(data)
            })
            .catch(function (error) {
        console.log(error.response);
        });
     }
    }
}
</script>

<style scoped>

.reply-comment img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  -o-object-fit: cover;
     object-fit: cover;
}

.reply-comment input {
  color: white;
  font-size: 15px;
  letter-spacing: 1px;
  border: none;
  width: 86%;
  margin-left: 25px;
  height: 30px;
  background-color: black;
  border-bottom: 1px solid white;
}

.reply-comment input:focus {
  outline: none;
}

.user-comment {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
}

.user img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  -o-object-fit: cover;
     object-fit: cover;
}

.user-name {
  margin-left: 30px;
  font-size: 15px;
}

.user-name p {
  margin-top: 10px;
  border-bottom: solid  white 1px;
  font-size: 15px;
}

.comment-name {
  font-size: 20px;
}

.reply-button {
    background-color: white;
    font-size: 12px;
    border-radius: 10px;
    border: none;
    width: 70px;
    cursor: pointer;
    height: 25px;
}

.reply {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100px;
  margin: 0 0 0 auto;
}

.user-reply-area {
    width: 85%;
    margin: 1rem 1.85rem 3rem auto;
}

.comment-button {
  background-color: rgb(66, 65, 65);
  color: white;
  font-size: 12px;
  border-radius: 10px;
  border: none;
  width: 70px;
  cursor: pointer;
  height: 25px;
  float: right;  
}

.comment-button:focus {
  outline: none;
}
@media screen and (max-width: 767px) {
    .reply-button {
    margin-top: 0;
    margin-left: 20px;
}
    .vue-avatar--wrapper{
        width: 35px;
        height: 35px;
    }
    .user-name {
  margin-left: 10px;
 
}
    .user-name a{
  font-size: 18px;

}
   .user-comment{
  width: 90%;
}
 
    .user-reply-area {
    width: 90%;
    margin: 0 0 0 auto;
}
.comment-button {
    margin: 10px 10px 0 0;
}
}


</style>