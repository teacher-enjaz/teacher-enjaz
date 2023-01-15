require('./bootstrap');

/*if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/js/firebase.js')
        .then(function(registration) {
            console.log('Registration successful, scope is:', registration.scope);
        }).catch(function(err) {
        console.log('Service worker registration failed, error:', err);
    });
}*/

/*
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/js/firebase.js')
        .then(function(registration) {
            registration.addEventListener('updatefound', function() {
                // If updatefound is fired, it means that there's
                // a new service worker being installed.
                var installingWorker = registration.installing;
                console.log('A new service worker is being installed:',
                    installingWorker);
                // You can listen for changes to the installing service worker's
                // state via installingWorker.onstatechange
            });
        })
        .catch(function(error) {
            console.log('Service worker registration failed:', error);
        });
} else {
    console.log('Service workers are not supported.');
}
*/


