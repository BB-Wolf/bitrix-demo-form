BX.ready(function () {
  BX.bindDelegate(
    document.body,
    "click",
    { className: "submit" },
    function (e) {
      e.preventDefault();
      var error = true;
      let required = document.querySelectorAll(".required");
      required.forEach((element) => {
        if (element.value == "") {
          element.classList.add("error");
        }
      });

      console.log(required);
      if (!error) {
        BX.ajax
          .runComponentAction("bitrix:demo_form", "sendMessage", {
            mode: "ajax",
            data: {
              msg: "Hero!",
            },
          })
          .then(
            function (response) {
              console.log(response);
              document.querySelector(".form__body").innerHTML =
                "<div class='form__handler'>" + response.data.result + "</div>";
            },
            function (response) {}
          );
      }
    }
  );

  BX.bindDelegate(document.body, "click", { className: "error" }, function () {
    this.classList.remove("error");
  });
});
