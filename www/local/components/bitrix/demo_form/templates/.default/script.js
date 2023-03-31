BX.ready(function () {
  BX.bindDelegate(
    document.body,
    "click",
    { className: "submit" },
    function (e) {
      e.preventDefault();
      let error = false;
      let required = document.querySelectorAll(".required");

      required.forEach((element) => {
        if (element.value == "") {
          element.classList.add("error");
          error = true;
        }
      });

      if (!error) {
        BX.ajax
          .runComponentAction("bitrix:demo_form", "sendMessage", {
            mode: "ajax",
            method: "post",
            data: BX.ajax.prepareData(
                BX.ajax.prepareForm(document.querySelector(".feedback__form"))
                  .data
              ),
          })
          .then(
            function (response) {
              document.querySelector(".form__body").innerHTML =
                "<div class='form__handler'>" + response.data.result + "</div>";
            },
            function (response) {
              document.querySelector(".form__body").innerHTML =
                "<div class='form__handler'>" + response.data.result + "</div>";
            }
          );
      }
      error = false;
    }
  );

  BX.bindDelegate(document.body, "click", { className: "error" }, function () {
    this.classList.remove("error");
  });
});
