var date_arr = new Array;
var days_arr = new Array;

date_arr[0]=new Option("January",31);
date_arr[1]=new Option("February",28);
date_arr[2]=new Option("March",31);
date_arr[3]=new Option("April",30);
date_arr[4]=new Option("May",31);
date_arr[5]=new Option("June",30);
date_arr[6]=new Option("July",31);
date_arr[7]=new Option("August",30);
date_arr[8]=new Option("September",30);
date_arr[9]=new Option("October",31);
date_arr[10]=new Option("November",31);
date_arr[11]=new Option("December",30);

function fill_select(f)
{
        var content = "<SELECT id='soflow-color' name=\"months\"               onchange=\"update_days(FRM)\">";
        for(x=0;x<12;x++)
                content +="<OPTION value=\""+date_arr[x].value+"\">"+date_arr[x].text;
        content += "</SELECT><SELECT id='soflow-color' name=\"days\"></SELECT>";
        document.getElementById('data_picker').innerHTML = content;
        //f= document.FRM;
        //selection=f.months[f.months.selectedIndex].value;

}

function update_days(f)
{
       
        temp=document.getElementsByName('days')[0].selectedIndex;
        for(x=days_arr.length;x>0;x--)
        {
                days_arr[x]=null;
                document.getElementsByName('days').options[x]=null;
         }
        e = document.getElementsByName('months')[0];
        y = document.getElementsByName('years')[0];
        g = document.getElementsByName('days')[0];

        selection=parseInt(e.options[e.selectedIndex].value);
        ret_val = 0;
        if(e.options[e.selectedIndex].value == 28)
        {
                year=parseInt(y.options[y.selectedIndex].value);
                if (year % 4 != 0 || year % 100 == 0 ) 
                      ret_val=0;
                else
                        if (year % 400 == 0)  
                            ret_val=1;
                        else
                            ret_val=1;
        }
        selection = selection + ret_val;
        for(x=1;x < selection+1;x++)

        {
                days_arr[x-1]=new Option(x);
                g.options[x-1]=days_arr[x-1];
        }
        if (temp == -1) 
            g.options[0].selected=true;
        else
             g.options[temp].selected=true;
}
function year_install(f)
{
        var content = "<SELECT id='soflow-color' name=\"years\" onchange=\"update_days(FRM)\">";
        for(x=1900;x<2101;x++) 
            content +="<OPTION value=\""+x+"\">"+x;
        content += "</SELECT>";
        update_days(f);
        document.getElementById('data_picker').innerHTML += content;
}

$(document).ready(function() 
 {  
    fill_select(document.getElementById("data_picker"));
    year_install(document.getElementById("data_picker"));

 });