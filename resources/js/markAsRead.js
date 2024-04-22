document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('tr[data-message-id]').forEach(function(row) {
        row.addEventListener('click', function() {
            var messageId = this.getAttribute('data-message-id');
            markMessageAsRead(messageId);
            console.log(messageId)
        });
    });
});

function markMessageAsRead(messageId) {
    const url = '/inbox/' + messageId;

    const data = {
        read: true
    };

    axios.patch(url, data)
        .then(response => {
            console.log('Messaggio segnato come letto:', response.data);
            const domain = window.location.origin;
            console.log(domain)
            window.location.href = domain  + url;        
        })
        .catch(error => 
            console.error('Errore: ', error)
        );    
}