var myVar = setInterval(LoadData, 2000);

http_request = new XMLHttpRequest();

function LoadData() {
    $.ajax({
        url: 'view.php',
        type: "POST",
        dataType: 'json',
        success: function(data) {
            $('#record').empty();
            for (var i = 0; i < data.length; i++) {
                var commentId = data[i].id;
                if (data[i].parent_comment == 0) {
                    var row = $('<tr><td><b><img src="../images/avatar.jpg" width="30px" height="30px" />' + data[i].student + ' :<i> ' + data[i].date + ':</i></b></br><p style="padding-left:80px">' + data[i].post + '</br><a data-toggle="modal" data-id="' + commentId + '" title="Add this item" class="open-ReplyModal" href="#ReplyModal">Reply</a> <a href="#" class="delete-comment" data-id="' + commentId + '">Delete</a></p></td></tr>');
                    $('#record').append(row);
                    for (var r = 0; r < data.length; r++) {
                        if (data[r].parent_comment == commentId) {
                            var comments = $('<tr><td style="padding-left:80px"><b><img src="../images/avatar.jpg" width="30px" height="30px" />' + data[r].student + ' :<i> ' + data[r].date + ':</i></b></br><p style="padding-left:40px">' + data[r].post + '</p><a href="#" class="delete-comment" data-id="' + data[r].id + '">Delete</a></td></tr>');
                            $('#record').append(comments);
                        }
                    }
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' - ' + errorThrown);
        }
    });
}

$(document).on("click", ".open-ReplyModal", function() {
    var commentid = $(this).data('id');
    $("#Rcommentid").val(commentid);
});

$(document).on("click", ".delete-comment", function(e) {
    e.preventDefault();
    var commentid = $(this).data('id');
    if (confirm('Are you sure you want to delete this comment?')) {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: commentid
            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    LoadData();
                } else {
                    alert("Error occurred while deleting the comment!");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    }
});

$(document).ready(function() {
    // Handler for save button
    $('#butsave').on('click', function() {
        $("#butsave").attr("disabled", "disabled");
        var id = $("#Pcommentid").val();
        var name = document.forms["frm"]["name"].value;
        var msg = document.forms["frm"]["msg"].value;
        if (name != "" && msg != "") {
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    msg: msg,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#butsave").removeAttr("disabled");
                        document.forms["frm"]["Pcommentid"].value = "";
                        document.forms["frm"]["name"].value = "";
                        document.forms["frm"]["msg"].value = "";
                        LoadData();
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occurred!");
                    }
                }
            });
        } else {
            alert('Please fill all the fields!');
        }
    });

    // Handler for reply button
    $('#btnreply').on('click', function() {
        $("#btnreply").attr("disabled", "disabled");
        var id = $("#Rcommentid").val();
        var name = document.forms["frm1"]["Rname"].value;
        var msg = document.forms["frm1"]["Rmsg"].value;
        if (name != "" && msg != "") {
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    msg: msg,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#btnreply").removeAttr("disabled");
                        document.forms["frm1"]["Rcommentid"].value = "";
                        document.forms["frm1"]["Rname"].value = "";
                        document.forms["frm1"]["Rmsg"].value = "";
                        LoadData();
                        $("#ReplyModal").modal("hide");
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occurred!");
                    }
                }
            });
        } else {
            alert('Please fill all the fields!');
        }
    });

    // Initial data load
    LoadData();
});







	