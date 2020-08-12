var sock = new WebSocket('ws://');


sock.addEventListener('open', function(){
    console.log('接続成功');
});

sock.addEventListener('message', function(msg){
    console.log(msg.data);
});

var accountCreate=()=>{
    let email = document.getElementById('ead');
    let pw = document.getElementById('pw');
    let accountData = {
        "emailaddress": email,
        "password": pw
    }

    sock.send(accountData);
    
}


