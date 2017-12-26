function updatepass_id(id)
{
    if(confirm('Are you sure you want to change password?'))
    {
        window.location.href='admin-cpassword.php?updatepass_id='+id;
    }
}
function updateuser_id(id)
{
    if(confirm('Are you sure you want to change username?'))
    {
        window.location.href='admin-cusername.php?updateuser_id='+id;
    }
}
function viewprof_id(id)
{
    window.location.href='profile.php?viewprof_id='+id;
}

function logout()
{
    if(confirm('Are you sure you want to logout?'))
    {
        window.location.href='../logout.php';
    }
}
}