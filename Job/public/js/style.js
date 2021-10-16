function admin() {
    document.getElementById("admin").style.display = "block";
    document.getElementById("student").style.display = "none";
    document.getElementById("company").style.display = "none";
    document.getElementById("lecturer").style.display = "none";
}

function student() {
    document.getElementById("admin").style.display = "none";
    document.getElementById("student").style.display = "block";
    document.getElementById("company").style.display = "none";
    document.getElementById("lecturer").style.display = "none";
}

function company() {
    document.getElementById("admin").style.display = "none";
    document.getElementById("student").style.display = "none";
    document.getElementById("company").style.display = "block";
    document.getElementById("lecturer").style.display = "none";
}

function lecturer() {
    document.getElementById("admin").style.display = "none";
    document.getElementById("student").style.display = "none";
    document.getElementById("company").style.display = "none";
    document.getElementById("lecturer").style.display = "block";
}
