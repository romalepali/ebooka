function uccategory_id(id)
{
    if(confirm("Are you want to update the cover of this category?")){
        window.location.href='categories-cover-update.php?uccategory_id='+id;
    }
}

function ucategory_id(id)
{
    if(confirm("Are you want to update this category?")){
        window.location.href='categories-update.php?ucategory_id='+id;
    }
}

function dcategory_id(id)
{
    if(confirm("Are you want to delete this category?")){
        window.location.href='categories.php?dcategory_id='+id;
    }
}

function category_new()
{
    window.location.href='categories-new.php';
}