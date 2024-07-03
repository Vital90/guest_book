/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
auth: {
    headers:{
        Authorization: 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzE5OTAzODU3LCJleHAiOjE3MTk5MDc0NTcsIm5iZiI6MTcxOTkwMzg1NywianRpIjoiSG9ZT3Yzc2FaU2ZCMXhuUCIsInN1YiI6IjMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.IY7rBvwrOgtk36EbB2xSrpPl-otBUwjKkSLO5ZKNbnY'
    }
},

broadcaster: 'pusher',
key: import.meta.env.VITE_PUSHER_APP_KEY,
cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
wsHost: '127.0.0.1',
wsPort: 6001,
wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
enabledTransports: ['ws', 'wss'],
});


window.Echo.channel('reviews').listen('.review.created', (e) => {
    var a = document.getElementsByClassName('card-body')[0];
    a.appendChild(document.createTextNode(e.created_at + " " + e.login + ":" + e.text));
});

window.Echo.private('users.3').listen('.comment.created', (e) => {
    var b = document.getElementsByClassName('admin_comment')[0];
    b.appendChild(document.createTextNode('new comment for you review from admin:' + ' ' + e.created_at + ' ' + e.comment));
});