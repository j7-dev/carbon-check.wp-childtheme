(function ($) {
  $(document).ready(function () {
    $("#menu-dropdown").click(function () {
      $(".dropdown-items").slideToggle();
    });

    // 調整最小高度

    const pageH = $(".min-h-100vh").height();
    const windowH = $(window).height();
    const headerH = $("body > .elementor-location-header").height();
    const footerH = $("body > .elementor-location-footer").height();
    if (pageH + headerH + footerH < windowH) {
      const diff = windowH - pageH - headerH - footerH;
      $(".min-h-100vh").css("min-height", pageH + diff);
    }

    const locale = getLocale();

    translate(locale);
  });

  function getLocale() {
    const locale = $("html").attr("lang");
    return locale;
  }

  function translate(locale) {
    if ("zh-TW" === locale) return;
    const mapping = {
      "Log out": "登出",
      "Account or E-mail": "帳號或 E-mail",
      Password: "密碼",
      Register: "註冊",
      Account: "帳號",
      Name: "姓名",
      "E-mail": "電子郵件地址",
      "Confirm Password": "確認Password",
      "Log in": "登入",
      Profile: "帳號設定",
      "Account Setting": "Account設定",
    };

    // 遍歷mapping物件，並在selector內查找包含特定文本的元素，然後替換文本
    $.each(mapping, function (key, value) {
      $(`a:contains("${value}"), label:contains("${value}")`).each(function () {
        $(this).html($(this).html().replace(value, key));
      });
    });

    const formMapping = {
      Login: "登入",
      Register: "註冊",
    };

    $.each(formMapping, function (key, value) {
      $(`input[value="${value}"]`).each(function () {
        $(this).val(key);
      });
    });

    const placeholderMapping = {
      "Only English and numbers are allowed": "只能輸入英文、數字",
      "Password must contain at least one lowercase letter, one uppercase letter, and one number":
        "您的密碼必須至少包含一個小寫字母，一個大寫字母和一個數字",
      "Confirm Password": "確認密碼",
    };

    $.each(placeholderMapping, function (key, value) {
      $(`input[placeholder="${value}"]`).each(function () {
        $(this).attr("placeholder", key);
      });
    });

    const urlMapping = [
      "login",
      "register",
      "%e5%bf%98%e8%a8%98%e5%af%86%e7%a2%bc",
    ];

    urlMapping.forEach(function (value) {
      $(`a[href*="${value}"]`).each(function () {
        $(this).attr(
          "href",
          $(this).attr("href").replace(value, `en/${value}`)
        );
      });
    });

    $.each(placeholderMapping, function (key, value) {
      $(`input[placeholder="${value}"]`).each(function () {
        $(this).attr("placeholder", key);
      });
    });
  }
})(jQuery);
