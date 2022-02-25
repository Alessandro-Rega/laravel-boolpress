<template>
    <div class="content">
        <div class="title m-b-md">
            BOOLPRESS
        </div>
        <div>
            Created by Alessandro Rega
        </div>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;700&display=swap');
    .content {
        width: 100%;
        height: calc(100vh - 55px);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
    }
    .title {
        font-size: 84px;
    }
    .m-b-md {
        margin-bottom: 30px;
    }
</style>