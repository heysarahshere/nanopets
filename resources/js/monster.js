
function switchMonsterCardFace(id) {
    let front = document.getElementById("front-" + id);
    let back = document.getElementById("back-" + id);
    front.classList.toggle('hiddenFace');
    back.classList.toggle('hiddenFace');
}
