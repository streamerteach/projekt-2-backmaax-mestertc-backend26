
let currentChatId = "1";

function startChat(recieverId){
    fetch(start_chat.php,{
        method:"POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "targetId="+ recieverId
    })
    .then(res => res.text())
    .then(chatId => {openChat(chatId);});
}

function openChat(chatId){
    currentChatId = chatId;
    document.getElementById("chatBox").style.display ="block";
    loadMessages();
}

function sendMessage(){

    let msg = document.getElementById("msgInput").value;
    if (!msg) return;

    fetch("../Chat/send.php",{
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: `chat_id=${currentChatId}&message=${encodeURIComponent(msg)}`
    }).then(()=>{
        document.getElementById("msgInput").value= "";
        loadMessages();
    });
}

function loadMessages() {
    fetch("../Chat/get_messages.php?chat_id="+ currentChatId)
    .then(res => res.text())
    .then(data => {
        document.getElementById("messages").innerHTML = data;
    });
}


setInterval(loadMessages, 5000);

