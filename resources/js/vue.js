import {createApp} from 'vue/dist/vue.esm-bundler'
import ContactForm from "./components/ContactForm.vue";
import CommentForm from "./components/CommentForm.vue";
import CallbackForm from "./components/CallbackForm.vue";

const contactComponent = createApp({
    components: {
        'component-contact-form': ContactForm,
    },
})

contactComponent.mount('#contacts')

const commentComponent = createApp({
    components: {
        'component-comment-form': CommentForm,
    },
})

commentComponent.mount('#comments')


const callbackComponent = createApp({
    components: {
        'component-callback-form': CallbackForm,
    },
})

callbackComponent.mount('#callback')
