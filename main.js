function getAllData() {

    $.ajax({

      url:"getAllData.php",
      method:"GET",
      success:function (data) {

        var target = $("#target")
        for (var i = 0; i < data.length; i++) {
          target = data[i]

          target.append("" + target + "")
        }
      }

    })
}


function init() {

  getAllData();
}
$(document).ready(init);
