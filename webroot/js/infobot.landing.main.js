jQuery(function (e) {
    var t = {
        nextButton: !0,
        prevButton: !0,
        pagination: !0,
        animateStartingFrameIn: !0,
        autoPlay: !0,
        autoPlayDelay: 3e3,
        preloader: !0,
        preloadTheseFrames: [1]
    }, n = e("#sequence").sequence(t).data("sequence");
    e(".carousel").carousel({
        interval: 4e3
    });
    e(".show-nav").pageslide({
        direction: "left",
        modal: !0
    });
    e("#nav ul li a[href^='#']").on("click", function (t) {
        t.preventDefault();
        e("html, body").animate({
            scrollTop: e(this.hash).offset().top
        }, 600)
    });
    required = ["email"];
    email = e("#email");
    errornotice = e("#error");
    emptyerror = "Este campo es requerido";
    emailerror = "Correo incorrecto";
    e("#newsletter").submit(function () {
        for (i = 0; i < required.length; i++) {
            var t = e("#" + required[i]);
            if (t.val() == "" || t.val() == emptyerror) {
                t.addClass("needsfilled");
                t.val(emptyerror);
                errornotice.fadeIn(750)
            } else t.removeClass("needsfilled")
        }
        if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
            email.addClass("needsfilled");
            email.val(emailerror)
        }
        if (e(":input").hasClass("needsfilled")) return !1;
        errornotice.hide();
        return !0
    });
    e(":input").focus(function () {
        if (e(this).hasClass("needsfilled")) {
            e(this).val("");
            e(this).removeClass("needsfilled")
        }
    })
});