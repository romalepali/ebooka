function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function openNav1() {
    document.getElementById("mySidenav1").style.width = "250px";
}
function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
}

function openNav1_2() {
    document.getElementById("mySidenav1_2").style.width = "250px";
}
function closeNav1_2() {
    document.getElementById("mySidenav1_2").style.width = "0";
}

function openNav2() {
    document.getElementById("mySidenav2").style.width = "250px";
}
function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
}

function openNav2_1() {
    document.getElementById("mySidenav2_1").style.width = "250px";
}
function closeNav2_1() {
    document.getElementById("mySidenav2_1").style.width = "0";
}

function openNav2_2() {
    document.getElementById("mySidenav2_2").style.width = "250px";
}
function closeNav2_2() {
    document.getElementById("mySidenav2_2").style.width = "0";
}

function openNav3() {
    document.getElementById("mySidenav3").style.width = "250px";
}
function closeNav3() {
    document.getElementById("mySidenav3").style.width = "0";
}

function openNav4() {
    window.location.href='index.php';
}

function logout() {
    if(confirm('Are you sure you want to logout your account?'))
    {
        window.location.href='../logout.php';
    }
}

function update_upass(id) {
    if(confirm('Are you sure you want to change password?'))
    {
        window.location.href='profile-cp.php?user_id='+id;
    }
}

function update_uname(id) {
    if(confirm('Are you sure you want to change username?'))
    {
        window.location.href='profile-cu.php?user_id='+id;
    }
}