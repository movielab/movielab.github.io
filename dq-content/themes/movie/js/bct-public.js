! function(e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? module.exports = function(a, t) {
        return void 0 === t && (t = "undefined" != typeof window ? require("jquery") : require("jquery")(a)), e(t), t
    } : e(jQuery)
}(function(e) {
    var a = e(window),
        t = a.width(),
        n = a.height();
    a.on("resize", function() {
        t = a.width(), n = a.height()
    }), e.fn.lazyload = function(t) {
        function n(e) {
            var a = e.tagName.toLowerCase(),
                t = e.getAttribute("data-src");
            "img" === a ? (e.src = t, e.getAttribute("data-srcset") && (e.srcset = e.getAttribute("data-srcset"))) : "iframe" === a ? e.src = t : e.backgroundImage = "url(" + t + ")"
        }

        function o() {
            i.pageYOffset = window.pageYOffset, i.pageXOffset = window.pageXOffset;
            var a = 0;
            s.each(function() {
                var t = e(this);
                if (!(i.skip_invisible && !t.is(":visible") || e.abovethetop(this, i) || e.leftofbegin(this, i)))
                    if (e.belowthefold(this, i) || e.rightoffold(this, i)) {
                        if (++a > i.failure_limit) return !1
                    } else t.trigger("appear"), a = 0
            })
        }
        var s = this,
            i = {
                threshold: 0,
                failure_limit: 0,
                event: "scroll",
                container: window,
                skip_invisible: !1,
                appear: null,
                load: null,
                allowIntersectionMode: !0,
                placeholder: "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",
                pageXOffset: !1,
                pageYOffset: !1
            };
        t && e.extend(i, t);
        var r = i.allowIntersectionMode && "IntersectionObserver" in window && 0 === i.event.indexOf("scroll");
        if (r) {
            t = {}, i.container !== window && (t.root = void 0 === i.container[0] ? i.container : i.container[0]);
            var l = new IntersectionObserver(function(e) {
                [].forEach.call(e, function(e) {
                    !1 !== e.isIntersecting && (n(e.target), l.unobserve(e.target))
                })
            }, t)
        } else var c = void 0 === i.container || i.container === window ? a : e(i.container);
        0 !== i.event.indexOf("scroll") || r || c.on(i.event, function() {
            return o()
        });
        var d = $("img.cpt").attr("data-src");
        return $("img.cpt").attr("src", d), $("#cpt").removeClass("cpt"), this.each(function() {
            var a = this;
            if (a.loaded = !1, null === a.getAttribute("src") && "IMG" === a.tagName && (a.src = i.placeholder), r) l.observe(a);
            else {
                var t = e(a);
                t.one("appear", function() {
                    if (!this.loaded) {
                        if (i.appear) {
                            var t = s.length;
                            i.appear.call(a, t, i)
                        }
                        n(a), a.loaded = !0, t = e.grep(s, function(e) {
                            return !e.loaded
                        }), s = e(t), i.load && (t = s.length, i.load.call(a, t, i))
                    }
                }), 0 !== i.event.indexOf("scroll") && a.addEventListener(i.event, function() {
                    a.loaded || t.trigger("appear")
                })
            }
        }), r || (window.addEventListener("resize", function() {
            o()
        }), /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) && a.on("pageshow", function(a) {
            a.originalEvent && a.originalEvent.persisted && s.each(function() {
                e(this).trigger("appear")
            })
        }), e(function() {
            o()
        })), this
    }, e.belowthefold = function(a, t) {
        return (void 0 === t.container || t.container === window ? n + t.pageYOffset : e(t.container).offset().top + e(t.container).height()) <= e(a).offset().top - t.threshold
    }, e.rightoffold = function(a, n) {
        return (void 0 === n.container || n.container === window ? t + n.pageXOffset : e(n.container).offset().left + e(n.container).width()) <= e(a).offset().left - n.threshold
    }, e.abovethetop = function(a, t) {
        return (void 0 === t.container || t.container === window ? t.pageYOffset : e(t.container).offset().top) >= e(a).offset().top + t.threshold + a.clientHeight
    }, e.leftofbegin = function(a, t) {
        return (void 0 === t.container || t.container === window ? t.pageXOffset : e(t.container).offset().left) >= e(a).offset().left + t.threshold + a.clientWidth
    }
}), jQuery(document).ready(function(e) {
    var a;

    function t(a) {
        a.target;
        var t = a.item.count,
            n = a.item.index + 1;
        n > t && (n -= t), e("#numsld").html("<span>" + n + "</span>/" + t)
    }

    function n(e) {
        return e.find("span").remove(), parseInt(e.html())
    }

    function o(a) {
        a = a.replace("link", ""), e("html,body").animate({
            scrollTop: e("#" + a).offset().top
        }, "slow")
    }
    e(".lazy").lazyload(), e(".subcommentnav a").on("click", function(a) {
            a.preventDefault();
            var t = e(this);
            e(".subcommentnav li").removeClass("on"), t.parent().addClass("on");
            var n = e(this).data("tab");
            e(".atre").addClass("hide"), e("#" + n).removeClass("hide")
        }), e("body").on("click", ".votar_com", function(a) {
            a.preventDefault();
            var t = e(this),
                n = t.prev().text(),
                o = e(this).data("comentario");
            if (getCookie("comPositivo"))
                if (JSON.parse(getCookie("comPositivo")).length > 0) {
                    var s = JSON.parse(getCookie("comPositivo"));
                    console.log("aa " + Object.keys(s).length)
                } else {
                    s = [];
                    console.log("no existe")
                }
            else s = [];
            s.includes(o) || e.ajax({
                url: peliPublic.url,
                method: "POST",
                dataType: "json",
                data: {
                    action: "action_votar_comentario_up",
                    com: o
                },
                success: function(e) {
                    if (console.log(e), n = parseInt(n) + parseInt(1), t.prev().text(n), t.hide(), "no logeado" == e.tipo) {
                        s.push(o);
                        e = JSON.stringify(s);
                        setCookie("comPositivo", e, 365)
                    }
                }
            })
        }), e("body").on("click", ".votar_uncom", function(a) {
            a.preventDefault();
            var t = e(this),
                n = t.next().text(),
                o = e(this).data("comentario");
            if (getCookie("comNegativo"))
                if (JSON.parse(getCookie("comNegativo")).length > 0) {
                    var s = JSON.parse(getCookie("comNegativo"));
                    console.log("aa " + Object.keys(s).length)
                } else {
                    s = [];
                    console.log("no existe")
                }
            else s = [];
            s.includes(o) || e.ajax({
                url: peliPublic.url,
                method: "POST",
                dataType: "json",
                data: {
                    action: "action_votar_comentario_down",
                    com: o
                },
                success: function(e) {
                    if (console.log(e), n = parseInt(n) - parseInt(1), t.next().text(n), t.hide(), "no logeado" == e.tipo) {
                        s.push(o);
                        e = JSON.stringify(s);
                        setCookie("comNegativo", e, 365)
                    }
                }
            })
        }), e(document).on("click", ".commentnav a", function(a) {
            a.preventDefault();
            var t = e(this);
            e(".commentnav li").removeClass("on"), t.parent().addClass("on");
            var n = e(this).attr("id"),
                o = e(this).data("id"),
                s = "",
                i = 0;
            e(".tabsnav.List.commentnav").attr("data-type").length > 0 && (s = e(".tabsnav.List.commentnav").attr("data-type"), i = e(".tabsnav.List.commentnav").attr("data-episode-id")), "comm-old" == n ? jQuery.ajax({
                url: peliPublic.url,
                type: "POST",
                data: {
                    action: "comm_old",
                    comm: o,
                    type: s,
                    episode_id: i
                },
                dataType: "JSON",
                success: function(a) {
                    a.comments && (jQuery("#container-news").fadeIn().html(a.comments), setTimeout(function() {
                        e("#container-news").loadMoreResults({
                            displayedItems: 10,
                            button: {
                                text: "Mostrar mas actividad"
                            },
                            tag: {
                                name: "li",
                                class: "txtr"
                            }
                        }), e(".tac").remove(), !0 === a.more_button && e("#container-news").after('<p class="tac"><button class="Button normal btn-view btn-load-more" data-page="2" data-type="old" data-id="' + o + '">Mostrar mas actividad</button></p>'), e(".lazy").lazyload()
                    }, 500))
                }
            }) : "comm-new" == n ? jQuery.ajax({
                url: peliPublic.url,
                type: "POST",
                data: {
                    action: "comm_new",
                    comm: o,
                    type: s,
                    episode_id: i
                },
                dataType: "JSON",
                success: function(a) {
                    console.log(a), a.comments && (jQuery("#container-news").fadeIn().html(a.comments), setTimeout(function() {
                        e("#container-news").loadMoreResults({
                            displayedItems: 10,
                            button: {
                                text: "Mostrar mas actividad"
                            },
                            tag: {
                                name: "li",
                                class: "txtr"
                            }
                        }), e(".tac").remove(), !0 === a.more_button && e("#container-news").after('<p class="tac"><button class="Button normal btn-view btn-load-more" data-page="2" data-type="default" data-id="' + o + '">Mostrar mas actividad</button></p>'), e(".lazy").lazyload()
                    }, 500))
                }
            }) : "comm-pop" == n && jQuery.ajax({
                url: peliPublic.url,
                type: "POST",
                dataType: "JSON",
                data: {
                    action: "comm_pop",
                    comm: o,
                    type: s,
                    episode_id: i
                },
                success: function(a) {
                    null !== a.comments && (jQuery("#container-news").fadeIn().html(a.comments), setTimeout(function() {
                        e("#container-news").loadMoreResults({
                            displayedItems: 10,
                            button: {
                                text: "Mostrar mas actividad"
                            },
                            tag: {
                                name: "li",
                                class: "txtr"
                            }
                        }), e(".tac").remove(), !0 === a.more_button && e("#container-news").after('<p class="tac"><button class="Button normal btn-view btn-load-more" data-page="2" data-type="pop" data-id="' + o + '">Mostrar mas actividad</button></p>'), e(".lazy").lazyload()
                    }, 500))
                }
            })
        }), e(document).on("click", ".btn-load-more", function(a) {
            console.log("click"), a.preventDefault();
            var t = e(this).attr("data-page"),
                n = e(this).attr("data-type"),
                o = e(this).attr("data-id"),
                s = e(".tabsnav.List.commentnav").attr("data-episode-id");
            0 == s.length && (s = 0), jQuery.ajax({
                url: peliPublic.url,
                type: "POST",
                data: {
                    action: "comments_new",
                    page: t,
                    type: n,
                    id: o,
                    episode_id: s
                },
                success: function(a) {
                    (a = JSON.parse(a)).next_page ? jQuery(".btn-load-more").attr("data-page", a.next_page) : jQuery(".btn-load-more").remove(), jQuery("#container-news").append(a.comments), e(".lazy").lazyload()
                },
                error: function(e) {
                    console.log(e)
                }
            })
        }), e("#select-season").on("change", function(a) {
            a.preventDefault(), $this = e(this);
            var t = $this.val();
            console.log(t), e(".all-episodes").addClass("hide"), e("#season-" + t).removeClass("hide")
        }), e(".open_submenu").on("click", function(a) {
            a.preventDefault();
            var t = e(this);
            t.find(".sub-tab-lang").is(":visible") ? t.find(".sub-tab-lang").addClass("hide") : (e(".open_submenu").removeClass("actives"), e(".sub-tab-lang").addClass("hide"), t.addClass("actives"), t.find(".sub-tab-lang").removeClass("hide"))
        }), e(".TPlayer > div:first-child").addClass("Current"), e(".TPlayerNv li:first-child").addClass("actives"), e(".clili").on("click", function(a) {
            a.preventDefault(), e(this).find(".parpax").length ? (e(".message_d").hide(), e(".message_k").show()) : (e(".message_d").show(), e(".message_k").hide())
        }), e(".clili").first().find(".parpax").length ? (e(".message_d").hide(), e(".message_k").show()) : (e(".message_d").show(), e(".message_k").hide()), e(".close-message").on("click", function(a) {
            a.preventDefault(), e(this).parent().remove()
        }), e(document).on("click", ".home-movies .btnstp a", function(a) {
            a.preventDefault();
            var t = e(this).data("tab"),
                n = e(this);
            e("#" + t).length ? (e(".home-movies .btnstp a").removeClass("Current").addClass("ho-naranja"), n.addClass("Current").removeClass("ho-naranja"), e(".apt").addClass("hide"), e("#" + t).removeClass("hide")) : e.ajax({
                url: peliPublic.url,
                method: "POST",
                data: {
                    action: "action_home_movies",
                    id: t
                },
                success: function(a) {
                    e(".home-movies").append(a), e(".home-movies .btnstp a").removeClass("Current").addClass("ho-naranja"), n.addClass("Current").removeClass("ho-naranja"), e(".apt").addClass("hide"), e("#" + t).removeClass("hide"), e(".lazy").lazyload()
                },
                error: function(e) {
                    console.log("error 500")
                }
            })
        }), e(document).on("click", ".home-series .btnstp a", function(a) {
            a.preventDefault();
            var t = e(this).data("tab"),
                n = e(this);
            e("#" + t).length ? (e(".home-series .btnstp a").removeClass("Current").addClass("ho-naranja"), n.addClass("Current").removeClass("ho-naranja"), e(".series_listado").addClass("hide"), e("#" + t).removeClass("hide")) : e.ajax({
                url: peliPublic.url,
                method: "POST",
                data: {
                    action: "action_home_series",
                    id: t
                },
                success: function(a) {
                    e(".home-series").append(a), e(".home-series .btnstp a").removeClass("Current").addClass("ho-naranja"), n.addClass("Current").removeClass("ho-naranja"), e(".series_listado").addClass("hide"), e("#" + t).removeClass("hide"), e("#" + t).owlCarousel({
                        loop: !1,
                        margin: 0,
                        nav: !1,
                        responsiveClass: !0,
                        responsive: {
                            0: {
                                items: 1
                            },
                            425: {
                                items: 2
                            },
                            576: {
                                items: 3
                            },
                            768: {
                                items: 2
                            },
                            992: {
                                items: 3
                            },
                            1200: {
                                items: 4
                            }
                        }
                    }), e(".lazy").lazyload()
                },
                error: function(e) {
                    console.log("error 500")
                }
            })
        }), e(".aa-tgl").on("click", function() {
            var a = e(this).attr("data-tgl");
            e("#" + a).toggleClass("on"), e(this).toggleClass("on")
        }), e(".aa-crd").find(".aa-crd-lnk").click(function() {
            e(this).toggleClass("on"), e(".aa-crd-lnk").not(e(this)).removeClass("on")
        }), e(".aa-nv a").click(function(a) {
            a.preventDefault();
            var t = e(this),
                n = "#" + t.parents(".aa-nv").data("tbs"),
                o = t.closest("li").siblings().children("a"),
                s = t.attr("href");
            o.removeClass("on"), t.addClass("on"), e(n).children().removeClass("on"), e(s).addClass("on")
        }), e(".MovieListSld").owlCarousel({
            loop: !0,
            nav: !1,
            lazyLoad: !0,
            items: 1,
            autoplay: !0,
            autoplayTimeout: 4e3
        }), e(".category-list").owlCarousel({
            loop: !0,
            nav: !1,
            loop: !0,
            margin: 0,
            responsiveClass: !0,
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 5
                }
            }
        }), e(".tvshows-owl").owlCarousel({
            loop: !1,
            margin: 0,
            nav: !1,
            responsiveClass: !0,
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        }), e(".episodes-owl").owlCarousel({
            loop: !1,
            margin: 0,
            nav: !1,
            responsiveClass: !0,
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        }), e(".sagas-owl").owlCarousel({
            loop: !1,
            margin: 0,
            nav: !1,
            responsiveClass: !0,
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                576: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        }), e(".premiere-owl").owlCarousel({
            onInitialized: t,
            onTranslated: t,
            loop: !1,
            margin: 0,
            nav: !1,
            responsiveClass: !0,
            responsive: {
                0: {
                    items: 1
                },
                425: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6
                },
                1600: {
                    items: 7
                }
            }
        }), e(window).scroll(function() {
            e(this).scrollTop() > 150 ? e(".Header").addClass("fx") : e(".Header").removeClass("fx")
        }), (a = jQuery).fn.percircle = function(e) {
            return e || (e = {}), a.extend(e, {
                animate: !0
            }), this.each(function() {
                var t = a(this);
                t.hasClass("percircle") || t.addClass("percircle"), void 0 !== t.attr("data-animate") && (e.animate = "true" == t.attr("data-animate")), e.animate && t.addClass("animate");
                var n = t.attr("data-percent") || e.percent || 0;
                if (t.attr("data-perclock") || e.perclock) {
                    t.hasClass("perclock") || t.addClass("perclock");
                    var o = function(e) {
                        return 10 > e ? "0" + e : e
                    };
                    setInterval(function() {
                        var e = new Date,
                            n = o(e.getHours()) + ":" + o(e.getMinutes()) + ":" + o(e.getSeconds());
                        t.html("<span>" + n + "</span>"), a('<div class="slice"><div class="bar"></div><div class="fill"></div></div>').appendTo(t);
                        var s = e.getSeconds();
                        0 === s && t.removeClass("gt50"), s > 30 && (t.addClass("gt50"), a(".bar", t).css({
                            "-webkit-transform": "rotate(180deg)",
                            "-moz-transform": "rotate(180deg)",
                            "-ms-transform": "rotate(180deg)",
                            "-o-transform": "rotate(180deg)",
                            transform: "rotate(180deg)"
                        }));
                        var i = 6 * s;
                        a(".bar", t).css({
                            "-webkit-transform": "rotate(" + i + "deg)",
                            "-moz-transform": "rotate(" + i + "deg)",
                            "-ms-transform": "rotate(" + i + "deg)",
                            "-o-transform": "rotate(" + i + "deg)",
                            transform: "rotate(" + i + "deg)"
                        })
                    }, 1e3)
                } else {
                    n > 50 && t.addClass("gt50");
                    var s = t.attr("data-text") || e.text || n + "";
                    a("<span>" + s + "</span>").appendTo(t), a('<div class="slice"><div class="bar"></div><div class="fill"></div></div>').appendTo(t), n > 50 && a(".bar", t).css({
                        "-webkit-transform": "rotate(180deg)",
                        "-moz-transform": "rotate(180deg)",
                        "-ms-transform": "rotate(180deg)",
                        "-o-transform": "rotate(180deg)",
                        transform: "rotate(180deg)"
                    });
                    var i = 3.6 * n;
                    setTimeout(function() {
                        a(".bar", t).css({
                            "-webkit-transform": "rotate(" + i + "deg)",
                            "-moz-transform": "rotate(" + i + "deg)",
                            "-ms-transform": "rotate(" + i + "deg)",
                            "-o-transform": "rotate(" + i + "deg)",
                            transform: "rotate(" + i + "deg)"
                        })
                    }, 0)
                }
            })
        }, e("#TPVotes").percircle(),
        function(e) {
            e.fn.percircle = function(a) {
                a || (a = {}), e.extend(a, {
                    animate: !0
                });
                return this.each(function() {
                    var t = e(this);
                    t.hasClass("percircle") || t.addClass("percircle"), void 0 !== t.attr("data-animate") && (a.animate = "true" == t.attr("data-animate")), a.animate && t.addClass("animate");
                    var n = t.attr("data-percent") || a.percent || 0;
                    if (t.attr("data-perclock") || a.perclock || 0) {
                        t.hasClass("perclock") || t.addClass("perclock");
                        var o = function(e) {
                            return 10 > e ? "0" + e : e
                        };
                        setInterval(function() {
                            var a = new Date,
                                n = o(a.getHours()) + ":" + o(a.getMinutes()) + ":" + o(a.getSeconds());
                            t.html("<span>" + n + "</span>"), e('<div class="slice"><div class="bar"></div><div class="fill"></div></div>').appendTo(t);
                            var s = a.getSeconds();
                            0 === s && t.removeClass("gt50"), s > 30 && (t.addClass("gt50"), e(".bar", t).css({
                                "-webkit-transform": "rotate(180deg)",
                                "-moz-transform": "rotate(180deg)",
                                "-ms-transform": "rotate(180deg)",
                                "-o-transform": "rotate(180deg)",
                                transform: "rotate(180deg)"
                            }));
                            var i = 6 * s;
                            e(".bar", t).css({
                                "-webkit-transform": "rotate(" + i + "deg)",
                                "-moz-transform": "rotate(" + i + "deg)",
                                "-ms-transform": "rotate(" + i + "deg)",
                                "-o-transform": "rotate(" + i + "deg)",
                                transform: "rotate(" + i + "deg)"
                            })
                        }, 1e3)
                    } else {
                        n > 50 && t.addClass("gt50");
                        var s = t.attr("data-text") || a.text || n + "";
                        e("<span>" + s + "</span>").appendTo(t), e('<div class="slice"><div class="bar"></div><div class="fill"></div></div>').appendTo(t), n > 50 && e(".bar", t).css({
                            "-webkit-transform": "rotate(180deg)",
                            "-moz-transform": "rotate(180deg)",
                            "-ms-transform": "rotate(180deg)",
                            "-o-transform": "rotate(180deg)",
                            transform: "rotate(180deg)"
                        });
                        var i = 3.6 * n;
                        setTimeout(function() {
                            e(".bar", t).css({
                                "-webkit-transform": "rotate(" + i + "deg)",
                                "-moz-transform": "rotate(" + i + "deg)",
                                "-ms-transform": "rotate(" + i + "deg)",
                                "-o-transform": "rotate(" + i + "deg)",
                                transform: "rotate(" + i + "deg)"
                            })
                        }, 0)
                    }
                })
            }
        }(jQuery), e("#TPVotes").percircle(), e(".my-rating").starRating({
            starSize: 21,
            useGradient: !1,
            callback: function(a, t) {
                var n = e(".my-rating").data("id");
                e.ajax({
                    url: peliPublic.url,
                    method: "POST",
                    data: {
                        action: "action_rating_tax",
                        rating: a,
                        term_id: n
                    },
                    success: function(e) {
                        console.log(e)
                    }
                })
            }
        }), e("#profilepicture").change(function() {
            ! function(a) {
                if (a.files && a.files[0]) {
                    var t = new FileReader;
                    t.onload = function(a) {
                        e(".avatar img").attr("src", a.target.result)
                    }, t.readAsDataURL(a.files[0])
                }
            }(this)
        }), e(".lgtbx").on("click", function(a) {
            a.preventDefault(), e("body").removeClass("lights-off")
        }), e(".aa-crd").find(".aa-crd-lnk").click(function() {
            e(this).toggleClass("on"), e(".aa-crd-lnk").not(e(this)).removeClass("on")
        }), e("#op-not").on("click", function(a) {
            a.preventDefault(), e.ajax({
                url: peliPublic.url,
                method: "POST",
                data: {
                    action: "action_delete_notify"
                },
                success: function(e) {
                    console.log(e)
                }
            })
        }), "on" == e("#ltuser").data("lista") && e("#apre").click(), e(document).on("click", ".nav-cuevana .nav-links .page-link", function(a) {
            a.preventDefault(), page = n(e(this).clone()), console.log(page), e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination",
                    query_vars: peliPublic.query_vars,
                    page: page
                },
                success: function(a) {
                    e("#tabserie-1").empty(), e("#tabserie-1").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana .nav-links .next", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) + parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination",
                    query_vars: peliPublic.query_vars,
                    page: n
                },
                success: function(a) {
                    e("#tabserie-1").empty(), e("#tabserie-1").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana .nav-links .prev", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) - parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination",
                    query_vars: peliPublic.query_vars,
                    page: n
                },
                success: function(a) {
                    e("#tabserie-1").empty(), e("#tabserie-1").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-estreno .nav-links .page-link", function(a) {
            a.preventDefault(), page = n(e(this).clone()), console.log(page), e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_estreno",
                    page: page
                },
                success: function(a) {
                    e("#tabserie-2").empty(), e("#tabserie-2").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-estreno .nav-links .next", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) + parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_estreno",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-2").empty(), e("#tabserie-2").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-estreno .nav-links .prev", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) - parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_estreno",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-2").empty(), e("#tabserie-2").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-rating .nav-links .page-link", function(a) {
            a.preventDefault(), page = n(e(this).clone()), console.log(page), e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_rating",
                    page: page
                },
                success: function(a) {
                    e("#tabserie-3").empty(), e("#tabserie-3").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-rating .nav-links .next", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) + parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_rating",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-3").empty(), e("#tabserie-3").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-rating .nav-links .prev", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) - parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_rating",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-3").empty(), e("#tabserie-3").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-view .nav-links .page-link", function(a) {
            a.preventDefault(), page = n(e(this).clone()), console.log(page), e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_view",
                    page: page
                },
                success: function(a) {
                    e("#tabserie-4").empty(), e("#tabserie-4").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-view .nav-links .next", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) + parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_view",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-4").empty(), e("#tabserie-4").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        }), e(document).on("click", ".nav-cuevana-view .nav-links .prev", function(a) {
            a.preventDefault();
            var t = e(this).parent().find(".current").text(),
                n = parseInt(t) - parseInt(1);
            e.ajax({
                url: peliPublic.url,
                type: "post",
                data: {
                    action: "cuevana_ajax_pagination_view",
                    page: n
                },
                success: function(a) {
                    e("#tabserie-4").empty(), e("#tabserie-4").append(a), o("cuevana-top-page"), e(".navigation a").removeAttr("href")
                }
            })
        })
});