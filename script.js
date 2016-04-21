window.onload = function () {

    getNotes();
    $('#registration').submit(function(event){
        event.preventDefault();
        var a = checkForm();
        if($('#error2').html() == '' && $('#error1').html() == '') regAjax();
    });
    $('#authorization').submit(function(event){
        event.preventDefault();
        var authData = $('#authorization').serialize();
        $.ajax({
            url: 'php/authorization.php',
            type: 'POST',
            data: authData,
            dataType: 'text',
            success: function(data) {
                if(data != 'false')
                    location.reload();
                else $('#errorAuthorization').html('Неправильный логин или пароль!');
                }

        });
    });

}
function buildNotes(data) {
    var notes = data.split('===');
    notes.pop();
    var fornotes = document.getElementById('fornotes');
    for(var i = 0; i < notes.length; i += 3) {
        var container = document.createElement('div');
        container.id = 'cont'+notes[i+2];
        container.className= 'noteContainer';
        fornotes.appendChild(container);
        var note = document.createElement('div');
        note.className = 'note';

        note.innerHTML = "<div class='noteName'>" + notes[i] + "</div><div class='noteText'>" + notes[i+1] + "</div>";
        /* note.onclick = function(e) {
            e.target.setAttribute('data-toggle', 'modal');
            e.target.setAttribute('data-target', '#noteUpdate');
            $('#updName').val(e.target.firstChild.innerHTML);
            $('#updText').val(e.target.lastChild.innerHTML);
            $('#ident').val(e.target.parentElement.id.slice(4));
        } */
        container.appendChild(note);
        var panel = document.createElement('div');
        panel.className = 'notePanel';
        panel.id = 'panl'+notes[i+2];
        container.appendChild(panel);
        var deleteNote = document.createElement('div');
        deleteNote.className = 'delete';
        deleteNote.innerHTML = '<img src="img/edit.png" width="21" height="21"/> <img src="img/bucket.png" width="21" height="21"/>';
        deleteNote.firstChild.onclick = function(e){
            e.target.setAttribute('data-toggle', 'modal');
            e.target.setAttribute('data-target', '#noteUpdate');
            $('#updName').val(e.target.parentElement.parentElement.parentElement.firstChild.firstChild.innerHTML);
            $('#updText').val(e.target.parentElement.parentElement.parentElement.firstChild.lastChild.innerHTML);
            $('#ident').val(e.target.parentElement.parentElement.id.slice(4));
        }
        deleteNote.lastChild.onclick = function(e){
            var cont = e.target.parentElement.parentElement.id.slice(4);
            var a = 'elem='+cont;
            $.ajax({
                url: 'php/deleteNode.php',
                type: 'POST',
                data: a,
                dataType: 'text',
                success: function(data) {if(data == 'true') location.reload();}
            });
        };
        panel.appendChild(deleteNote);
    }
}
function editNote() {
    var updNoteData = $('#noteUpd').serialize();
    $.ajax({
        url: 'php/editNote.php',
        type: 'POST',
        data: updNoteData,
        dataType: 'text',
        success: function(data) {
            //alert(data);
            location.reload();
        }
    });
}
function getNotes() {
    $.ajax({
        url: 'php/getNotes.php',
        success: function(data){
            if(data != 'false') buildNotes(data);
            else return 0;
        }
    });
}
function regAjax() {
    var formData = $('#registration').serialize();
        $.ajax({
            url: 'php/registration.php',
            type: 'POST',
            data: formData,
            dataType: 'text',
            success: location.reload()
        });
}
function checkForm() {
    if(checkLogin()) {
        if(checkPassword()) return true;
        return false;
    }
    return  false;
}
function checkPassword() {
    if(passwordUnderflow()) {
        if($('#password1').val() == $('#password2').val()) {
        $('#error2').html("");
        return true;
        }
        else {
            $('#error2').html("Пароли не совпадают");
            return false;
        }
    }
}
function passwordUnderflow() {
    if($('#password1').val().length < 6) {
        $('#error2').html("Слишком короткий пароль");
        return false;
    }
    else {
        $('#error2').html("");
        return true;
    }

}
function checkLogin() {
    var log = $('#login').val();
    if(log.length < 6) $('#error1').html('Слишком короткий логин');
    else {
       $.ajax({
        url: 'php/checkLogin.php',
        type: 'POST',
        data: 'login='+log,
        dataType: 'text',
        success: function(data) {
            if(data > 0) {
                $('#error1').html('Такой логин уже занят');
                return false;
            }
            else {
                $('#error1').html('');
                return true;
            }
        }
    });
    }
}
function checkChange() {

}
function resetReg() {
    document.getElementById('registration').reset();
     $('#error1').html('');
     $('#error2').html('');
}
function logout() {
    $.ajax({
        url: 'php/logout.php',
        success: function() {
            location.reload();
        }
    });
}
function addNote() {
    var noteData = $('#note').serialize();
    $.ajax({
        url: 'php/addNote.php',
        type: 'POST',
        data: noteData,
        dataType: 'text',
        success: function(data) {
            $('#note')[0].reset();
            location.reload();
        }
    });
}
function toTop() {
    $('body').animate({scrollTop:0}, 10);
}
function mouseOver() {
    $('#toTop').animate({background: 'black'}, 400);
}
function mouseOut() {
    $('#toTop').animate({background: 'transparent'}, 400)
}
