function openProject(id) {
    const select = document.getElementById(id);
 
    if(select.getAttribute("selected") == "false")  {
        select.setAttribute("selected", "true");
        const p = document.createElement('p');
        p.innerHTML = select.getAttribute("description");
        select.appendChild(p);
        select.style.height = "150vh;";
        select.style.transition = "0.5s";
        return;
    } else {
        select.setAttribute("selected", "false");
        select.style.height = "10vh;";
        select.style.transition = "0.5s";
        select.removeChild(select.lastChild);
        return;
    }

}