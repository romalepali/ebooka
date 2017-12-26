function update_id(id)
{
    if(confirm('Are you sure you want to change the data?'))
    {
        window.location.href='profile-update.php?user_id='+id;
    }
}
function upload_prof(id)
{
    window.location.href='upload-profile.php?user_id='+id;
}