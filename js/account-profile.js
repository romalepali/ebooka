function update_id(id)
{
    if(confirm('Are you sure you want to change the data?'))
    {
        window.location.href='admin-update.php?update_id='+id;
    }
}
function upload_prof(id)
{
    window.location.href='upload-admin.php?upload_prof='+id;
}