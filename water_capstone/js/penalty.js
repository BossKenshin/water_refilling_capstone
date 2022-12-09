loadConsumer();
function loadConsumer() {
  $(document).ready(function () {
    $.ajax({
      url: "./sql/consumer.fetchbill.php",
      type: "POST",
      data: {
        functionType: "onPenaltyConsumer",
      },
      success: function (data) {
        var json = JSON.parse(data);

        const template = document.querySelector("#penalty-consumer-template");

        const parent = document.querySelector("#penaltyTable tbody");

        $("#penaltyTable tbody").empty();

        for (let i = 0; i < json.length; i++) {
          //clone the template
          let clone = template.content.cloneNode(true);

          //clone.querySelector("#cols .branchname").innerHTML = 'Staff';
          clone.querySelector("#fullname").innerHTML = json[i].fullname;
          clone.querySelector("#address").innerHTML = json[i].address;
          clone.querySelector("#billing-view").dataset.id = json[i].id;
          clone.querySelector("#billing-view").dataset.fullname =
            json[i].fullname;
          clone.querySelector("#billing-view").dataset.address =
            json[i].address;

          clone.querySelector("#username").innerHTML = json[i].user;

          // var link =  "consumerprofile.php?consumerid=" +
          // encodeURI(json[i].id);
          // clone.querySelector("#consumer-row td a").setAttribute("href", link);

          //apppend
          parent.append(clone);
        }
      },
    });
  });
}

let consumer_id;

function setBill(id, name, add) {
  consumer_id = id;

  document.getElementById("btnpaid").setAttribute("disabled", true);

  document.getElementById("cname").value = name;
  document.getElementById("cadd").value = add;

  $.ajax({
    url: "./sql/staff.addbill.php",
    type: "POST",
    data: {
      id: consumer_id,
      functionType: "fetchBillCounter",
    },
    success: function (data) {
      var json = JSON.parse(data);

      if (json.length != 0) {
        document.getElementById("genrec").removeAttribute("disabled");
        document.getElementById("btndeletebill").removeAttribute("disabled");
        document.getElementById("cfromdate").value = json[0].startDate.trim();
        document.getElementById("ctodate").value = json[0].dueDate.trim();
        document.getElementById("ccubics").value = json[0].cubic;
        document.getElementById("ctotal").value = json[0].total;
        document.getElementById("cstatus").value = json[0].status;
        document.getElementById("cdays").value = json[0].days_penalty;

        var total = parseFloat(json[0].total);
        var penalty = parseFloat(json[0].days_penalty);

        let total_amount = total + penalty * 50;

        document.getElementById("ctotalpayment").value = total_amount;

        $("#payment").val("2");
      } else {
        document.getElementById("genrec").setAttribute("disabled", true);
        document.getElementById("btndeletebill").setAttribute("disabled", true);
        document.getElementById("cfromdate").value = "";
        document.getElementById("ctodate").value = "";
        document.getElementById("ccubics").value = "";
        document.getElementById("ctotal").value = "";
        document.getElementById("cstatus").value = "";
      }
    },
  });
}

function rece() {
  document.getElementById("btnpaid").removeAttribute("disabled");

  var name = document.getElementById("cname").value;
  var address = document.getElementById("cadd").value;
  var mused = document.getElementById("ccubics").value;
  var total = document.getElementById("ctotalpayment").value;

  window.open(
    "receipt.php?cname=" +
      encodeURI(name) +
      "&address=" +
      encodeURI(address) +
      "&mused=" +
      encodeURI(mused) +
      "&total=" +
      encodeURI(total + " with fee") +
      "&staff=" +
      encodeURI(staffname)
  );
}

$("#btnpaid").click(function () {
  $.ajax({
    url: "./sql/staff.addbill.php",
    dataType: "script",
    type: "POST",
    data: {
      functionType: "paid",
      paymentType: "Over the Counter",
      id: consumer_id,
    },
    success: function (data) {
      if (data == 0) {
        Swal.fire({
          icon: "success",
          title: "Bill Paid",
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Bill not paid",
          text: "Encountered some error",
        });
      }

      $("#view").modal("hide");
      loadConsumer();
    },
  });
});

$("#btndeletebill").click(function () {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "./sql/staff.addbill.php",
        dataType: "script",
        type: "POST",
        data: {
          id: consumer_id,
          functionType: "delete",
        },
      }).done(function (data) {
        if (data == 0) {
          loadConsumer();

          swalWithBootstrapButtons.fire(
            "Deleted!",
            "Bill now deleted",
            "success"
          );
        } else {
          Swal.fire({
            icon: "error",
            title: "Deleting bill error",
            text: "Encountered some error",
          });
        }
      });
    }
  });
});

function filterConsumer() {
  var val = document.getElementById("search").value;

  $("#search").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#penaltyTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  // $("#consumerBillingTable td#consumer-fullname1:contains('" + val + "')").parent().show();
  // $("#consumerBillingTable td#consumer-fullname1:not(:contains('" + val + "'))").parent().hide();
}
