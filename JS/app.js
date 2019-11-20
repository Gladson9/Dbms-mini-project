// Validating Empty Field
// function check_empty() {
//     if (document.getElementById('event_id').value == "" || document.getElementById('event_name').value == "" || document.getElementById('college_name').value == "" || document.getElementById('event_date').value == "") {
//         alert("Fill All Fields !");
//     }
// }
//Function To Display Popup
function div_show() {
    document.getElementById('abc').style.display = "block";
}

function show_delete() {
    document.getElementById('deletepopup').style.display = "block";
}

//Function to Hide Popup
function div_hide() {
    document.getElementById('abc').style.display = "none";
}

function div_hide_delete() {
    document.getElementById('deletepopup').style.display = "none";
}