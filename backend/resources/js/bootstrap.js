window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

//for Echo
import Echo from 'laravel-echo';
window.io = require('socket.io-client');

//接続情報
window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: 'http://localhost:6001',
});

//購読するチャネルの設定
window.Echo.channel('test')
  .listen('MessageReceived', (e) => {
  console.log(e);

  let date = new Date(),
    html = `
<div class="media comment-visible">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user" id="name">${e.name}</span>
            <span class="comment-body-time" id="created_at">${date.toLocaleString()}</span>
        </div>
        <span class="comment-body-content" id="comment">${e.comment}</span>
    </div>
</div>
`;

  $("#comment-data").append(html);
  $('#comment-box').animate({scrollTop: $('#comment-box')[0].scrollHeight}, 'fast');
});
