function deleteJobseeker(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteJobseeker.php?id="+e, true);
        xhttp.send();
    }
}
function deletecollege(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deletecollege.php?college_info_id="+e, true);
        xhttp.send();
    }
}

function deleteJobpost(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteJobpost.php?id="+e, true);
        xhttp.send();
    }
}
function deletefreelancer(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deletefreelancer.php?userid="+e, true);
        xhttp.send();
    }
}
function deleteintern(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteintern.php?id="+e, true);
        xhttp.send();
    }
}
function deleteagency(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteagency.php?userid="+e, true);
        xhttp.send();
    }
}

function changeStatus(cnt, e, s)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                if(xhttp.responseText != "")
                {
                    document.getElementById("changeStausButton-"+cnt).innerHTML = xhttp.responseText;
                }
                else
                {
                    alert("1- Something went wrong, please refresh page & try again.");
                }
            }
        };
        xhttp.open("POST", "ajax/changeJobPostStatus.php?id="+e+ "&status="+s+ "&cnt="+cnt, true);
        xhttp.send();
    }
    else
    {
        alert("Something went wrong, please refresh page & try again.");
    }
}
function changefstatus(cnt, e, s)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                if(xhttp.responseText != "")
                {
                    document.getElementById("changeStausButton-"+cnt).innerHTML = xhttp.responseText;
                }
                else
                {
                    alert("1- Something went wrong, please refresh page & try again.");
                }
            }
        };
        xhttp.open("POST", "ajax/changefreelancerstatus.php?userid="+e+ "&status="+s+ "&cnt="+cnt, true);
        xhttp.send();
    }
    else
    {
        alert("Something went wrong, please refresh page & try again.");
    }
}
