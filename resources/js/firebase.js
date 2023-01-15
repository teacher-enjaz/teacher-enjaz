// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getMessaging, getToken , onMessage } from "firebase/messaging";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDNDenHWaKVfvQCgbeMLBGJ0yRI-t-pKlc",
    authDomain: "rawafed-website.firebaseapp.com",
    projectId: "rawafed-website",
    databaseURL: "https://rawafed-website-default-rtdb.firebaseio.com",
    storageBucket: "rawafed-website.appspot.com",
    messagingSenderId: "654030814555",
    appId: "1:654030814555:web:9dff49cffa73ed28c62e7e",
    measurementId: "G-R9SN9DVV52"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
//const analytics = getAnalytics(app);

const messaging = getMessaging();
//vapikey tha same key pair in console
getToken(messaging,
    { vapidKey: 'BNkcyCe1-dRsaAxRMNzLRrJAO0H3ELgs8oRKjHedLo-_DIBbjdeIKkszGIQGqUll6Y0T9lRJQqePUrrrDQ-Zoj0' })
    .then((currentToken) => {
        if (currentToken) {
            // Send the token to your server and update the UI if necessary
            console.log(currentToken);
            $.post('/api/device-tokens',{
                token: currentToken,
                device: navigator.userAgent,
                _token: $('[name="csrf-token"]').attr('content')
            })
        }
        else
        {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);
    // ...
});

onMessage(messaging, (payload) => {
    //alert('hello')
    console.log('Message received. ', payload);
     var notify;
     notify = new Notification(payload.data.title,{
         body: payload.data.body,
     });
     return notify;
});
