const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})


const apiUrl = 'http://localhost:3000/messages';

document.addEventListener('DOMContentLoaded', loadMessages);

function loadMessages() {
    fetch(apiUrl)
        .then(response => response.json())
        .then(messages => {
            const messageContainer = document.getElementById('messages');
            messageContainer.innerHTML = '';
            messages.forEach(message => {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');
                messageElement.innerHTML = `
                    <strong>${message.username}:</strong>
                    <p>${message.text}</p>
                `;
                messageContainer.appendChild(messageElement);
            });
        });
}

function postMessage() {
    const username = document.getElementById('username').value;
    const message = document.getElementById('message').value;

    if (!username || !message) {
        alert('Please fill in both fields');
        return;
    }

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, text: message })
    })
    .then(response => response.json())
    .then(() => {
        document.getElementById('username').value = '';
        document.getElementById('message').value = '';
        loadMessages();
    })
    .catch(error => console.error('Error:', error));
}

function toggleChat() {
    const chatPanel = document.getElementById('chatPanel');
    if (chatPanel.style.display === 'none' || chatPanel.style.display === '') {
        chatPanel.style.display = 'flex';
    } else {
        chatPanel.style.display = 'none';
    }
}

