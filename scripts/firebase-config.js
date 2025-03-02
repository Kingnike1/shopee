// firebase-config.js
const firebaseConfig = {

    apiKey: "AIzaSyDdbFJvVwkK9VkowRFpGEJzfCJyFTxiR90",

    authDomain: "shopee-871f2.firebaseapp.com",

    projectId: "shopee-871f2",

    storageBucket: "shopee-871f2.firebasestorage.app",

    messagingSenderId: "1016088561902",

    appId: "1:1016088561902:web:f43ef89ef425be4fa28bff"

};


// Inicializa o Firebase
firebase.initializeApp(firebaseConfig);

// Referência para o serviço de autenticação
const auth = firebase.auth();
