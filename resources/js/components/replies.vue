<template>
<div>
    <div class="user-reply-area" v-for="reply in replies.data" :key="reply.id">
        <div class="reply-comment">
           <div class="user">
                <!-- <div class="user" v-if="reply.user.image && reply.user.image.length > 0" >
                    <span :v-for="(item, index) in reply.user.image">
                        <img :src="'uploads' + '/'  + item.image">
                    </span>
                </div> -->
                <div class="user" >
                    <avatar :username="comment.user.name" :size="40"></avatar>
                </div>
            </div>
            <!-- <div else class="user" >
                <avatar :username="comment.user.name" :size="45"></avatar>
            </div> -->
        </div>
    <div class="reply-link">
        <span class="reply-user-name"><a  :href=" '/user/' + 'profile' +'/'+ reply.user.id + '/'  ">{{ reply.user.name }}</a></span>
        <p class="reply-body">{{ reply.body }}</p>
    </div>
    </div>
    <div v-if="comment.repliesCount > 0 && replies.next_page_url">
        <button @click="fetchReplies" class="load-reply">Load More</button>
    </div>
</div>
</template>

<script>
import Avatar from 'vue-avatar'
export default {
    props: ['comment'],
    components: {
        Avatar
    },
    data() {
        return{
            replies: {
                data: [],
                next_page_url: `/comments/${this.comment.id}/replies`
            },
            item: ''
        }
    },
    methods: {
        fetchReplies(){
            axios.get(this.replies.next_page_url).then(({ data }) => {
                this.replies = {
                    ...data,
                    data: [
                        ...this.replies.data,
                        ...data.data
                    ]
                }
            })
        },
        addReply(reply) {
            this.replies = {
                ...this.replies,
                data: [
                    reply,
                    ...this.replies.data
                ]
            }
        }
    }
}
</script>

<style scoped>
.user-reply-area {
  margin-left: 2.5rem;
  margin-bottom: 30px;
  display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.reply-comment img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  -o-object-fit: cover;
     object-fit: cover;
  margin-left: 8rem;
}

.reply-comment input {
  color: white;
  font-size: 15px;
  letter-spacing: 1px;
  border: none;
  width: 55%;
  height: 30px;
  background-color: black;
  border-bottom: 1px solid white;
}

.reply-comment input:focus {
  outline: none;
}

.reply-user-name {
  font-size: 19px;
  margin-left: 1rem;
}

.reply-body {
    font-size: 15px;
    margin-left: 1rem;
    color: rgb(180, 180, 180);
}

.load-reply {
  color: grey;
  background-color: black;
  font-size: 15px;
  padding: 3px;
  border-radius: 10px;
  border: none;
  width: 100px;
  cursor: pointer;
  height: 25px;
  display: -webkit-box;
  display: -ms-flexbox;
  justify-content: center;
  display: flex; 
  
  margin: 0 auto;
}
@media screen and (max-width: 767px) {
    .user-reply-area {
        margin: 1rem 1rem 1rem 1.3rem;
    }
    .vue-avatar--wrapper{
        width: 35px;
        height: 35px;
    }
    .reply-comment{
    margin: 0px 10px;
}
}

</style>
