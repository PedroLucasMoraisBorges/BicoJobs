let components = document.getElementsByClassName("accordion-component");
let activers = document.getElementsByClassName("dropdown-activer");
for(activer of activers){
    activer.addEventListener("click", toggleState);
}

function toggleState(event){
    let target = event.currentTarget.parentElement;
    if(target.classList.contains("is_closed") == true){
        for(component of components){
            component.classList.add("is_closed");
        }
        target.classList.remove("is_closed");
    }
    else{
        target.classList.add("is_closed");
    }
    console.log(target);
}