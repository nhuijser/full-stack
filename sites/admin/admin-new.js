function openProject(id) {
    const select = document.getElementById(id);
 
    if(select.getAttribute("selected") == "false")  {
        select.style.transition = "0.5s";
        select.setAttribute("selected", "true");;
        const p = document.createElement('p');
        p.innerHTML = select.getAttribute("description");;
        select.appendChild(p);

        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = "Delete";
        deleteButton.setAttribute("onclick", "deleteProject('" + id + "')");
        deleteButton.setAttribute("class", "delete-button");
        select.appendChild(deleteButton);
        return;
    } else {
        select.style.transition = "0.5s";
        select.setAttribute("selected", "false");
        select.removeChild(select.lastChild);
        select.removeChild(select.lastChild);

        return;
    }

}

function deleteProject(id) {    

}
