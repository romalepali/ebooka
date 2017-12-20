function ucbook_id(id)
{
    if(confirm("Are you want to update the cover of this book?")){
        window.location.href='books-cover-update.php?ucbook_id='+id;
    }
}

function ubook_id(id)
{
    if(confirm("Are you want to update this book?")){
        window.location.href='books-update.php?ubook_id='+id;
    }
}

function vbook_id(link)
{
    window.location.href='books-view.php?vbook_id='+link;
}

function vdbook_id(id)
{
    window.location.href='books-details.php?vdbook_id='+id;
}

function dbook_id(id)
{
    if(confirm("Are you want to delete this book?")){
        window.location.href='books.php?dbook_id='+id;
    }
}

function book_new()
{
    window.location.href='books-new.php';
}