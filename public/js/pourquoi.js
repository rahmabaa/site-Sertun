var element = document.getElementById("card");
element.addEventListener("animationstart", listener, false);
element.addEventListener("animationend", listener, false);
element.addEventListener("animationiteration", listener, false);

element.className = "slidein";

function listener(event) {
    var l = document.createElement("li");
    switch (event.type) {
        case "animationstart":
            l.innerHTML = "Début : durée écoulée : " + event.elapsedTime;
            break;
        case "animationend":
            l.innerHTML = "Fin : durée écoulée : " + event.elapsedTime;
            break;
        case "animationiteration":
            l.innerHTML = "Nouvelle boucle démarrée à : " + event.elapsedTime;
            break;
    }
    // document.getElementById("output").appendChild(l);
}