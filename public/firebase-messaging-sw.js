importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDNDenHWaKVfvQCgbeMLBGJ0yRI-t-pKlc",
    authDomain: "rawafed-website.firebaseapp.com",
    projectId: "rawafed-website",
    databaseURL: "https://rawafed-website-default-rtdb.firebaseio.com",
    storageBucket: "rawafed-website.appspot.com",
    messagingSenderId: "654030814555",
    appId: "1:654030814555:web:9dff49cffa73ed28c62e7e",
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );

    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
