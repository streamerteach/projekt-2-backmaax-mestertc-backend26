let currentChatId = null;

// ---------------- Start chat from profile ----------------
function startChat(targetUserId) {
    fetch("../Chat/start_chat.php", {
        method:"POST",
        headers:{"Content-Type":"application/x-www-form-urlencoded"},
        body:"user2=" + encodeURIComponent(targetUserId)
    })
    .then(res => res.text())
    .then(chatId => {
        currentChatId = chatId;
        openChatPopup();
        loadMessages();
    });
}

// ---------------- Chat popup ----------------
function openChatPopup() {
    document.getElementById("chatPopup").style.display = "block";
}
function closeChat() {
    document.getElementById("chatPopup").style.display = "none";
}

// ---------------- Send message ----------------
function sendMessage() {
    let msg = document.getElementById("msgInput").value;
    if(!msg || !currentChatId) return;

    fetch("../Chat/send.php", {
        method:"POST",
        headers:{"Content-Type":"application/x-www-form-urlencoded"},
        body:`chat_id=${currentChatId}&message=${encodeURIComponent(msg)}`
    }).then(()=>{
        document.getElementById("msgInput").value = "";
        loadMessages();
    });
}

// ---------------- Load messages ----------------
function loadMessages() {
    if(!currentChatId) return;
    fetch("../Chat/get_messages.php?chat_id=" + currentChatId)
    .then(res=>res.text())
    .then(data=>{
        document.getElementById("chatMessages").innerHTML = data;
        document.getElementById("chatMessages").scrollTop = document.getElementById("chatMessages").scrollHeight;
    });
}

// ---------------- Load chat list ----------------
function loadChatList() {
    fetch("../Chat/get_chats.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("chatSidebar").innerHTML = "<h3>Your Chats</h3>" + data;
    });
}

// ---------------- Open chat from sidebar ----------------
function openChat(chatId) {
    currentChatId = chatId;
    openChatPopup();
    loadMessages();
}

// ---------------- Auto refresh ----------------
//setInterval(()=>{loadMessages();loadChatList();}, 2000);

// ---------------- Initial load ----------------
loadChatList();