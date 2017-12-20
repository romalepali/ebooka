function ucstory_id(id)
{
    if(confirm("Are you want to update the cover of this story?")){
        window.location.href='posts-cover-update.php?ucstory_id='+id;
    }
}

function ustory_id(id)
{
    if(confirm("Are you want to update this story?")){
        window.location.href='posts-update.php?ustory_id='+id;
    }
}

function vstory_id(id)
{
    window.location.href='posts-view.php?vstory_id='+id;
}

function vdstory_id(id)
{
    window.location.href='posts-details.php?vdstory_id='+id;
}

function dstory_id(id)
{
    if(confirm("Are you want to delete this story?")){
        window.location.href='posts.php?dstory_id='+id;
    }
}

function story_new()
{
    window.location.href='posts-new.php';
}