
let currentChatId = null;

function startChat(recieverId){
    console.log("started chat");
    fetch("../Chat/start_chat.php",{
        method:"POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "targetId="+ recieverId
    })
    .then(res => res.text())
    .then(chatId => {openChat(chatId);});
    
}

function openChat(chatId){
    console.log("opening chat")
    currentChatId = chatId;
    document.getElementById("chatBox").style.display ="block";
    loadMessages();
}

function sendMessage(){
    console.log("sending message")
    let msg = document.getElementById("msgInput").value;
    if (!msg) return;

    fetch("../Chat/send.php",{
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: `chat_id=${currentChatId}&message=${encodeURIComponent(msg)}`
    }).then(()=>{
        document.getElementById("msgInput").value= "";
        console.log("message sent");
        loadMessages();
    });
}

function loadMessages() {
    console.log("loading messages");
    fetch("../Chat/get_messages.php?chat_id="+ currentChatId)
    .then(res => res.text())
    .then(data => {
        document.getElementById("messages").innerHTML = data;
    });
    setInterval(loadMessages, 5000);
}