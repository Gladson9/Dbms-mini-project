function show(nr) {
    document.getElementById("table1").style.display="none";
    document.getElementById("table2").style.display="none";
    document.getElementById("table3").style.display="none";
    document.getElementById("table4").style.display="none";
    document.getElementById("table"+nr).style.display="flex";
}




/*

// check the empty input
function checkEmptyInput() {

    var isEmpty = false,
        name = document.getElementById("name").value,
        username = document.getElementById("username").value,
        email = document.getElementById("email").value,
        contact = document.getElementById("contact").value,
        gender = document.getElementById("gender").value,
        address = document.getElementById("address").value;
    // password = document.getElementById("password").value,
    // usertype = document.getElementById("usertype").value;

    if (name === "" || username === "" || email === "" || contact === "" || gender === "" || address === "") {
        // alert("First Name Connot Be Empty");
        isEmpty = true;
    }
    // else if(lname === ""){
    //     alert("Last Name Connot Be Empty");
    //     isEmpty = true;
    // }
    // else if(age === ""){
    //     alert("Age Connot Be Empty");
    //     isEmpty = true;
    // }
    return isEmpty;
}

// add Row
function addHtmlTableRow() {
    // get the table by id
    // create a new row and cells
    // get value from input text
    // set the values into row cell's
    if (!checkEmptyInput()) {
        var newRow = table.insertRow(table.length),
            cell1 = newRow.insertCell(0),
            cell2 = newRow.insertCell(1),
            cell3 = newRow.insertCell(2),
            cell4 = newRow.insertCell(3),
            cell5 = newRow.insertCell(4),
            cell6 = newRow.insertCell(5),
            name = document.getElementById("name").value,
            username = document.getElementById("username").value,
            email = document.getElementById("email").value,
            contact = document.getElementById("contact").value,
            gender = document.getElementById("gender").value,
            address = document.getElementById("address").value;

        cell2.innerHTML = name;
        cell1.innerHTML = username;
        cell3.innerHTML = email;
        cell4.innerHTML = contact;
        cell5.innerHTML = gender;
        cell6.innerHTML = address;
        // call the function to set the event to the new row
        selectedRowToInput();
    }
}



function editHtmlTbleSelectedRow() {
    var name = document.getElementById("name").value,
        username = document.getElementById("username").value,
        email = document.getElementById("email").value,
        contact = document.getElementById("contact").value,
        gender = document.getElementById("gender").value,
        address = document.getElementById("address").value;
    if (!checkEmptyInput()) {
        // table.rows[rIndex].cells[0].innerHTML = username;
        // table.rows[rIndex].cells[1].innerHTML = name;
        // table.rows[rIndex].cells[2].innerHTML = email;
        // table.rows[rIndex].cells[3].innerHTML = contact;
        // table.rows[rIndex].cells[4].innerHTML = gender;
        // table.rows[rIndex].cells[5].innerHTML = address;
    }
}
// to remove the row from the tabel only in frontend not in database
function removeSelectedRow() {
    if (rIndex >= 1) {
        table.deleteRow(rIndex);
    }
    // clear input text
    // document.getElementById("name").value = "";
    // document.getElementById("username").value = "";
    // document.getElementById("email").value = "";
    // document.getElementById("contact").value = "";
    // document.getElementById("gender").value = "";
    // document.getElementById("address").value = "";
}

*/