<template>
  <main>
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-4" v-for="post in posts" :key="post.id">
                    <div class="card-header">
                        <span class="font-weight-bold">Titolo: {{post.title}}</span>
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
    }
}
</script>

<style lang="scss" scoped>
._cont-immagine{
    width: 800px;
    height: 500px;
}

p{
    font-size: 17px;
}
</style>