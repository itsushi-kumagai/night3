<template>
<div class="commentarea" > 
    <div  class="comment-posts" >
        <div  class="user-comment-area" >
            <div  class="user-post">
                <input  v-model="newComment" type="text" name="comment">
            </div>
            <div  v-if="!auth" class="comments-buttons">
                <button @click="addComment" class="comment-button" type="submit">Comment</button>
            </div>
        </div>
        <Comment v-for='comment in comments.data' :key="comment.id" :comment="comment" :post="post"/>
    </div>
    <div class="load-button">
        <button v-if="comments.next_page_url" @click="fetchComments" class="load">Load More</button>
    </div>
</div>
</template>

<script>
import Comment from './comment.vue'
export default {
    props: ['post'],
    components: {
        Comment
    },
    mounted() {
        this.fetchComments()
    },
    data: () => ({
        comments: {
            data: []
        },
        newComment: '',
        auth: ''
    }),
    methods: {
        fetchComments() {
            const url = this.comments.next_page_url ? this.comments.next_page_url : `/results/${this.post.id}/comments`

            axios.get(url).then(({ data }) => {
                this.comments = {
                    ...data,
                    data: [
                        ...this.comments.data,
                        ...data.data
                    ]
                }
            })
            .catch(function (error) {
                console.log(error.response);
            })
        },
        addComment() {
            if(! this.newComment) return
            axios.post(`/comments/${this.post.id}`, {
                body: this.newComment
            }).then(( {data} ) => {
                this.comments = {
                    ...this.comments,
                    data: [
                        data,
                        ...this.comments.data
                    ]
                }
            })
            .catch(function (error) {
            console.log(error.response);
        });
        }
    }
}
</script>

<style scoped>


.user-comment-area {
  margin-top: 3rem;
  margin-bottom: 2rem;
}

.user-comment-area2 {
  margin-bottom: 3rem;
}

.user-post input {
  color: white;
  font-size: 15px;
  letter-spacing: 1px;
  border: none;
  width: 90%;
  height: 30px;
  margin-top: 10px;
  margin-left: 3rem;
  background-color: black;
  border-bottom: 1px solid white;
}

.user-post input:focus {
  outline: none;
}

.comments-buttons {
  margin-top: 1rem;
  float: right;
}

.comments-buttons2 {
  margin-top: -2rem;
  float: right;
}

.comment-button {
  background-color: white;
  font-size: 12px;
  border-radius: 10px;
  border: none;
  width: 70px;
  cursor: pointer;
  height: 25px;
 margin: 0 0 0 auto;
}

.comment-button:focus {
  outline: none;
}

.load-button {
    margin-top: 3rem;
}

.load {
    background: #7206F7;
    color: #ffffff;
  font-size: 15px;
  padding: 5px;
  border-radius: 10px;
  border: none;
  width: 120px;
  cursor: pointer;
  height: 30px;
  display: -webkit-box;
  display: -ms-flexbox;
  /* display: flex; */
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

@media screen and (max-width: 767px) {
    .user-post input {
        width : 100%;
        margin: 10px auto;
    }
     .user-post{
         width : 80%;
        margin: 0 auto;
     }
    .comments-buttons {
    margin-top: 0;

}
.load-button {
    margin: 3rem auto 0;
     width: 120px;
}
.load {
 
  cursor: pointer;
  height: 25px;
  display: -webkit-box;
  display: -ms-flexbox;
  /* display: flex; */
  margin: 0 auto;
}
.comment-button{
    margin: 10px 10px 0 0;
}
}

</style>

