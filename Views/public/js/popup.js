   
function Add_Group()
{
    Popup('Add_Group_Div',false);
}
function Close()
{
    Hide('Add_Group_Div',false)
}

function CreateGroup()
{
   Close();
}

function ShowWhereToPost()
{
	 Popup('where',true);
}
function Close_Where()
{
	 Hide('where',true);
}


function Popup(id,className)
{
	if(className == true)
	{
	   $('.'+id).css("display","block");
	}
	else
	{
      $('#'+id).css("display","block")
	}
}
function Hide(id,className)
{
	if(className == true)
	{
      $('.'+id).css("display","none");
	}
	else
	{
	   $('#'+id).css("display","none");
	}
}