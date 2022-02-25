<template>
  <main>
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card my-4" v-for="post in posts" :key="post.id">
                    <div class="card-header">
                        <span class="font-weight-bold">Titolo: {{post.title}}</span>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <!-- immagine -->
                        <div class="d-flex justify-content-center _cont-immagine" v-if="post.image">
                            <img class="img-thumbnail" :src="'../storage/' + post.image" alt="">
                        </div>
                        <!-- contenuto -->
                        <div class="w-50 mx-4 mt-3">
                            <p class="text-center">{{post.content}}</p>
                        </div>
                        <router-link class="ml-3" :to="{ name: 'SinglePost', params: { slug:post.slug } }">Vai al Post >></router-link>
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
            posts: [],
        }
    },
    created(){
        axios.get('/api/posts')
            .then((response) => {
                this.posts = response.data;
            })
    },
}
</script>

<style lang="scss" scoped>
._cont-immagine{
    width: 350px;
}

p{
    font-size: 17px;
}
</style>