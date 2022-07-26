
// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe(nom,prenom,sujet) {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification(nom+' '+prenom, {
      icon: 'img/checked.png',
      body: sujet,
    });

    notification.onclick = function () {
      window.open("https://www.facebook.com/HazalTakwaZay");      
    };

  }

}