BX.ready(function () {
  BX.bindDelegate(
    document.body,
    "click",
    { className: "submit" },
    function (e) {
        e.preventDefault();
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
            document.querySelector(".form__body").innerHTML = "<div class='form__handler'>"+response.data.result+"</div>";
          },
          function (response) {}
        );
    }
  );
});
