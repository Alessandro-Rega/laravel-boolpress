// resources/js/router.js

import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Posts from "./components/Posts"
import SinglePost from "./pages/SinglePost"
import NotFound from "./pages/NotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home
        },
        {
            path: "/posts",
            name: "Posts",
            component: Posts
        },
        {
            path: "/posts/:slug",
            name: "SinglePost",
            component: SinglePost
        },
        {
            path: "*",
            name: "NotFound",
            component: NotFound
        }
    ]
});

export default router