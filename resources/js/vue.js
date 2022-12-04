import {createApp} from 'vue/dist/vue.esm-bundler'
import ContactForm from "./components/ContactForm.vue";
import CommentForm from "./components/CommentForm.vue";
import CallbackForm from "./components/CallbackForm.vue";

const contactComponent = createApp({
    components: {
        'component-contact-form': ContactForm,
    },
})

if (document.querySelector('#contacts')) {
    contactComponent.mount('#contacts')
}

const commentComponent = createApp({
    components: {
        'component-comment-form': CommentForm,
    },
})

if (document.querySelector('#comments')) {
    commentComponent.mount('#comments')
}

const callbackComponent = createApp({
    components: {
        'component-callback-form': CallbackForm,
    },
})

if (document.querySelector('#callback')) {
    callbackComponent.mount('#callback')
}
