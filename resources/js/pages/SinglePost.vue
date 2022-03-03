<template>
  <main>
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-4">
                    <div class="card-header">
                        <h2 class="font-weight-bold">{{post.title}}</h2>
                        <div>
                            <span class="font-italic">Category: </span>
                            <!-- <span class="badge badge-success">{{post.category.name}}</span> -->
                        </div>
                    </div>
                    <div class="ml-4 mt-3">
                        <span class="font-weight-bold">Tags:  </span>
                        <span class="badge badge-info mr-2" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- immagine -->
                        <div class="d-flex justify-content-center _cont-immagine" v-if="post.image">
                            <img class="w-100 img-thumbnail" :src="'../storage/' + post.image" alt="">
                        </div>
                        <!-- contenuto -->
                        <div class="w-75 mt-4">
                            <p class="text-center">{{post.content}}</p>
                        </div>
                    </div>
                    <div class="card-header">
                        <form @submit.prevent="addComment()">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" placeholder="Inserisci il nome" v-model="CommentData.name">
                            </div>
                            <div class="form-group">
                                <label for="comment">Commento</label>
                                <textarea class="form-control" id="comment" cols="30" rows="2" placeholder="Inserisci il commento" v-model="CommentData.comment"></textarea>
                                <div v-if="CommentErrors.comment" class="card text-white bg-danger my-3">
                                    <ul>
                                        <li v-for="(error, index) in CommentErrors.comment" :key="index">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Invia</button>
                        </form>
                        <div v-if="inviato" class="card text-white bg-success my-3 p-2" v-on:click="inviato = false" role="button">
                            <span>Commento Inviato, in fase di approvazione !</span>
                        </div>
                        <div class="card-body" v-for="comment in post.comments" :key="comment.id">
                            <div class="">{{comment.name}}</div>
                            <div class="">{{comment.comment}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </main>
</template>

<script>
export default {
    name: "Posts",
    data() {
        return{
            post: [],
            CommentData: {
                name: "",
                comment: "",
                post_id: null
            },
            CommentErrors: {},
            inviato: false,
        }
    },
    methods: {
        addComment(){
            axios.post(`/api/comments`, this.CommentData)
                .then((response) => {
                    this.CommentData.name = "";
                    this.CommentData.comment = "";
                    this.inviato = true;
                    this.CommentErrors = {};
                }).catch((error) =>{
                    this.inviato = false;
                    this.CommentErrors = error.response.data.errors;
                })
        }
    },
    created(){
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
                this.CommentData.post_id = this.post.id;
            }).catch((error) =>{
                this.$router.push({name: "NotFound"});
            })
    },
}
</script>

<style lang="scss" scoped>
._cont-immagine{
    width: 800px;
    height: 500px;
}

p{
    font-size: 22px;
}
</style>