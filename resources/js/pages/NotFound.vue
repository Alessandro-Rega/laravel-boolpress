<template>
  <div>
    <div class="flex-center position-ref full-height">
        <div class="code">404</div>
        <div class="message" style="padding: 10px;">Not Found</div>
    </div>
  </div>
</template>

<script>
export default {
    name: "NotFound"
}
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;700&display=swap');
    div{
        font-family: 'Nunito', sans-serif;
        color: #636b6f;
    }
    .full-height {
        height: calc(100vh - 55px);
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .code {
        border-right: 2px solid;
        font-size: 26px;
        padding: 0 15px 0 15px;
        text-align: center;
    }

    .message {
        font-size: 18px;
        text-align: center;
    }
</style>