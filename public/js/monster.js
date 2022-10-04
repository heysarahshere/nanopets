function switchMonsterCardFace(id) {
    let front = document.getElementById("front-" + id);
    let back = document.getElementById("back-" + id);
    front.classList.toggle('hiddenFace');
    back.classList.toggle('hiddenFace');
}

function toggleMonsterCardFaceFeed(id) {
    let back = document.getElementById("back-" + id);
    let feed = document.getElementById("feed-" + id);
    if (back.classList.contains('hiddenFace')) {
        feed.classList.add('hiddenFace');
        back.classList.remove('hiddenFace');
    } else {
        back.classList.add('hiddenFace');
        feed.classList.remove('hiddenFace');
    }
}

function toggleMonsterCardFaceBreed(id) {
    let back = document.getElementById("back-" + id);
    let breed = document.getElementById("breed-" + id);
    if (back.classList.contains('hiddenFace')) {
        breed.classList.add('hiddenFace');
        back.classList.remove('hiddenFace');
    } else {
        back.classList.add('hiddenFace');
        breed.classList.remove('hiddenFace');
    }
}

function toggleMonsterCardFaceSell(id) {
    let back = document.getElementById("back-" + id);
    let sell = document.getElementById("sell-" + id);
    if (back.classList.contains('hiddenFace')) {
        sell.classList.add('hiddenFace');
        back.classList.remove('hiddenFace');
    } else {
        back.classList.add('hiddenFace');
        sell.classList.remove('hiddenFace');
    }
}

function changeName(id) {
    let label = document.getElementById("nameLabel" + id);
    let input = document.getElementById("nameInputDiv" + id);
    if (label.classList.contains('hiddenFace')) {
        input.classList.add('hiddenFace');
        label.classList.remove('hiddenFace');
    } else {
        label.classList.add('hiddenFace');
        input.classList.remove('hiddenFace');
    }
}

function submitNameChangeAjax(event, id) {
    event.preventDefault();
    let name = document.getElementById("nameInput" + id).value;
    if (name === '') {
        $("#val-error" + id).text('Please enter a name!');
    } else {
        jQuery.ajax({
            type: 'POST',
            url: "{{ route('name-change-ajax') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                id: id
            },
            beforeSend: function (xhr, type) {
                $('#val-error' + id).hide();
                $("#success-message" + id).hide();
            },
            success: function (response) {
                if (response) {
                    // alert(data.success);
                    changeName(id);
                    $("#success-message" + id).text('Name changed!');
                    $("#nameLabel" + id).text(name);
                    // location.reload();
                } else {
                    $("#val-error" + id).text('Oops, something went wrong.');
                }
            },
            complete: function (data) {
                // $(".ajax-loader").hide();
            },
            error: function (response) {
                if (response.error) {
                    $("#val-error" + id).text('Fail.');
                    // location.reload();
                } else {
                    $("#val-error" + id).text('Oops, something went wrong. Error bracket.');
                }
            }
        });
    }
}
