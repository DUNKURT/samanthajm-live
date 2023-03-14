  function getData() {
    var fromDate = $("#fromDate").val();
    var toDate = $("#toDate").val();
    $.ajax({
      url: "getData.php",
      method: "POST",
      data: { fromDate: fromDate, toDate: toDate },
      dataType: "json",
      success: function (data) {
        $("#dataTable tbody").empty();
        if (data.length > 0) {
          $.each(data, function (key, value) {
            var row = "<tr>";
            row += "<td>" + value.id + "</td>";
            row += "<td>" + value.product + "</td>";

            var expirationDate = new Date(value.expiration);
            var today = new Date();
            var twoMonthsBefore = new Date(today.getFullYear(), today.getMonth() + 2, 1);
            if (expirationDate < twoMonthsBefore) {
              row += "<td class='text-danger'>" + value.expiration + "</td>";
            } else {
              row += "<td>" + value.expiration + "</td>";
            }


            if (value.stock < 6) {
              row += "<td class='text-danger'>" + value.stock + "</td>";
            } else {
              row += "<td>" + value.stock + "</td>";
            }


            row += "<td>" + value.brand+ "</td>";
            row += "<td>" + value.category + "</td>";
            row += "<td>" + value.price + "</td>";


            if (value.status == "Available") {
              row += "<td class='text-success'>" + value.status + "</td>";
            } else {
              row += "<td class='text-danger'>" + value.status + "</td>";
            }

            row += "</tr>";
            $("#dataTable tbody").append(row);
          });
        } else {
          var row =
            "<tr><td colspan='7' class='text-center'>No data available</td></tr>";
          $("#dataTable tbody").append(row);
        }
      },
    });
  }
  


      function printTable() {
        var fromDate = $("#fromDate").val();
        var toDate = $("#toDate").val();
        var printContent =
          "<h2>Date Range: " + fromDate + " to " + toDate + "</h2>";
        printContent += document.getElementById("dataTable").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContents;
      }
