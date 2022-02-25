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
                            <span class="badge badge-success">{{post.category.name}}</span>
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
        }
    },
    created(){
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
            }).catch((error) =>{
                this.$router.push({name: "NotFound"});
            })
    },
    methods: {
        showPost(){
            alert('ciao');
        }
    }
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